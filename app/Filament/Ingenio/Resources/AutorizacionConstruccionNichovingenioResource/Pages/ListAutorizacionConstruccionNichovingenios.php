<?php

namespace App\Filament\Ingenio\Resources\AutorizacionConstruccionNichovingenioResource\Pages;

use App\Filament\Ingenio\Resources\AutorizacionConstruccionNichovingenioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAutorizacionConstruccionNichovingenios extends ListRecords
{
    protected static string $resource = AutorizacionConstruccionNichovingenioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
