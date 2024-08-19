<?php

namespace App\Http\Controllers;

use App\Models\Exhumacion;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Helpers\NumberToWords;

class ExhumacionController extends Controller
{
    public function downloadPdf($id)
    {
        $exhumacion = Exhumacion::findOrFail($id);

        // Asegúrate de pasar el costo_servicio si es un atributo del modelo
        $motivo_exhumacion = $exhumacion->motivo_exhumacion;
        $costo_servicio = $exhumacion->costo_servicio;
        $costo_total = $exhumacion->costo_total;
        $costo_total_literal = NumberToWords::convertir($costo_total);

        $pdf = Pdf::loadView('pdfs.exhumacion', [
            'exhumacion' => $exhumacion,
            'motivo_exhumacion' => $motivo_exhumacion,
            'costo_servicio' => $costo_servicio,
            'costo_total' => $costo_total, // Agrega esta línea
            'costo_total_literal' => $costo_total_literal, // Agrega esta línea
        ]);

        return $pdf->download('exhumacion_' . $id . '.pdf');
    }
}