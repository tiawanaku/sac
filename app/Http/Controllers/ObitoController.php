<?php

namespace App\Http\Controllers;

use App\Models\Obito;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ObitoController extends Controller
{
    public function verArchivo($id, $type)
    {
        $registro = Obito::findOrFail($id);

        // Verificar si el registro existe y si el campo solicitado tiene un archivo asociado
        if ($registro && in_array($type, ['nota_director_servicios_municipales', 'fotocopias_comprobantes_entierro_ultima_renovacion', 'fotocopia_cedula_identidad_fallecido', 'fotocopia_cedula_identidad_solicitante', 'orden_judicial']) && $registro->$type) {
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
