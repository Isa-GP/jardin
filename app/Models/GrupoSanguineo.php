<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GrupoSanguineo extends Model
{
    use HasFactory;

    protected $table = 'grupo_sanguineo';

    // Relación corregida con la clave foránea correcta
    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'tipo_sangre_id'); // 'tipo_sangre_id' es la clave foránea en la tabla estudiantes
    }
}
