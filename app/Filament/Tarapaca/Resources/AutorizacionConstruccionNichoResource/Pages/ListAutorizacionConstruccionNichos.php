<?php

namespace App\Filament\Tarapaca\Resources\AutorizacionConstruccionNichoResource\Pages;

use App\Filament\Tarapaca\Resources\AutorizacionConstruccionNichoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAutorizacionConstruccionNichos extends ListRecords
{
    protected static string $resource = AutorizacionConstruccionNichoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
