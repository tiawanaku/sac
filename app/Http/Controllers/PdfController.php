<?php

namespace App\Http\Controllers;

use App\Models\Exhumacion;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function preview($id)
    {
        $exhumacion = Exhumacion::findOrFail($id);
        $pdf = Pdf::loadView('pdf.exhumacion', [
            'exhumacion' => $exhumacion,
            'costo_servicio' => $exhumacion->costo_servicio // Asegúrate de pasar el valor
        ]);
        return $pdf->stream('exhumacion.pdf'); // Para mostrar el PDF en el navegador
    }

    public function download($id)
    {
        $exhumacion = Exhumacion::findOrFail($id);
        $pdf = Pdf::loadView('pdf.exhumacion', [
            'exhumacion' => $exhumacion,
            'costo_servicio' => $exhumacion->costo_servicio // Asegúrate de pasar el valor
        ]);
        return $pdf->download('exhumacion.pdf'); // Para descargar el PDF
    }
}