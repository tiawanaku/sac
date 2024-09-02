<?php

namespace App\Filament\Ingenio\Resources\ExhumacionvingenioResource\Pages;

use App\Filament\Ingenio\Resources\ExhumacionvingenioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditExhumacionvingenio extends EditRecord
{
    protected static string $resource = ExhumacionvingenioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
