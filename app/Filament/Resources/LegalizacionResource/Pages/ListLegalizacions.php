<?php

namespace App\Filament\Resources\LegalizacionResource\Pages;

use App\Filament\Resources\LegalizacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListLegalizacions extends ListRecords
{
    protected static string $resource = LegalizacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
