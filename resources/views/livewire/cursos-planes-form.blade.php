


<div>
    <div class="form-group">
        <label for="curso">Curso:</label>
        <select class="form-control" id="curso" wire:model="selectedCurso" name="curso" wire:click="SelectedPlan" >
            <option value="">Seleccione un curso</option>
            @foreach($cursos as $curso)
                <option value="{{ $curso->id }}">{{ $curso->nombre_curso }} ({{ $curso->edadMin }} a {{ $curso->edadMax }} años)</option>
            @endforeach
        </select>
    </div>
    @if(!is_null($selectedCurso) && count($planes) > 0)
        <div class="form-group">
            <label for="plan">Plan:</label>
            <select class="form-control" id="plan" wire:model="selectedPlan" name="plan" wire:change="SelectedPlan" >
                <option value="">Seleccione un plan</option>
                @foreach($planes as $plan)
                    <option value="{{ $plan->id }}">{{ $plan->nombre }}</option>
                @endforeach
            </select>
        </div>
    @endif
    @if(!is_null($selectedPlan))
        <div class="form-group">
            <label for="valorMatricula">Valor de la Matrícula:</label>
            <input type="text" class="form-control" id="valorMatricula" name="valorMatricula" wire:model="valor" readonly>
        </div>
    @endif


</div>
