<?php

namespace App\Filament\Resources\CertificacionResource\Pages;

use App\Filament\Resources\CertificacionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditCertificacion extends EditRecord
{
    protected static string $resource = CertificacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
