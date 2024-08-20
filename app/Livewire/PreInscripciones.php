<?php

namespace App\Livewire;


use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Preinscripcion;

class PreInscripciones extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $sortField = 'nombre_alumno';
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

        $estudiantes = Preinscripcion::where('nombre_alumno', 'like', $searchTerm)
            ->orWhere('apellido_alumno', 'like', $searchTerm)
            ->orWhere('nombre_padre', 'like', $searchTerm)
            ->orWhere('telefono', 'like', $searchTerm)
            ->orWhere('email', 'like', $searchTerm)
            ->orWhere('curso', 'like', $searchTerm)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate(10);

        return view('livewire.pre-inscripciones', ['estudiantes' => $estudiantes]);
    }
}
