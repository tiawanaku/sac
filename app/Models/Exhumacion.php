<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exhumacion extends Model
{
    use HasFactory;
    protected $fillable = ['motivo_exhumacion', 'fecha_exhumacion', 'costo_formulario', 'costo_servicio', 'costo_total'];
}