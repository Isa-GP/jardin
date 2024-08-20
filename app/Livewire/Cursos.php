<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\curso;
use Livewire\WithPagination;

class Cursos extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $sortField = 'nombre_curso';
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

        $cursos = curso::where('nombre_curso', 'like', $searchTerm)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate(10);

        return view('livewire.cursos', ['cursos' => $cursos]);
    }
}
