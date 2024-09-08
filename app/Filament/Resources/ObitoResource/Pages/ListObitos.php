<?php

namespace App\Filament\Resources\ObitoResource\Pages;

use App\Filament\Resources\ObitoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListObitos extends ListRecords
{
    protected static string $resource = ObitoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
