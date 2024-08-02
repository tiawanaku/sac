<?php

namespace App\Filament\Resources\ExhumacionResource\Pages;

use App\Filament\Resources\ExhumacionResource;
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
