<div>
    <div class="form-group">
        <label for="num_docu">Número de Documento:</label>
        <input type="text" class="form-control"  name="num_docu" wire:model="num_docu" wire:change="buscarAcudiente">
    </div>

    @if (session()->has('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <div class="form-group">
        <label for="tipo_docuId">Tipo de Documento:</label>
        <select class="form-control" name="tipo_docuId_padre"  wire:model="tipo_docuId">
            <option value="6">Cédula</option>
            <option value="7">Pasaporte</option>
            <option value="8">Cédula de Extranjería</option>
        </select>
    </div>
    <div class="form-group">
        <label for="nombres">Nombres:</label>
        <input type="text" class="form-control" name="nombres" wire:model="nombres">
    </div>
    <div class="form-group">
        <label for="apellidos">Apellidos:</label>
        <input type="text" class="form-control" name="apellidos" wire:model="apellidos">
    </div>
    <div class="form-group">
        <label for="edad_padre">Edad:</label>
        <input type="text" class="form-control" name="edad_padre" wire:model="edad_padre">
    </div>
    <div class="form-group">
        <label for="celular">Celular:</label>
        <input type="text" class="form-control" name="celular" wire:model="celular">
    </div>
    <div class="form-group">
        <label for="direccion">Dirección:</label>
        <input type="text" class="form-control" name="direccion" wire:model="direccion">
    </div>
    <div class="form-group">
        <label for="barrio">Barrio:</label>
        <input type="text" class="form-control" name="barrio" wire:model="barrio">
    </div>
    @livewire('departamentos')
    <div class="form-group">
        <label for="correo">Correo:</label>
        <input type="email" class="form-control" name="correo" wire:model="correo">
    </div>
    <div class="form-group">
        <label for="parentesco">Parentesco:</label>
        <input type="text" class="form-control" name="parentesco" wire:model="parentesco">
    </div>
    <div class="form-group">
        <label for="profesion">Profesión:</label>
        <input type="text" class="form-control" name="profesion" wire:model="profesion">
    </div>
</div>
