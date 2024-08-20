<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Estudiante;

class DataTables extends Component
{
   
    use WithPagination;

    public $searchTerm = '';
    public $sortField = 'nombre';
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

        $estudiantes = Estudiante::where('documento', 'like', $searchTerm)
            ->orWhere('tipo_docuid', 'like', $searchTerm)
            ->orWhere('nombre', 'like', $searchTerm)
            ->orWhere('fecha_nacimiento', 'like', $searchTerm)
            ->orWhere('edad', 'like', $searchTerm)
            ->orWhere('alergias', 'like', $searchTerm)
            ->orWhere('eps', 'like', $searchTerm)
            ->orWhere('plan_id', 'like', $searchTerm)
            ->orWhere('nume_docu_acud', 'like', $searchTerm)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate(10);

        return view('livewire.estudiantes-table', ['estudiantes' => $estudiantes]);
    }
}
