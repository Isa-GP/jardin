<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Curso;
use App\Models\Plan;

class CursosPlanesForm extends Component
{
    public $cursos;
    public $planes = [];
    public $selectedCurso = null;
    public $selectedPlan = null;
    public $valor = null;

    public function mount()
    {
        $this->cursos = Curso::all();
    }

    public function updatedSelectedCurso()
    {
        $this->planes = Plan::where('curso_id', $this->selectedCurso)->get();
        $this->selectedPlan = null;
        $this->valor = null;

       
    }

    public function SelectedPlan()
    {
        $plan = Plan::find($this->selectedPlan);
        $this->valor = $plan ? $plan->valor : null;
    }

    public function render()
    {
        return view('livewire.cursos-planes-form', [
            'cursos' => $this->cursos
            
        ]);
    }
}
