<?php

namespace App\Filament\Resources\HomeResource\Pages;

use App\Filament\Resources\HomeResource;
use App\Models\Home;
use App\Traits\RedirectToIndexTrait;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditHome extends EditRecord
{
    protected static string $resource = HomeResource::class;
    
    use RedirectToIndexTrait;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make()->disabled(fn (Home $record) => ($record->type == 'banner' || 'reserve section')),
            Actions\RestoreAction::make(),
        ];
    }
}
