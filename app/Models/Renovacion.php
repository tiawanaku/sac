<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renovacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'ci_nit',
        'nombre_contribuyente',
        'direccion',
        'numero_casa',
        'zona',
        'fecha_renovacion',
        'fecha_vencimiento',
        'difunto',
        'monto',
        'comprobante_renovacion',  // Añadir el campo para el archivo
    ];
}
