<?php

return [

    // Configuración de Broadcasting (Opcional)
    'broadcasting' => [
        // Configuración de Laravel Echo si se requiere...
    ],

    // Sistema de archivos predeterminado
    'default_filesystem_disk' => env('FILAMENT_FILESYSTEM_DISK', 'public'),

    // Ruta de los recursos de Filament
    'assets_path' => null,

    // Ruta del caché
    'cache_path' => base_path('bootstrap/cache/filament'),

    // Retraso de carga de Livewire
    'livewire_loading_delay' => 'default',

    // Definición de paneles
    'panels' => [
        'admin' => [
            'path' => 'admin',
            'middleware' => ['web', 'auth:admin'], // Middleware específico para el panel admin
        ],
        'tarapaca' => [
            'path' => 'tarapaca',
            'middleware' => ['web', 'auth:tarapaca'], // Middleware específico para el panel tarapaca
        ],
    ],
];
