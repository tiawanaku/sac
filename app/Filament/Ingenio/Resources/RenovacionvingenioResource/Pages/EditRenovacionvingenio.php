<?php

namespace App\Filament\Ingenio\Resources\RenovacionvingenioResource\Pages;

use App\Filament\Ingenio\Resources\RenovacionvingenioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditRenovacionvingenio extends EditRecord
{
    protected static string $resource = RenovacionvingenioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
