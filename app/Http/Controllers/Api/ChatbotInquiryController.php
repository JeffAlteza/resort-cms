<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CreateInquiryRequest;
use App\Mail\InquiryEmail;
use App\Models\Inquiry;
use App\Models\User;
use Filament\Notifications\Notification;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ChatbotInquiryController extends Controller
{
    public function createInquiry(CreateInquiryRequest $request): JsonResponse
    {
        $attributes = $request->validated();

        $inquiry = Inquiry::create([
            'name' => $attributes['name'],
            'email' => $attributes['email'],
            'cellphone' => $attributes['cellphone'] ?? '',
            'subject' => $attributes['subject'],
            'message' => $attributes['message'],
        ]);

        try {
            Mail::to(env('MAIL_TO'))->send(new InquiryEmail($attributes));
        } catch (\Throwable $e) {
            Log::warning('Inquiry email failed: ' . $e->getMessage());
        }

        try {
            $recipients = User::all();
            Notification::make()
                ->icon('heroicon-o-envelope')
                ->iconColor('success')
                ->title('New Inquiry from ' . $attributes['name'])
                ->body('Inquiry via Telegram chatbot: ' . $attributes['subject'])
                ->sendToDatabase($recipients);
        } catch (\Throwable $e) {
            Log::warning('Inquiry notification failed: ' . $e->getMessage());
        }

        return response()->json([
            'data' => [
                'message' => 'Inquiry submitted successfully.',
                'inquiry_id' => $inquiry->id,
            ],
        ], 201);
    }
}
