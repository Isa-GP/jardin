<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inscripcione;
use App\Models\Estudiante;

class PaymentController extends Controller
{
    public function success($id)
    {
        // Buscar la inscripción por ID
        $inscripcion = Inscripcione::find($id);
    
        if ($inscripcion) {
            // Marcar el pago como realizado
            $inscripcion->update([
                'pago' => true,
            ]);
    
            // Marcar al estudiante como activo
            $estudiante = $inscripcion->estudiante;
            
            
            // Actualizar la inscripción con el link de pago


            $plan = Estudiante::findOrFail($estudiante);
            $plan->estado = 1;
            $plan->save();
           
            // Redirigir a una vista de éxito o cualquier otra vista que necesites
            return view('page.paymen-success', ['inscripcion' => $inscripcion]);
        }
    
        // Si la inscripción no se encuentra, redirigir con un mensaje de error
        return redirect()->route('home')->with('error', 'Inscripción no encontrada');
    }
    
}
