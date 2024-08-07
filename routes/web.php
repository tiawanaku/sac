<?php

use Illuminate\Support\Facades\Route;

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