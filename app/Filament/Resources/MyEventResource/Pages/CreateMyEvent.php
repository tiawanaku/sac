<?php

namespace App\Filament\Resources\MyEventResource\Pages;

use App\Filament\Resources\MyEventResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateMyEvent extends CreateRecord
{
    protected static string $resource = MyEventResource::class;
}
