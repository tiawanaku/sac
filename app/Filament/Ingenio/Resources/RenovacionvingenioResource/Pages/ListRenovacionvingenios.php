<?php

namespace App\Filament\Ingenio\Resources\RenovacionvingenioResource\Pages;

use App\Filament\Ingenio\Resources\RenovacionvingenioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRenovacionvingenios extends ListRecords
{
    protected static string $resource = RenovacionvingenioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
