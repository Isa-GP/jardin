<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\curso;

class SearchCourses extends Component
{
   
    public $search = '';
    public $courses = [];
    public $selectedCourse = '';

    public function buscar()
    {
        if (!empty($this->search)) {
            $this->courses = curso::where('nombre_curso', 'like', '%' . $this->search . '%')->get();
           
        } else {
            $this->courses = [];
        }
    }

    public function selectCourse($courseId)
    {
        $course = curso::find($courseId);
        if ($course) {
            $this->search = $course->curso;
            $this->courses = [];
    
            // Despacha un evento con el ID y el nombre del curso
            $this->dispatch('courseSelected', [
                'id' => $course->id,
                'name' => $course->nombre_curso
            ]);
        }
    }

    public function render()
    {
        return view('livewire.search-courses');
    }
}
