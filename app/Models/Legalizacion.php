<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Legalizacion extends Model
{
    use HasFactory;

    protected $fillable = [
        'ci_nit',
        'nombre_contribuyente',
        'direccion',
        'numero_casa',
        'zona',
        'numero_comprobante',
        'difunto',
        'monto',
        'nota_director_servicios_municipales',
        'fotocopia_cedula_identidad_usuario',
        'fotocopia_documento_legalizar',
    ];
}