<?php

namespace App\Http\Controllers;

use App\Models\Exhumacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExhumacionController extends Controller
{
    public function verPdf($id)
    {
        $registro = Exhumacion::findOrFail($id);

        if ($registro && $registro->comprobante_pdf) {
            $pdfPath = storage_path('app/public/' . $registro->comprobante_pdf);

            if (file_exists($pdfPath)) {
                return response()->file($pdfPath);
            } else {
                return redirect()->back()->with('error', 'Archivo PDF no encontrado.');
            }
        } else {
            return redirect()->back()->with('error', 'PDF no encontrado.');
        }
    }
}
