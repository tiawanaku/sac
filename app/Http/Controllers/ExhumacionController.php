<?php

namespace App\Http\Controllers;

use App\Models\Exhumacion;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Helpers\NumberToWords;

class ExhumacionController extends Controller
{
    public function previewPdf($id)
    {
        $exhumacion = Exhumacion::findOrFail($id);

        $motivo_exhumacion = $exhumacion->motivo_exhumacion;
        $costo_servicio = $exhumacion->costo_servicio;
        $costo_total = $exhumacion->costo_total;
        $costo_total_literal = NumberToWords::convertir($costo_total);

        $pdf = Pdf::loadView('pdfs.exhumacion', [
            'exhumacion' => $exhumacion,
            'motivo_exhumacion' => $motivo_exhumacion,
            'costo_servicio' => $costo_servicio,
            'costo_total' => $costo_total,
            'costo_total_literal' => $costo_total_literal,
        ]);

        return $pdf->stream('exhumacion_' . $id . '.pdf');
    }
}