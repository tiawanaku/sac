<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorizacionConstruccionNichosTarapaca extends Model
{
    use HasFactory;
    // Especificar la conexión de base de datos para este modelo
    protected $connection = 'tarapaca';

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
    ];
    public $timestamps = true;
}