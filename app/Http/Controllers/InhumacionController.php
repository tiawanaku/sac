<?php

namespace App\Http\Controllers;

use App\Models\Inhumacione;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class InhumacionController extends Controller
{
    // Método para visualizar un archivo (PDF o imagen)
    public function verArchivo($id, $type)
    {
        $registro = Inhumacione::findOrFail($id);

        // Verifica que el tipo de archivo solicitado exista en el registro
        if ($registro && $registro->$type) {
            if ($type === 'familiares_pdf') {
                // Si se solicita un archivo específico de 'familiares_pdf', redirige a la función adecuada
                return $this->verFamiliaresArchivo($id);
            }

            $filePath = storage_path('app/public/' . $registro->$type);

            if (file_exists($filePath)) {
                // Verifica si es una imagen o un PDF para manejarlo adecuadamente
                $mimeType = mime_content_type($filePath);
                
                // Acepta archivos PDF y de imágenes
                if (in_array($mimeType, ['image/jpeg', 'image/jpg', 'application/pdf'])) {
                    // Si es una imagen, retorna la imagen como respuesta
                    if (strpos($mimeType, 'image') !== false) {
                        return response()->file($filePath, [
                            'Content-Type' => $mimeType
                        ]);
                    }
                    
                    // Si es un PDF, retorna el archivo PDF
                    if ($mimeType === 'application/pdf') {
                        return response()->file($filePath);
                    }
                } else {
                    return redirect()->back()->with('error', 'Tipo de archivo no soportado.');
                }
            } else {
                return redirect()->back()->with('error', 'Archivo no encontrado.');
            }
        } else {
            return redirect()->back()->with('error', 'Archivo no encontrado.');
        }
    }

    // Método para visualizar múltiples archivos de 'familiares_pdf' (PDFs o imágenes)
    public function verFamiliaresArchivo($id)
    {
        $registro = Inhumacione::findOrFail($id);

        if ($registro && $registro->familiares_pdf) {
            $archivos = json_decode($registro->familiares_pdf, true);

            $filePaths = array_map(function ($archivo) {
                return storage_path('app/public/' . $archivo);
            }, $archivos);

            // Verifica si los archivos son imágenes o PDFs
            foreach ($filePaths as $filePath) {
                if (file_exists($filePath)) {
                    $mimeType = mime_content_type($filePath);
                    
                    if (!in_array($mimeType, ['image/jpeg', 'image/jpg', 'application/pdf'])) {
                        return redirect()->back()->with('error', 'Uno o más archivos tienen un tipo no soportado.');
                    }
                }
            }

            // Renderiza la vista desde la carpeta 'components'
            return view('components.verFamiliaresArchivo', compact('filePaths'));
        } else {
            return redirect()->back()->with('error', 'Archivos no encontrados.');
        }
    }
}
