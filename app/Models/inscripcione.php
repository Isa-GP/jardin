<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class inscripcione extends Model
{
    use HasFactory;

    protected $fillable = [
        'estudiante_id',
        'tercero_id',
        'curso_id',
        'plan_id',
        'fecha_inscripcion',
        'valor',
        'pago'
    ];



    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class);
    }

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }

    public function plan()
    {
        return $this->belongsTo(Plan::class);
    }

    public function tercero()
    {
        return $this->belongsTo(Tercero::class, 'tercero_id');
    }
}
