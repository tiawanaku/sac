<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inhumacione extends Model
{
    use HasFactory;

    // Los atributos que son asignables en masa
    protected $fillable = [
        'nombres_difunto',
        'apellido_paterno_difunto',
        'apellido_materno_difunto',
        'apellido_esposa_difunto',
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
        'fila_ubicacion',
        'nro_ubicacion',
        'sector_ubicacion',
        'nombres_solicitante',
        'apellido_paterno_solicitante',
        'apellido_materno_solicitante',
        'apellido_esposa_solicitante',
        'carnet_identidad',
        'celular',
        'direccion',
        'numero',
        'zona',
        'numero_comprobante', // Añadido 'numero_comprobante'
        'comprobante_pdf',
        'testigos_pdf',
        'familiares_pdf',
        'defuncion_pdf',
    ];
    
    

    // Los atributos que deberían ser tratados como fechas
    protected $dates = [
        'fecha_inhumacion',
        'fecha_vencimiento',
    ];

    // Sobrescribir el método setAttribute para convertir arrays a JSON
    public function setAttribute($key, $value)
    {
        if (in_array($key, ['familiares_pdf']) && is_array($value)) {
            $this->attributes[$key] = json_encode($value);
        } else {
            parent::setAttribute($key, $value);
        }
    }

    // Definir la relación con el modelo Ubicacion
    public function ubicacion()
    {
        return $this->belongsTo(Ubicacion::class);
    }
}
