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
        'apellido_paterno_contribuyente', // Campo adicional
        'apellido_materno_contribuyente', // Campo adicional
        'apellido_esposa_contribuyente',  // Campo adicional
        'direccion',
        'numero_casa', // Actualizado: anteriormente 'numero_puerta'
        'zona',
        'numero_celular', // Campo adicional
        'numero_comprobante',
        'nombre_difunto', // Actualizado: anteriormente 'difunto'
        'apellido_paterno_difunto',
        'apellido_materno_difunto',
        'apellido_esposa_difunto',
        'numero_carnet_difunto', // Campo adicional
        'monto',
        'nota_director_servicios_municipales',
        'fotocopia_cedula_identidad_usuario',
        'fotocopia_documento_certificacion',
    ];
    
    
}