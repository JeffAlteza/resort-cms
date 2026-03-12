<?php

namespace App\Filament\Pages;
use BackedEnum;

use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use ShuvroRoy\FilamentSpatieLaravelBackup\Pages\Backups as BaseBackups;

class Backup extends BaseBackups
{
    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-circle-stack';

    protected static ?int $navigationSort = 7;

    public function getHeading(): string | Htmlable
    {
        return 'Backups';
    }
 
    public static function getNavigationGroup(): ?string
    {
        return 'Utilities';
    }
}
