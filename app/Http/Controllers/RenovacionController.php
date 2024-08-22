<?php

namespace App\Http\Controllers;

use App\Models\Renovacion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RenovacionController extends Controller
{
    public function verArchivo($id, $type = 'comprobante_renovacion')
    {
        $registro = Renovacion::findOrFail($id);

        if ($registro && $registro->$type) {
            $filePath = storage_path('app/public/' . $registro->$type);

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
