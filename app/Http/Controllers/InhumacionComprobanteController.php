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

        $nombres_difunto = $inhumacion->nombres_difunto;
        $apellido_paterno_difunto = $inhumacion->apellido_paterno_difunto;
        $apellido_materno_difunto = $inhumacion->apellido_materno_difunto;
        $numero_carnet_difunto = $inhumacion->numero_carnet_difunto;
        $fecha_inhumacion = $inhumacion->fecha_inhumacion;
        $fecha_vencimiento = $inhumacion->fecha_vencimiento;
        $nombres_contribuyente = $inhumacion->nombres_contribuyente;
        $celular = $inhumacion->celular;
        $direccion = $inhumacion->direccion;

        $pdf = Pdf::loadView(
            'pdfs.inhumacion',
            [
                'inhumacion' => $inhumacion,

                'nombres_difunto' => $nombres_difunto,
                'apellido_paterno_difunto' => $apellido_paterno_difunto,
                'apellido_materno_difunto' => $apellido_materno_difunto,
                'numero_carnet_difunto' => $numero_carnet_difunto,
                'fecha_inhumacion' => $fecha_inhumacion,
                'fecha_vencimiento' => $fecha_vencimiento,
                'nombres_contribuyente' => $nombres_contribuyente,
                'celular' => $celular,
                'direccion' => $direccion,
            ]
        );

        return $pdf->stream('inhumacion_' . $id . '.pdf');
    }
}