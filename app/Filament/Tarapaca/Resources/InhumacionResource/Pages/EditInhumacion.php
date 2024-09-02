<?php

namespace App\Filament\Tarapaca\Resources\InhumacionResource\Pages;

use App\Filament\Tarapaca\Resources\InhumacionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInhumacion extends EditRecord
{
    protected static string $resource = InhumacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
