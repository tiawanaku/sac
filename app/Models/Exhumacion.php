<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhumacion extends Model
{
    protected $fillable = [
        'nombre_contribuyente',
        'apellido_paterno_contribuyente', // Nuevo campo
        'apellido_materno_contribuyente', // Nuevo campo
        'apellido_esposa_contribuyente',  // Nuevo campo
        'ci_nit',
        'avenida_calle',
        'numero_puerta',
        'zona',
        'numero_celular',
        'numero_comprobante', // Nuevo campo
        'nombre_difunto',
        'apellido_paterno_difunto',
        'apellido_materno_difunto',
        'apellido_esposa_difunto',
        'numero_carnet_difunto', // Nuevo campo
        'motivo_exhumacion',
        'nombre_servicio',
        'costo_formulario', // Actualizado: anteriormente 'costo_formulario'
        'costo_servicio',
        'fecha_exhumacion',
        'comprobante_pdf',
        'autorizacion_pdf',
    ];
    
    
    // Accessor para obtener la URL completa del PDF
    public function getPdfUrlAttribute()
    {
        return asset('storage/' . $this->comprobante_pdf);
    }
}