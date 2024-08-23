<?php

namespace App\Http\Controllers;

use App\Models\Inhumacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InhumacionController extends Controller
{
    // Método para visualizar un PDF individual
    public function verPdf($id, $type)
    {
        $registro = Inhumacione::findOrFail($id);

        // Verifica que el tipo de archivo solicitado exista en el registro
        if ($registro && $registro->$type) {
            if ($type === 'familiares_pdf') {
                // Si se solicita un archivo específico de 'familiares_pdf', redirige a la función adecuada
                return $this->verFamiliaresPdf($id);
            }

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

    // Método para visualizar múltiples PDFs de 'familiares_pdf'
    public function verFamiliaresPdf($id)
    {
        $registro = Inhumacione::findOrFail($id);

        if ($registro && $registro->familiares_pdf) {
            $pdfs = json_decode($registro->familiares_pdf, true);

            $pdfPaths = array_map(function ($pdf) {
                return storage_path('app/public/' . $pdf);
            }, $pdfs);

            // Renderiza la vista desde la carpeta 'components'
            return view('components.verFamiliaresPdf', compact('pdfPaths'));
        } else {
            return redirect()->back()->with('error', 'PDF no encontrado.');
        }
    }
}
