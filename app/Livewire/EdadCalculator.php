<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class EdadCalculator extends Component
{
    public $fecha_nacimiento;
    public $edad;

    public function calculateEdad()
    {
        if ($this->fecha_nacimiento) {
            $this->edad = Carbon::parse($this->fecha_nacimiento)->age;
        } else {
            $this->edad = null;
        }
    }

    public function render()
    {
        return view('livewire.edad-calculator', [
            'edad' => $this->edad 
        ]);
    }
}
