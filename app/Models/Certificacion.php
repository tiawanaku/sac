<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificacion extends Model
{
    use HasFactory;

    // Define the table associated with the model
    protected $table = 'certificaciones';

    // Specify the attributes that are mass assignable
    protected $fillable = [
        'ci_nit',
        'nombre_contribuyente',
        'direccion',
        'numero_puerta',
        'zona',
        'numero_comprobante',
        'difunto',
        'monto',
        'nota_director_servicios_municipales',
        'fotocopia_cedula_identidad_usuario',
        'fotocopia_documento_certificacion'
    ];
}