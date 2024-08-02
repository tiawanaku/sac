<?php

namespace App\Filament\Resources\InhumacioneResource\Pages;

use App\Filament\Resources\InhumacioneResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInhumacione extends EditRecord
{
    protected static string $resource = InhumacioneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
