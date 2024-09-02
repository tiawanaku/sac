<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenovacionTarapaca extends Model
{
    use HasFactory;

    // Especificar la conexión de base de datos para este modelo
    protected $connection = 'tarapaca';

    // Especificar la tabla si es diferente del nombre del modelo
    protected $table = 'renovacions_tarapaca'; // Cambia esto si la tabla tiene otro nombre

    // Los atributos que son asignables en masa
    protected $fillable = [
        'ci_nit',
        'nombre_contribuyente',
        'direccion',
        'numero_casa',
        'zona',
        'difunto',
        'monto',
        'fecha_renovacion',
        'fecha_vencimiento',
        'comprobante_renovacion',
    ];

    // Los atributos que deberían ser tratados como fechas
    protected $dates = [
        'fecha_renovacion',
        'fecha_vencimiento',
    ];
}
