<?php

namespace App\Http\Controllers;
use App\Models\Preinscripcion;

use Illuminate\Http\Request;

class PreinscripcionController extends Controller
{
   public function store(Request $request){
     
     // Validar los datos del formulario
     $request->validate([
        'nombre' => 'required|string|max:100',
        'apellido' => 'required|string|max:100',
        'fechaNacimiento' => 'required|date',
        'nombrePadre' => 'required|string|max:100',
        'telefono' => 'required|string|max:20',
        'email' => 'required|email|max:100',
        'curso' => 'required|string|max:50',
    ]);

    // Guardar los datos en la base de datos
    Preinscripcion::create([
        'nombre_alumno' => $request->nombre,
        'apellido_alumno' => $request->apellido,
        'fecha_nacimiento' => $request->fechaNacimiento,
        'nombre_padre' => $request->nombrePadre,
        'telefono' => $request->telefono,
        'email' => $request->email,
        'curso' => $request->curso,
    ]);

    return response()->json(['success' => true, 'message' => 'Preinscripción enviada correctamente.']);


   }
}
