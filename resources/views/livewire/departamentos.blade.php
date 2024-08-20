<div>
    <div class="form-group">
        <label for="departamento">Departamento:</label>
        <select class="form-control" id="departamento" name="departamento" wire:model="selectedDepartamento" wire:change="SelectedDepartamento" >
            <option value="">Seleccione un departamento</option>
            @foreach($departamentos as $departamento)
                <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
            @endforeach
        </select>
    </div>

    @if(!is_null($selectedDepartamento) && count($municipios) > 0)
        <div class="form-group">
            <label for="municipio">Municipio:</label>
            <select class="form-control" id="municipio" name="municipio" wire:model="selectedMunicipio" wire:change="SelectedMunicipio" >
                <option value="">Seleccione un municipio</option>
                @foreach($municipios as $municipio)
                    <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                @endforeach
            </select>
        </div>
    @endif
</div>

