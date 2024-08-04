<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ubicacion extends Model
{
    use HasFactory;

    protected $fillable = ['fila', 'columna'];

    // Si necesitas definir reglas de validación o algún otro comportamiento, hazlo aquí
}
