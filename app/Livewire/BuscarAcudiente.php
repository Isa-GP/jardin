<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Tercero;

class BuscarAcudiente extends Component
{
    public $num_docu;
    public $tipo_docuId;
    public $nombres;
    public $apellidos;
    public $edad_padre;
    public $celular;
    public $direccion;
    public $barrio;
    public $departamento;
    public $municipio;
    public $correo;
    public $parentesco;
    public $profesion;

    public function buscarAcudiente()
    {
        $acudiente = Tercero::where('num_docu', $this->num_docu)->first();

        if ($acudiente) {
            $this->tipo_docuId = $acudiente->tipo_docuId;
            $this->nombres = $acudiente->nombres;
            $this->apellidos = $acudiente->apellidos;
            $this->edad_padre = $acudiente->edad;
            $this->celular = $acudiente->celular;
            $this->direccion = $acudiente->direccion;
            $this->barrio = $acudiente->barrio;
            $this->departamento = $acudiente->departamento_id;
            $this->municipio = $acudiente->municipio_id;
            $this->correo = $acudiente->correo;
            $this->parentesco = $acudiente->parentesco;
            $this->profesion = $acudiente->profesion;
        } else {
            // Si no encuentra el acudiente, resetea los campos
            $this->reset(['tipo_docuId', 'nombres', 'apellidos', 'edad_padre', 'celular', 'direccion', 'barrio', 'departamento', 'municipio', 'correo', 'parentesco', 'profesion']);
        }
    }

    public function render()
    {
        return view('livewire.buscar-acudiente');
    }
}
