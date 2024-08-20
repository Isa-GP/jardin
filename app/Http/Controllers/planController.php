<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\plan;


class planController extends Controller
{
   function index(){

        return view('forms.planes.create');
   }

   public function edit($id)
   {
               $plan = plan::findOrFail($id);
               return view('forms.planes.edit', compact('plan'));
    }


   public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'cursoid' => 'required|string|max:255',
        'valor' => 'required|numeric|min:0',
    ]);

    Plan::create([
        'nombre' => $request->nombre,
        'curso_id' => $request->cursoid,
        'valor' => $request->valor,
    ]);

    return redirect()->route('planes')->with('success', 'Plan creado exitosamente.');
}


public function update(Request $request, $plan)
{
   
    $request->validate([
        'nombre' => 'required|string|max:255',
        'cursoid' => 'required|string|max:255',
        'valor' => 'required|numeric|min:0',
    ]);
  
    $plan = Plan::findOrFail($plan);
    $plan->nombre = $request->nombre;
    $plan->curso_id  = $request->cursoid;
    $plan->valor = $request->valor;
    $plan->save();

    return redirect()->route('planes')->with('success', 'Plan actualizado exitosamente.');
}


 // Método para eliminar un plan
 public function destroy($id)
 {
     $estudiante = Plan::findOrFail($id);
     $estudiante->delete();

     return redirect('/planes')->with('success', 'curso eliminado exitosamente.');
 }
}
