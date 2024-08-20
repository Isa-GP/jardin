<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class curso extends Model
{
    use HasFactory;

    protected $fillable = ['nombre_curso', 'edadMin', 'edadMax', 'limite'];

    public function planes()
    {
        return $this->hasMany(Plan::class, 'curso_id');
    }
    public function inscripciones()
    {
        return $this->hasMany(Inscripcione::class);
    }
}
