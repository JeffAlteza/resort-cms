<?php

namespace App\Filament\Widgets;

use App\Filament\Resources\BookingResource;
use App\Models\Booking;
use Filament\Actions\Action;
use Filament\Actions\ViewAction;
use Saade\FilamentFullCalendar\Widgets\FullCalendarWidget;

class CalendarWidget extends FullCalendarWidget
{
    public function fetchEvents(array $fetchInfo): array
    {
        return Booking::where('status', 'accept')
            ->get()
            ->map(function ($data) {
                return [
                    // 'id' => $data->id,
                    'title' => $data->name,
                    'start' => $data->checkin,
                    'end' => $data->checkout,
                    // 'url' => BookingResource::getUrl(name: 'view', parameters: ['record' => $data]),
                    // 'shouldOpenUrlInNewTab' => true
                    // 'category' => $data->category,
                    // 'specification' => $data->specification,
                    // 'end' => $intervention['scheduled_end_datetime'],
                ];
            })->toArray();
    }
}
