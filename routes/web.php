<?php

use App\Http\Controllers\DonwloadPdfController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\ExhumacionController;
use App\Http\Controllers\InhumacionController;
use App\Filament\Resources\ExhumacionResource;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/consulta', function () {
    return view('consulta.index'); // Asegúrate de que este archivo esté en resources/views/consulta/index.blade.php
});

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

Route::get('/', function () {
    return view('welcome');
});

// Ruta corregida para la descarga del PDF
Route::get('/{record}/pdf/download', [DonwloadPdfController::class, 'donwload'])->name('inhumacion.pdf.download');
Route::get('/exhumacion/{id}/ver-pdf', [ExhumacionController::class, 'verPdf'])->name('exhumacion.verPdf');
Route::get('/inhumacion/{id}/ver-pdf', [InhumacionController::class, 'verPdf'])->name('inhumacion.verPdf');
Route::middleware('auth')->group(function () {
    Route::get('/filament/exhumacions/{record}/edit', [ExhumacionResource::class, 'edit'])
        ->name('filament.resources.exhumacions.edit');
});