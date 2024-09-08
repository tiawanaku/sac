<?php

namespace App\Filament\Resources\LegalizacionResource\Pages;

use App\Filament\Resources\LegalizacionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLegalizacion extends EditRecord
{
    protected static string $resource = LegalizacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
