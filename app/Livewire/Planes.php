<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Plan;
use Livewire\WithPagination;

class Planes extends Component
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

        $Planes = Plan::where('nombre', 'like', $searchTerm)
        ->orWhereHas('curso', function($query) use ($searchTerm) {
            $query->where('nombre_curso', 'like', '%' . $searchTerm . '%');
        })
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate(10);

        return view('livewire.planes', ['Planes' => $Planes]);
    }
}
