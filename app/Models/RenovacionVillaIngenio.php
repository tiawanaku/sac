<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RenovacionVillaIngenio extends Model
{
    use HasFactory;

    protected $connection = 'ingenio';

    // Tabla asociada al modelo
    protected $table = 'renovacion_villa_ingenios';

    // Atributos asignables en masa
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
