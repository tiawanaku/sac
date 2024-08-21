<?php

namespace App\Filament\Resources\AutorizacionConstruccionNichoResource\Pages;

use App\Filament\Resources\AutorizacionConstruccionNichoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditAutorizacionConstruccionNicho extends EditRecord
{
    protected static string $resource = AutorizacionConstruccionNichoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
