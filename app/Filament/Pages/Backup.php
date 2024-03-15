<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Illuminate\Contracts\Support\Htmlable;
use ShuvroRoy\FilamentSpatieLaravelBackup\Pages\Backups as BaseBackups;

class Backup extends BaseBackups
{
    protected static ?string $navigationIcon = 'heroicon-o-circle-stack';

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
