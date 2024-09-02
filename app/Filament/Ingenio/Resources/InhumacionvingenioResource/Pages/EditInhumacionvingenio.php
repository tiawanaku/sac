<?php

namespace App\Filament\Ingenio\Resources\InhumacionvingenioResource\Pages;

use App\Filament\Ingenio\Resources\InhumacionvingenioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInhumacionvingenio extends EditRecord
{
    protected static string $resource = InhumacionvingenioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
