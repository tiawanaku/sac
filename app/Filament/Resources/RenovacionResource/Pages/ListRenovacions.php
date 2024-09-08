<?php

namespace App\Filament\Resources\RenovacionResource\Pages;

use App\Filament\Resources\RenovacionResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListRenovacions extends ListRecords
{
    protected static string $resource = RenovacionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
    protected function getHeaderWidgets(): array
    {
        return RenovacionResource::getWidgets();
    }
    public function getTabs(): array
    {
        return [
            null => ListRecords\Tab::make('Todos'),
            'Gestion 2013' => ListRecords\Tab::make()->query(fn($query) => $query->whereBetween('fecha_renovacion', ['2013-01-01', '2013-12-31'])),
            'Gestion 2014' => ListRecords\Tab::make()->query(fn($query) => $query->whereBetween('fecha_renovacion', ['2014-01-01', '2014-12-31'])),
            'Gestion 2015' => ListRecords\Tab::make()->query(fn($query) => $query->whereBetween('fecha_renovacion', ['2015-01-01', '2015-12-31'])),
            'Gestion 2016' => ListRecords\Tab::make()->query(fn($query) => $query->whereBetween('fecha_renovacion', ['2016-01-01', '2016-12-31'])),
            'Gestion 2017' => ListRecords\Tab::make()->query(fn($query) => $query->whereBetween('fecha_renovacion', ['2017-01-01', '2017-12-31'])),
            'Gestion 2018' => ListRecords\Tab::make()->query(fn($query) => $query->whereBetween('fecha_renovacion', ['2018-01-01', '2018-12-31'])),
            'Gestion 2019' => ListRecords\Tab::make()->query(fn($query) => $query->whereBetween('fecha_renovacion', ['2019-01-01', '2019-12-31'])),
            'Gestion 2020' => ListRecords\Tab::make()->query(fn($query) => $query->whereBetween('fecha_renovacion', ['2020-01-01', '2020-12-31'])),
            'Gestion 2021' => ListRecords\Tab::make()->query(fn($query) => $query->whereBetween('fecha_renovacion', ['2021-01-01', '2021-12-31'])),
            'Gestion 2022' => ListRecords\Tab::make()->query(fn($query) => $query->whereBetween('fecha_renovacion', ['2022-01-01', '2022-12-31'])),
            'Gestion 2023' => ListRecords\Tab::make()->query(fn($query) => $query->whereBetween('fecha_renovacion', ['2023-01-01', '2023-12-31'])),
            'Gestion 2024' => ListRecords\Tab::make()->query(fn($query) => $query->whereBetween('fecha_renovacion', ['2024-01-01', '2024-12-31'])),
        ];
    }
}
