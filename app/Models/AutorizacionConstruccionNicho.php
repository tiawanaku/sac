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
        'ci_nit',
        'avenida_calle',
        'numero',
        'zona',
        'actividad',
        'costo_formulario',
        'costo',
        'numero_celular',
        'nombre_difunto',
        'fecha_autorizacion',
        'comprobante_pdf',
    
        // Campos adicionales
        'apellido_paterno_difunto',
        'apellido_materno_difunto',
        'apellido_esposa_difunto',
        'apellido_paterno_solicitante',
        'apellido_materno_solicitante',
        'apellido_esposa_solicitante',
    ];
    
    public $timestamps = true;
}