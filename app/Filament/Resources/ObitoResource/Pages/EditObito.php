<?php

namespace App\Filament\Resources\ObitoResource\Pages;

use App\Filament\Resources\ObitoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditObito extends EditRecord
{
    protected static string $resource = ObitoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
