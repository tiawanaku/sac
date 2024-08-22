<?php

namespace App\Filament\Resources\RenovacionResource\Pages;

use App\Filament\Resources\RenovacionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateRenovacion extends CreateRecord
{
    protected static string $resource = RenovacionResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Renovacion creada con exito';
    }
}
