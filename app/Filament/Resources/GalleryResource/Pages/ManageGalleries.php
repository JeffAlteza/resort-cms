<?php

namespace App\Filament\Resources\GalleryResource\Pages;

use App\Filament\Resources\GalleryResource;
use App\Traits\RedirectToIndexTrait;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageGalleries extends ManageRecords
{
    protected static string $resource = GalleryResource::class;

    use RedirectToIndexTrait;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('New Photo'),
        ];
    }
}
