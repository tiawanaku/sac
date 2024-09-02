<?php

namespace App\Filament\Tarapaca\Resources\InhumacionResource\Pages;

use App\Filament\Tarapaca\Resources\InhumacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInhumacions extends ListRecords
{
    protected static string $resource = InhumacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
