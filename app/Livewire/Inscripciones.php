<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\inscripcione;
use Illuminate\Support\Facades\DB;

class Inscripciones extends Component
{
    use WithPagination;

    public $searchTerm = '';
    public $sortField = 'id';
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

      $inscripciones = Inscripcione::join('estudiantes', 'inscripciones.estudiante_id', '=', 'estudiantes.id')
      ->join('terceros', 'inscripciones.tercero_id', '=', 'terceros.id')
      ->join('plans', 'inscripciones.plan_id', '=', 'plans.id')
      ->select('inscripciones.*', 'estudiantes.nombre as estudiante_nombre', DB::raw("CONCAT(terceros.nombres, ' ', terceros.apellidos) as tercero_nombre_completo"), 'plans.nombre as plan_nombre')
      ->where('estudiantes.nombre', 'like', $searchTerm)
      ->orWhere(DB::raw("CONCAT(terceros.nombres, ' ', terceros.apellidos)"), 'like', $searchTerm)
      ->orWhere('plans.nombre', 'like', $searchTerm)
      ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
      ->paginate(10);

    return view('livewire.inscripciones', ['inscripciones' => $inscripciones]);
    }
}
