<?php

namespace App\Livewire;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UserTable extends Component
{
   
    use WithPagination;

    public $searchTerm = '';
    public $sortField = 'name';
    public $sortAsc = true;

    protected $listeners = ['deleteUser'];

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function deleteUser($userId)
{
    $user = User::find($userId);

    if ($user) {
        $user->delete();
        session()->flash('message', 'Usuario eliminado exitosamente.');
    }
}


    public function render()
    {
        $searchTerm = '%' . $this->searchTerm . '%';
        $users = User::where('name', 'like', $searchTerm)
            ->orWhere('email', 'like', $searchTerm)
            ->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc')
            ->paginate(10);

        return view('livewire.user-table', [
            'users' => $users,
        ]);
    }
}
