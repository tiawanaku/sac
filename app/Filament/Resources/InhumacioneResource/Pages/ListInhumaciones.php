<?php

namespace App\Filament\Resources\InhumacioneResource\Pages;

use App\Filament\Resources\InhumacioneResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInhumaciones extends ListRecords
{
    protected static string $resource = InhumacioneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
