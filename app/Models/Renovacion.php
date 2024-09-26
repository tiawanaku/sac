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
        'comprobante_renovacion', // Campo para el archivo
    
        // Campos adicionales agregados
        'numero_comprobante',
        'apellido_paterno_difunto',
        'apellido_materno_difunto',
        'apellido_esposa_difunto',
        'apellido_paterno_solicitante',
        'apellido_materno_solicitante',
        'apellido_esposa_solicitante',
    ];
    
}
