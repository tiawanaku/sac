<?php

namespace App\Filament\Resources\AutorizacionConstruccionNichoResource\Pages;

use App\Filament\Resources\AutorizacionConstruccionNichoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAutorizacionConstruccionNicho extends CreateRecord
{
    protected static string $resource = AutorizacionConstruccionNichoResource::class;
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
    protected function getCreatedNotificationMessage(): ?string
    {
        return 'Autorizacion de nicho creada con exito';
    }
}
