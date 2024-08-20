<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\tercero;

class Terceros extends Component
{


    
   
    use WithPagination;

    public $searchTerm = '';
    public $sortField = 'nombres';
    public $sortAsc = true;

    protected $updatesQueryString = ['searchTerm'];

    public function updatingSearchTerm()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function search()
    {
        $this->render();
    }

    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';

        $terceros = Tercero::where('num_docu', 'like', '%' . $searchTerm . '%')
        ->orWhere('tipo_docuid', 'like', '%' . $searchTerm . '%')
        ->orWhere('nombres', 'like', '%' . $searchTerm . '%')
        ->orWhere('apellidos', 'like', '%' . $searchTerm . '%')
        ->orWhere('edad', 'like', '%' . $searchTerm . '%')
        ->orWhere('celular', 'like', '%' . $searchTerm . '%')
        ->orWhere('direccion', 'like', '%' . $searchTerm . '%')
        ->orWhere('barrio', 'like', '%' . $searchTerm . '%')
        ->orWhere('departamento_id', 'like', '%' . $searchTerm . '%')
        ->orWhere('municipio_id', 'like', '%' . $searchTerm . '%')
        ->orWhere('correo', 'like', '%' . $searchTerm . '%')
        ->orWhere('parentesco', 'like', '%' . $searchTerm . '%')
        ->orWhere('profesion', 'like', '%' . $searchTerm . '%')
        ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
        ->paginate(10);
    

        return view('livewire.terceros-table', ['terceros' => $terceros]);
    }
   
}
