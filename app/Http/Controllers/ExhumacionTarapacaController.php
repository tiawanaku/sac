<?php

namespace App\Http\Controllers;

use App\Models\ExhumacioneTarapaca;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use App\Helpers\NumberToWords;

class ExhumacionTarapacaController extends Controller
{
    public function previewPdf($id)
    {
        $exhumacion = ExhumacioneTarapaca::findOrFail($id);

        $nombre_contribuayente = $exhumacion->nombre_contribuayente;
        $numero_celular = $exhumacion->numero_celular;
        $ci_nit = $exhumacion->ci_nit;
        $avenida_calle = $exhumacion->avenida_calle;
        $numero_puerta = $exhumacion->numero_puerta;
        $zona = $exhumacion->zona;
        $nombre_difunto = $exhumacion->nombre_difunto;

        $motivo_exhumacion = $exhumacion->motivo_exhumacion;
        $costo_servicio = $exhumacion->costo_servicio;
        $costo_total = $exhumacion->costo_total;
        $costo_total_literal = NumberToWords::convertir($costo_total);
        $fecha_exhumacion = $exhumacion->fecha_exhumacion;

        $pdf = Pdf::loadView(
            'pdfs.exhumacion',
            [
                'exhumacion' => $exhumacion,

                'nombre_contribuayente' => $nombre_contribuayente,
                'numero_celular' => $numero_celular,
                'ci_nit' => $ci_nit,
                'avenida_calle' => $avenida_calle,
                'numero_puerta' => $numero_puerta,
                'zona' => $zona,
                'nombre_difunto' => $nombre_difunto,

                'motivo_exhumacion' => $motivo_exhumacion,
                'costo_servicio' => $costo_servicio,
                'costo_total' => $costo_total,
                'costo_total_literal' => $costo_total_literal,
                'fecha_exhumacion' => $fecha_exhumacion,
            ]
        );

        return $pdf->stream('exhumacion_' . $id . '.pdf');
    }
}