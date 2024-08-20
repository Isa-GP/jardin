<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoDocu extends Model
{
  
    use HasFactory;

    protected $table = 'tipo_docu';

    public function estudiantes()
    {
        return $this->hasMany(Estudiante::class, 'tipo_docuid');
    }
}
