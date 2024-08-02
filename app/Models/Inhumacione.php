<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inhumacione extends Model
{
    use HasFactory;

    // Tabla asociada al modelo
    protected $table = 'inhumaciones';

    // Los atributos que son asignables en masa
    protected $fillable = [
        'nombre_difunto',
        'sexo',
        'edad',
        'estado_civil',
        'nacionalidad',
        'diagnostico_fallecimiento',
        'medico',
        'orc',
        'libro',
        'folio',
        'fecha_inhumacion',
        'fecha_vencimiento',
        'dia',
        'descripcion_nicho',
        'nombre_apellido_solicitante',
        'carnet_identidad',
        'celular',
        'direccion',
        'numero',
        'zona',
    ];

    // Los atributos que deberían ser tratados como fechas
    protected $dates = [
        'fecha_inhumacion',
        'fecha_vencimiento',
    ];

    // Las reglas de validación del modelo (si las usas en el modelo)
    public static $rules = [
        'nombre_difunto' => 'required|string|max:255',
        'sexo' => 'required|in:masculino,femenino',
        'edad' => 'required|integer|min:1|max:99',
        'estado_civil' => 'required|in:soltero,casado,divorciado,viudo',
        'nacionalidad' => 'required|string|max:255',
        'diagnostico_fallecimiento' => 'required|string|max:255',
        'medico' => 'required|string|max:255',
        'orc' => 'required|string|max:255',
        'libro' => 'required|string|max:255',
        'folio' => 'required|string|max:255',
        'fecha_inhumacion' => 'required|date',
        'fecha_vencimiento' => 'required|date',
        'dia' => 'required|string|max:255',
        'descripcion_nicho' => 'required|string',
        'nombre_apellido_solicitante' => 'required|string|max:255',
        'carnet_identidad' => 'required|string|max:255',
        'celular' => 'required|numeric',
        'direccion' => 'required|string|max:255',
        'numero' => 'required|string|max:255',
        'zona' => 'required|string|max:255',
    ];
}