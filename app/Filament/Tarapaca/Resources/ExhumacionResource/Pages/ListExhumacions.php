<?php

namespace App\Filament\Tarapaca\Resources\ExhumacionResource\Pages;

use App\Filament\Tarapaca\Resources\ExhumacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListExhumacions extends ListRecords
{
    protected static string $resource = ExhumacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
