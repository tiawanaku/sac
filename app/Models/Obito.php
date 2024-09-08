<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Obito extends Model
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
        'fotocopias_comprobantes_entierro_ultima_renovacion',
        'fotocopia_cedula_identidad_fallecido',
        'fotocopia_cedula_identidad_solicitante',
        'orden_judicial',
    ];
}
