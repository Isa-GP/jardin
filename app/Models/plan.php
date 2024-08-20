<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plan extends Model
{
    use HasFactory;

    protected $fillable = ['nombre', 'curso_id', 'valor'];

    public function curso()
    {
        return $this->belongsTo(Curso::class, 'curso_id');
    }
    public function inscripciones()
    {
        return $this->hasMany(Inscripcione::class);
    }
}
