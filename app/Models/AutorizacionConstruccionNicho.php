<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorizacionConstruccionNicho extends Model
{
    use HasFactory;

    protected $table = 'autorizacion_construccion_nichos';

    protected $fillable = [
        'nombre_contribuyente',
        'apellido_paterno_contribuyente', // Actualizado
        'apellido_materno_contribuyente', // Nuevo campo
        'apellido_esposa_contribuyente',  // Nuevo campo
        'ci_nit',
        'avenida_calle',
        'numero',
        'zona',
        'numero_celular',
        'numero_comprobante', // Nuevo campo
        'nombre_difunto',
        'apellido_paterno_difunto', 
        'apellido_materno_difunto',
        'apellido_esposa_difunto',
        'numero_carnet_difunto', // Nuevo campo
        'actividad',
        'costo_formulario',
        'costo',
        'fecha_autorizacion',
        'comprobante_pdf',
    ];
    
    
    public $timestamps = true;
}