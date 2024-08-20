<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tercero extends Model
{
    use HasFactory;


    protected $fillable = [
        'tipo_docuId',
        'num_docu',
        'nombres',
        'apellidos',
        'edad',
        'celular',
        'direccion',
        'barrio',
        'departamento_id',
        'municipio_id',
        'correo',
        'parentesco',
        'profesion'
    ];
}
