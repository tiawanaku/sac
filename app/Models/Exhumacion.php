<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhumacion extends Model
{
    protected $fillable = [
        'motivo_exhumacion',
        'nombre_servicio',
        'costo_formulario',
        'costo_servicio',
        'comprobante_pdf',
        'autorizacion_pdf',  // Asegúrate de que este campo esté aquí
        'fecha_exhumacion',
    ];
    // Accessor para obtener la URL completa del PDF
    public function getPdfUrlAttribute()
    {
        return asset('storage/' . $this->comprobante_pdf);
    }
}