<?php

namespace App\Filament\Resources\ExhumacionResource\Pages;

use App\Filament\Resources\ExhumacionResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateExhumacion extends CreateRecord
{
    protected static string $resource = ExhumacionResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Exhumacion creada con exito';
    }
}
