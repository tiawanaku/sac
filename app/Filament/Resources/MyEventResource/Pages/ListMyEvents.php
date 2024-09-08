<?php

namespace App\Filament\Resources\MyEventResource\Pages;

use App\Filament\Resources\MyEventResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMyEvents extends ListRecords
{
    protected static string $resource = MyEventResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
