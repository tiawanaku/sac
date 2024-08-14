<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhumacion extends Model
{
    protected $fillable = [
        'motivo_exhumacion',
        'costo_formulario',
        'costo_servicio',
        'fecha_exhumacion',
        'comprobante_pdf',
    ];
    // Accessor para obtener la URL completa del PDF
    public function getPdfUrlAttribute()
    {
        return asset('storage/' . $this->comprobante_pdf);
    }
}