<?php

return [

    // Configuración predeterminada de autenticación
    'defaults' => [
        'guard' => env('AUTH_GUARD', 'web'),
        'passwords' => env('AUTH_PASSWORD_BROKER', 'users'),
    ],

    // Definición de guardias de autenticación
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
        'admin' => [  // Guard para el panel admin
            'driver' => 'session',
            'provider' => 'admins',
        ],
        'tarapaca' => [  // Guard para el panel tarapaca
            'driver' => 'session',
            'provider' => 'tarapacas',
        ],
    ],

    // Proveedores de usuarios
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => env('AUTH_MODEL', App\Models\User::class),
        ],
        'admins' => [  // Proveedor de usuarios para el panel admin
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],
        'tarapacas' => [  // Proveedor de usuarios para el panel tarapaca
            'driver' => 'eloquent',
            'model' => App\Models\Tarapaca::class,
        ],
    ],

    // Configuración para restablecer contraseñas
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => env('AUTH_PASSWORD_RESET_TOKEN_TABLE', 'password_reset_tokens'),
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    // Timeout de confirmación de contraseña
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
];
