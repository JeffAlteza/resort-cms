<?php

namespace App\Filament\Resources\BookingResource\Pages;

use App\Filament\Resources\BookingResource;
use App\Filament\Widgets\CalendarWidget;
use App\Traits\ExportToExcelTrait;
use Filament\Actions;
use Filament\Schemas\Components\Tabs\Tab;
use Filament\Resources\Pages\ListRecords;

class ListBookings extends ListRecords
{
    use ExportToExcelTrait;

    protected static string $resource = BookingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            $this->export('Booking'),
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            null => Tab::make('All'),
            'Accept' => Tab::make()->query(fn ($query) => $query->where('status', 'accept')),
            'New' => Tab::make()->query(fn ($query) => $query->where('status', 'new')),
            'Decline' => Tab::make()->query(fn ($query) => $query->where('status', 'decline')),
        ];
    }
    
    // protected function getHeaderWidgets(): array
    // {
    //     return [
    //         CalendarWidget::class
    //     ];
    // }

}
