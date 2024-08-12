<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Exhumacion; // Asegúrate de importar el modelo adecuado

class FileUploadController extends Controller
{
    public function testUpload(Request $request)
    {
        // Validar el archivo subido
        $request->validate([
            'file' => 'required|mimes:pdf|max:2048',
        ]);

        // Guardar el archivo en el disco 'public' en el directorio 'pdfs'
        $filePath = $request->file('file')->store('pdfs', 'public');

        // Crear un registro en la base de datos (ajusta según tu modelo y lógica)
        $exhumacion = new Exhumacion();
        $exhumacion->motivo_exhumacion = 'Ejemplo'; // Reemplaza con los datos reales
        $exhumacion->costo_formulario = 100; // Reemplaza con los datos reales
        $exhumacion->costo_servicio = 50; // Reemplaza con los datos reales
        $exhumacion->fecha_exhumacion = now(); // Ajusta según tus datos
        $exhumacion->comprobante_pdf = $filePath;
        $exhumacion->save();

        return response()->json(['filePath' => $filePath]);
    }
}
