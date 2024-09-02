<?php

namespace App\Filament\Tarapaca\Resources\ExhumacionResource\Pages;

use App\Filament\Tarapaca\Resources\ExhumacionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExhumacion extends EditRecord
{
    protected static string $resource = ExhumacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
