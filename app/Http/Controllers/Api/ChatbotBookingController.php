<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CheckAvailabilityRequest;
use App\Http\Requests\Api\CreateBookingRequest;
use App\Models\Booking;
use App\Models\User;
use App\Mail\BookingMail;
use Carbon\Carbon;
use Carbon\CarbonPeriod;
use Filament\Notifications\Notification;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ChatbotBookingController extends Controller
{
    public function availability(CheckAvailabilityRequest $request): JsonResponse
    {
        $checkin = $request->query('checkin');
        $checkout = $request->query('checkout');

        $conflicting = Booking::where('status', 'accept')
            ->where('checkin', '<', $checkout)
            ->where('checkout', '>', $checkin)
            ->orderBy('checkin')
            ->get(['checkin', 'checkout']);

        $checkinDate = Carbon::parse($checkin);
        $checkoutDate = Carbon::parse($checkout);
        $totalDays = $checkinDate->diffInDays($checkoutDate);

        $bookedDays = 0;
        foreach ($conflicting as $b) {
            $overlapStart = Carbon::parse($b->checkin)->max($checkinDate);
            $overlapEnd = Carbon::parse($b->checkout)->min($checkoutDate);
            $bookedDays += max(0, $overlapStart->diffInDays($overlapEnd));
        }
        $freeDays = $totalDays - $bookedDays;

        $response = [
            'checkin' => $checkin,
            'checkout' => $checkout,
            'total_days' => $totalDays,
            'fully_available' => $conflicting->isEmpty(),
            'partially_available' => $conflicting->isNotEmpty() && $freeDays > 0,
            'free_days' => $freeDays,
            'booked_days' => $bookedDays,
        ];

        // For ranges longer than 31 days, provide a monthly summary
        if ($totalDays > 31) {
            $response['monthly_summary'] = $this->buildMonthlySummary($checkinDate, $checkoutDate, $conflicting);
            $response['note'] = $conflicting->isEmpty()
                ? 'The entire date range is available for booking.'
                : "There are {$conflicting->count()} existing booking(s) within this range, but {$freeDays} out of {$totalDays} days are still available. See monthly_summary for a per-month breakdown.";
        } else {
            $response['existing_bookings'] = $conflicting->map(fn ($b) => [
                'checkin' => $b->checkin,
                'checkout' => $b->checkout,
            ]);
            $response['note'] = $conflicting->isEmpty()
                ? 'The entire date range is available for booking.'
                : "There are {$conflicting->count()} existing booking(s) within this range, but {$freeDays} out of {$totalDays} days are still available. Check the existing_bookings list to suggest open dates.";
        }

        return response()->json(['data' => $response]);
    }

    public function createBooking(CreateBookingRequest $request): JsonResponse
    {
        $attributes = $request->validated();

        $booking = Booking::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'cellphone' => $attributes['cellphone'],
            'checkin' => $attributes['checkin'],
            'checkout' => $attributes['checkout'],
            'message' => $attributes['message'] ?? '',
        ]);

        try {
            Mail::to(env('MAIL_TO'))->send(new BookingMail($attributes));
        } catch (\Throwable $e) {
            Log::warning('Booking email failed: ' . $e->getMessage());
        }

        try {
            $recipients = User::all();
            Notification::make()
                ->icon('heroicon-o-envelope')
                ->iconColor('success')
                ->title('New Booking from ' . $attributes['name'])
                ->body('Booking request via Telegram chatbot for ' . $attributes['checkin'] . ' to ' . $attributes['checkout'])
                ->sendToDatabase($recipients);
        } catch (\Throwable $e) {
            Log::warning('Booking notification failed: ' . $e->getMessage());
        }

        return response()->json([
            'data' => [
                'message' => 'Booking created successfully.',
                'booking_id' => $booking->id,
                'status' => $booking->status ?? 'new',
            ],
        ], 201);
    }

    private function buildMonthlySummary(Carbon $checkin, Carbon $checkout, $conflicting): array
    {
        $summary = [];
        $period = CarbonPeriod::create($checkin->copy()->startOfMonth(), '1 month', $checkout->copy()->startOfMonth());

        foreach ($period as $monthStart) {
            $monthEnd = $monthStart->copy()->endOfMonth()->addDay()->startOfDay();

            // Clamp to requested range
            $rangeStart = $monthStart->max($checkin);
            $rangeEnd = $monthEnd->min($checkout);
            $daysInRange = $rangeStart->diffInDays($rangeEnd);

            $bookedDays = 0;
            foreach ($conflicting as $b) {
                $bCheckin = Carbon::parse($b->checkin);
                $bCheckout = Carbon::parse($b->checkout);

                $overlapStart = $bCheckin->max($rangeStart);
                $overlapEnd = $bCheckout->min($rangeEnd);

                if ($overlapStart < $overlapEnd) {
                    $bookedDays += $overlapStart->diffInDays($overlapEnd);
                }
            }

            $summary[] = [
                'month' => $monthStart->format('Y-m'),
                'total_days' => $daysInRange,
                'booked_days' => $bookedDays,
                'free_days' => $daysInRange - $bookedDays,
                'status' => $bookedDays === 0 ? 'fully_available' : ($bookedDays >= $daysInRange ? 'fully_booked' : 'partially_available'),
            ];
        }

        return $summary;
    }
}
