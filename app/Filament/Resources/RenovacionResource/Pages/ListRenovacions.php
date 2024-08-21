<?php

namespace App\Filament\Resources\RenovacionResource\Pages;

use App\Filament\Resources\RenovacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRenovacions extends ListRecords
{
    protected static string $resource = RenovacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
