<?php

namespace App\Filament\Ingenio\Resources\AutorizacionConstruccionNichovingenioResource\Pages;

use App\Filament\Ingenio\Resources\AutorizacionConstruccionNichovingenioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAutorizacionConstruccionNichovingenio extends EditRecord
{
    protected static string $resource = AutorizacionConstruccionNichovingenioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
