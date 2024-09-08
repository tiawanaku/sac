<?php

namespace App\Http\Controllers;

use App\Models\Legalizacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LegalizacionController extends Controller
{
    public function verArchivo($id, $type)
    {
        $registro = Legalizacion::findOrFail($id);

        // Verificar si el registro existe y si el campo solicitado tiene un archivo asociado
        if ($registro && in_array($type, ['nota_director_servicios_municipales', 'fotocopia_cedula_identidad_usuario', 'fotocopia_documento_legalizar']) && $registro->$type) {
            $filePath = storage_path('app/public/' . $registro->$type);

            // Verificar si el archivo existe en el almacenamiento
            if (file_exists($filePath)) {
                return response()->file($filePath);
            } else {
                return redirect()->back()->with('error', 'Archivo no encontrado.');
            }
        } else {
            return redirect()->back()->with('error', 'Archivo no encontrado.');
        }
    }
}
