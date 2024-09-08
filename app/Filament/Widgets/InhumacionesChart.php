<?php

namespace App\Filament\Widgets;

use Filament\Widgets\ChartWidget;
use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use App\Models\Inhumacione;
use Carbon\Carbon; // Asegúrate de importar Carbon

class InhumacionesChart extends ChartWidget
{
    protected static ?string $heading = 'Inhumaciones por Mes';

    protected function getData(): array
    {
        // Establecer el idioma de Carbon a español
        Carbon::setLocale('es');

        // Obtener el conteo de registros agrupados por mes
        $data = Trend::model(Inhumacione::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->count();

        // Mapear los datos para el gráfico
        return [
            'datasets' => [
                [
                    'label' => 'Cantidad de Inhumaciones',
                    'data' => $data->map(fn (TrendValue $value) => round($value->aggregate)), // Conteo de registros como enteros
                ],
            ],
            'labels' => $data->map(fn (TrendValue $value) => ucfirst(Carbon::parse($value->date)->translatedFormat('F'))), // Convertir a Carbon, traducir y capitalizar
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Tipo de gráfico (puede ser 'line', 'bar', etc.)
    }

    protected function getOptions(): array
    {
        return [
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                    'ticks' => [
                        'stepSize' => 1, // Asegura que los valores en Y sean números enteros
                    ],
                ],
            ],
        ];
    }
}
