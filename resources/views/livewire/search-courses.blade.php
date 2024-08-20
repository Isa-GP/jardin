<!-- resources/views/livewire/search-courses.blade.php -->
<div>
    <div class="input-group">
        <input type="text" value="{{ old('curso', $plan->curso_id  ?? '') }}" class="form-control" wire:model="search" id="nombre_curso" wire:change="buscar"  placeholder="Buscar curso...">
        <span class="input-group-text"><i class="fas fa-search"   ></i></span>
        
    </div>


    @if(!empty($courses))
        <ul class="list-group mt-2">
            @foreach($courses as $course)
                <li class="list-group-item list-group-item-action" wire:click="selectCourse({{ $course->id }})">
                     {{ $course->nombre_curso }} -edad Minima {{ $course->edadMin }}-edad Maxima {{ $course->edadMax }}
                </li>
            @endforeach
        </ul>
    @endif
</div>
