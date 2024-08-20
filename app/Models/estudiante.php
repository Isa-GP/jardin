<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class estudiante extends Model
{
    use HasFactory;

    protected $fillable = [
        'documento', 'tipo_docuId', 'nombre', 'fecha_nacimiento', 'edad', 'alergias', 'eps', 'plan_id', 'nume_docu_acud', 'tipo_sangre_id'
    ];

    public function tipoDocumento()
    {
        return $this->belongsTo(TipoDocu::class, 'tipo_docuid');
    }

    public function grupoSanguineo()
    {
        return $this->belongsTo(GrupoSanguineo::class, 'tipo_sangre_id');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcione::class);
    }
}
