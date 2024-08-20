<?php

namespace App\Livewire;

use App\Models\estudiante;
use Livewire\Component;
use App\Models\Inscripcione;
use App\Models\Tercero;

class BuscarInscripcion extends Component
{
    public $num_docu;
    public $inscripcion;
    public $alertMessage = null;

    public function buscarInscripcion()
    {
        $estudiante = Estudiante::where('documento', $this->num_docu)->first();

        if (!$estudiante) {
            session()->flash('alert', 'No se encontró un estudiante con este número de documento.');
        return;
        }
    
        $this->inscripcion = Inscripcione::where('estudiante_id', $estudiante->id)
                                         ->where('pago', false)
                                         ->first();
    
        if (!$this->inscripcion) {
            session()->flash('alert', 'No se encontró una inscripción pendiente de pago para este documento.');
            return;
        }
    
        // Aquí puedes acceder a los datos relacionados
        $nombreEstudiante = $this->inscripcion->estudiante->nombre;
        $nombreCurso = $this->inscripcion->curso->nombre_curso;
        $nombrePlan = $this->inscripcion->plan->nombre;
    
    }

    public function pagarInscripcion()
    {
        if ($this->inscripcion && $this->inscripcion->payment_link) {
            return redirect($this->inscripcion->payment_link);
        }

        $this->dispatchBrowserEvent('alert', ['type' => 'error', 'message' => 'No se encontró el link de pago para esta inscripción.']);
    }

    public function render()
    {
        return view('livewire.buscar-inscripcion');
    }
}
