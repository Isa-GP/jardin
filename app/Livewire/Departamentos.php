<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Municipio;
use App\Models\Departamento;

class Departamentos extends Component
{
    public $departamentos;
    public $municipios = [];
    public $selectedDepartamento = null;
    public $selectedMunicipio = null;

    public function mount()
    {
        // Cargar todos los departamentos al montar el componente
        $this->departamentos = Departamento::all();
    }

    public function SelectedDepartamento()
    {
        // Cargar los municipios correspondientes al departamento seleccionado
        $this->municipios = Municipio::where('departamento_id', $this->selectedDepartamento)->get();
        $this->selectedMunicipio = null; // Reiniciar la selección de municipio
    }

    public function SelectedMunicipio()
    {
        // Aquí podrías agregar lógica adicional si es necesario cuando se selecciona un municipio.
        // Por ejemplo, podrías almacenar el municipio seleccionado en la base de datos o hacer otras operaciones.
    }

    public function render()
    {
        return view('livewire.departamentos', [
            'departamentos' => $this->departamentos
        ]);
    }
}
