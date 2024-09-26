<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhumacion extends Model
{
    protected $fillable = [
        'nombre_contribuyente',
        'numero_celular',
        'ci_nit',
        'avenida_calle',
        'numero_puerta',
        'zona',
        'nombre_difunto',
        'apellido_paterno_difunto',
        'apellido_materno_difunto',
        'apellido_esposa_difunto',
        'apellido_paterno_solicitante',
        'apellido_materno_solicitante',
        'apellido_esposa_solicitante',
        'motivo_exhumacion',
        'nombre_servicio',
        'costo_formulario',
        'costo_servicio',
        'comprobante_pdf',
        'autorizacion_pdf',
        'fecha_exhumacion',
    ];
    
    // Accessor para obtener la URL completa del PDF
    public function getPdfUrlAttribute()
    {
        return asset('storage/' . $this->comprobante_pdf);
    }
}