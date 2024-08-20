<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preinscripcion extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre_alumno',
        'apellido_alumno',
        'fecha_nacimiento',
        'nombre_padre',
        'telefono',
        'email',
        'curso'
    ];
}
