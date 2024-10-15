<?php

namespace App\Http\Controllers;

use App\Models\Inhumacione;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Helpers\NumberToWords;

class InhumacionComprobanteController extends Controller
{
    public function previewPdf($id)
    {
        $inhumacion = Inhumacione::findOrFail($id);

        // Asigna el costo del servicio
        $costo_servicio = 100; // Cambia este valor según sea necesario
        $costo_total = 150; // Ejemplo de costo total
        $costo_total_literal = NumberToWords::convert($costo_total); // Convierte el total a palabras

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