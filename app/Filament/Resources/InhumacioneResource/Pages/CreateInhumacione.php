<?php

namespace App\Filament\Resources\InhumacioneResource\Pages;

use App\Filament\Resources\InhumacioneResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateInhumacione extends CreateRecord
{
    protected static string $resource = InhumacioneResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Inhumacion creada con exito';
    }
}
