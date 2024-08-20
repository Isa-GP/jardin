<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\estudiante;

class estudiantes extends Controller
{



    

    public function store(Request $request)
    {
         // Crear una nueva instancia del modelo Estudiante y asignar los valores
         $estudiante = new Estudiante();
         $estudiante->documento = $request->Documento;
         $estudiante->tipo_docuid  = $request->Tipodc;
         $estudiante->nombre = $request->Nombre;
         $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
         $estudiante->edad = $request->Edad;
         $estudiante->tipo_sangre_id = $request->RH;
         $estudiante->estado = $request->Estado;
         $estudiante->alergias = $request->Alergias; 
         $estudiante->Eps = $request->Eps;
         $estudiante->plan_id  = $request->Plan;
         $estudiante->nume_docu_acud  = $request->idacudiente;
 
         // Guardar el estudiante en la base de datos
         $estudiante->save();
 
         // Redireccionar a una página de éxito o donde desees
         return redirect('/Estudiantes')->with('success', 'Estudiante creado exitosamente.');
        }



                // Mostrar el formulario de edición con los datos del estudiante
      public function edit($id)
    {
                $estudiante = Estudiante::findOrFail($id);
                return view('forms.estudiantes.edit', compact('estudiante'));
     }


             // Actualizar los datos del estudiante
    public function update(Request $request, $id)
    {
      

        $estudiante = Estudiante::findOrFail($id);
        $estudiante->documento = $request->Documento;
        $estudiante->tipo_docuid = $request->Tipodc;
        $estudiante->nombre = $request->Nombre;
        $estudiante->fecha_nacimiento = $request->fecha_nacimiento;
        $estudiante->edad = $request->Edad;
        $estudiante->rh = $request->RH;
        $estudiante->estado = $request->Estado;
        $estudiante->alergias = $request->Alergias;
        $estudiante->eps = $request->Eps;
        $estudiante->plan_id = $request->Plan;
        $estudiante->nume_docu_acud = $request->idacudiente;

        $estudiante->save();

        return redirect('/Estudiantes')->with('success', 'Estudiante actualizado exitosamente.');
    }



    // Método para eliminar un estudiante
    public function destroy($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->delete();

        return redirect('/Estudiantes')->with('success', 'Estudiante eliminado exitosamente.');
    }
}
