<div>
    <div class="form-group">
        <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
        <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" wire:model="fecha_nacimiento" wire:change="calculateEdad" >
    </div>
    @if(!is_null($edad))
        <div class="form-group">
            <label for="edad">Edad:</label>
            <input type="text" class="form-control" id="edad" name="edad" wire:model="edad" readonly>
        </div>
    @endif
</div>
