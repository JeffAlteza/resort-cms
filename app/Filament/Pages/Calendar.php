<?php

namespace App\Filament\Pages;
use BackedEnum;

use App\Filament\Widgets\CalendarWidget;
use Filament\Pages\Page;

class Calendar extends Page
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-calendar-days';

    protected string $view = 'filament.pages.calendar';

    protected function getHeaderWidgets(): array
    {
        return [
            CalendarWidget::class
        ];
    }
}
