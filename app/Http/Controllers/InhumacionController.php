<?php

namespace App\Http\Controllers;

use App\Models\Inhumacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InhumacionController extends Controller
{
    public function verPdf($id, $type = 'comprobante_pdf')
    {
        $registro = Inhumacione::findOrFail($id);

        if ($registro && $registro->$type) {
            $pdfPath = storage_path('app/public/' . $registro->$type);

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
