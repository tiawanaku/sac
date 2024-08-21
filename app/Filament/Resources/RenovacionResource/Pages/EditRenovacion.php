<?php

namespace App\Filament\Resources\RenovacionResource\Pages;

use App\Filament\Resources\RenovacionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRenovacion extends EditRecord
{
    protected static string $resource = RenovacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
