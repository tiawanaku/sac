<?php

use App\Http\Controllers\DonwloadPdfController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ExhumacionController;
use App\Http\Controllers\InhumacionController;
use App\Filament\Resources\ExhumacionResource;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\RenovacionController;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Ruta para la página de consulta
Route::get('/consulta', function () {
    return view('consulta.index'); // Asegúrate de que este archivo esté en resources/views/consulta/index.blade.php
});

// Ruta para enviar datos mediante cURL
Route::post('/enviar-datos', function (\Illuminate\Http\Request $request) {
    $nombre = $request->input('nombre');
    $apellido = $request->input('apellido');

    // Configurar la URL y el token
    $url = 'http://64.225.54.113:9053/consulta';
    $token = '3l4Lt02024';

    // Datos a enviar
    $data = [
        'nombre' => $nombre,
        'apellido' => $apellido
    ];

    // Inicializar cURL
    $ch = curl_init($url);

    // Configurar opciones de cURL
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Token: ' . $token
    ]);

    // Ejecutar la solicitud y obtener la respuesta
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        $responseMessage = 'Error: ' . curl_error($ch);
    } else {
        $responseMessage = $response;
    }

    // Cerrar la sesión cURL
    curl_close($ch);

    return view('consulta.index', ['responseMessage' => $responseMessage]);
});

// Ruta para la carga de archivos
Route::post('/test-upload', [FileUploadController::class, 'testUpload']);

// Ruta para la descarga del PDF corregida
Route::get('/{record}/pdf/download', [DonwloadPdfController::class, 'donwload'])->name('inhumacion.pdf.download');

// Rutas para visualizar PDFs específicos de exhumaciones e inhumaciones
Route::get('/exhumacion/{id}/ver-pdf', [ExhumacionController::class, 'verPdf'])->name('exhumacion.ver-pdf');
Route::get('/inhumacion/{id}/ver-pdf', [InhumacionController::class, 'verPdf'])->name('inhumacion.verPdf');

// Grupo de rutas protegidas con middleware 'auth'
Route::middleware('auth')->group(function () {
    Route::get('/filament/exhumacions/{record}/edit', [ExhumacionResource::class, 'edit'])
        ->name('filament.resources.exhumacions.edit');
});

// Rutas adicionales para exhumaciones y PDFs
Route::get('/exhumacion/{id}/pdf', [ExhumacionController::class, 'downloadPdf'])->name('exhumacion.pdf');
Route::get('/exhumacion/preview/{id}', [ExhumacionController::class, 'previewPdf'])->name('exhumacion.preview');
Route::get('pdf/download/{id}', [PdfController::class, 'download'])->name('pdf.download');

// Ruta para la descarga de un PDF de ejemplo
Route::get('/comprobante/{user}', function () {
    $pdf = Pdf::loadView('pdf.example');
    return $pdf->download('example.pdf');   
})->name('pdf.example');

// Rutas para visualizar los diferentes tipos de PDFs en inhumaciones
Route::get('inhumaciones/{id}/ver-pdf/{type}', [InhumacionController::class, 'verPdf'])
    ->name('inhumaciones.ver_pdf')
    ->where('type', 'comprobante_pdf|testigos_pdf|familiares_pdf');

// Ruta para visualizar un archivo relacionado con una renovación
Route::get('/renovacion/{id}/archivo', [RenovacionController::class, 'verArchivo'])->name('renovacion.verArchivo');

