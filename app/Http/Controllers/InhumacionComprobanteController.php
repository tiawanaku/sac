<?php

namespace App\Http\Controllers;

use App\Models\Inhumacione;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class InhumacionComprobanteController extends Controller
{
    // Función personalizada para convertir números a palabras en español
    private function convertNumberToWords($number) {
        $f = new \NumberFormatter("es", \NumberFormatter::SPELLOUT);
        return $f->format($number);
    }

    public function previewPdf($id)
    {
        $inhumacion = Inhumacione::findOrFail($id);
        
        // Obtén el costo del servicio de una fuente dinámica
        $costo_servicio = $inhumacion->monto;
        $costo_total = $costo_servicio + 2;
        
        // Convierte el costo total a palabras
        $costo_total_literal = $this->convertNumberToWords($costo_total);

        $pdf = Pdf::loadView(
            'pdfs.inhumacion',
            [
                'inhumacion' => $inhumacion,
                'nombres_difunto' => $inhumacion->nombres_difunto,
                'apellido_paterno_difunto' => $inhumacion->apellido_paterno_difunto,
                'apellido_materno_difunto' => $inhumacion->apellido_materno_difunto,
                'numero_carnet_difunto' => $inhumacion->numero_carnet_difunto,
                'fecha_inhumacion' => $inhumacion->fecha_inhumacion,
                'fecha_vencimiento' => $inhumacion->fecha_vencimiento,
                'nombres_contribuyente' => $inhumacion->nombres_contribuyente,
                'celular' => $inhumacion->celular,
                'direccion' => $inhumacion->direccion,
                'costo_servicio' => $costo_servicio,
                'costo_total' => $costo_total,
                'costo_total_literal' => $costo_total_literal,
            ]
        );

        return $pdf->stream('inhumacion_' . $id . '.pdf');
    }
}
