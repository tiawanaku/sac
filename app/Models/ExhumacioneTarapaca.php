<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExhumacioneTarapaca extends Model
{
    // Especificar la conexión de base de datos para este modelo
    protected $connection = 'tarapaca';
    protected $table = 'exhumacione_tarapacas'; // Especificar el nombre de la tabla

    use HasFactory;

    protected $fillable = [

        'nombre_contribuyente',
        'numero_celular',
        'ci_nit',
        'avenida_calle',
        'numero_puerta',
        'zona',
        'nombre_difunto',

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