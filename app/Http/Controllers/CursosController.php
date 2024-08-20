<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\curso;

class CursosController extends Controller
{
   
    function index(){

        return view('forms.cursos.create');
   }

   public function edit($id)
   {
               $curso = curso::findOrFail($id);
               return view('forms.cursos.edit', compact('curso'));
    }


   public function store(Request $request)
{
    $request->validate([
        'nombre_curso' => 'required|string|max:255',
        'edadMin' => 'required|integer|min:0',
        'edadMax' => 'required|integer|gte:edadMin',
        'limite' => 'required|integer|min:1',
    ]);
    
    Curso::create([
        'nombre_curso' => $request->nombre_curso,
        'edadMin' => $request->edadMin,
        'edadMax' => $request->edadMax,
        'limite' => $request->limite,
    ]);
    

    return redirect()->route('cursos')->with('success', 'curso creado exitosamente.');
}


public function update(Request $request, $curso)
{
   
    $request->validate([
        'nombre_curso' => 'required|string|max:255',
        'edadMin' => 'required|integer|min:0',
        'edadMax' => 'required|integer|gte:edadMin',
        'limite' => 'required|integer|min:1',
    ]);
  
    $curso = curso::findOrFail($curso);
    $curso->nombre_curso = $request->nombre_curso;
    $curso->edadMin  = $request->edadMin;
    $curso->edadMax = $request->edadMax;
    $curso->limite = $request->limite;
    $curso->save();

    return redirect()->route('cursos')->with('success', 'curso actualizado exitosamente.');
}


 // Método para eliminar un estudiante
 public function destroy($id)
 {
     $estudiante = curso::findOrFail($id);
     $estudiante->delete();

     return redirect('/cursos')->with('success', 'curso eliminado exitosamente.');
 }
}
