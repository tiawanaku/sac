<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Helpers\NumberToWords;
use App\Models\AutorizacionConstruccionNicho;

class PdfConstruccionController extends Controller
{
    public function previewPdfConstruccion($id)
    {
        $AutorizacionConstruccionNicho = AutorizacionConstruccionNicho::findOrFail($id);
        //
        $nombre_contribuyente = $AutorizacionConstruccionNicho->nombre_contribuyente;
        $ci_nit = $AutorizacionConstruccionNicho->ci_nit;
        $avenida_calle = $AutorizacionConstruccionNicho->avenida_calle;
        $numero = $AutorizacionConstruccionNicho->numero;
        $zona = $AutorizacionConstruccionNicho->zona;
        $actividad = $AutorizacionConstruccionNicho->actividad;
        $costo_formulario = $AutorizacionConstruccionNicho->costo_formulario;
        $costo = $AutorizacionConstruccionNicho->costo;
        $costo_total = $AutorizacionConstruccionNicho->costo_total;
        $costo_total_literal = NumberToWords::convertir($costo_total);
        $numero_celular = $AutorizacionConstruccionNicho->numero_celular;
        $nombre_difunto = $AutorizacionConstruccionNicho->nombre_difunto;
        $fecha_autorizacion = $AutorizacionConstruccionNicho->fecha_autorizacion;

        $pdf = Pdf::loadView(
            'pdfs.construccion',
            [
                'AutorizacionConstruccionNicho' => $AutorizacionConstruccionNicho,

                'nombre_contribuyente' => $nombre_contribuyente,
                'ci_nit' => $ci_nit,
                'avenida_calle' => $avenida_calle,
                'numero' => $numero,
                'zona' => $zona,
                'actividad' => $actividad,
                'costo' => $costo,
                'costo_total' => $costo_total,
                'numero_celular' => $numero_celular,
                'nombre_difunto' => $nombre_difunto,
                'costo_total_literal' => $costo_total_literal,
                'fecha_autorizacion' => $fecha_autorizacion,
            ]
        );

        return $pdf->stream('construccion_' . $id . '.pdf');
    }
}