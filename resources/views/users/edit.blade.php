
@extends('dashboard')

@section('title', 'Editar Usuarios')

@section('content_header')
    <h1>Editar Usuarios</h1>
@stop

@section('content')
   
<form action="{{ route('users.update', $user->id) }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    @method('PUT')
    <h4 class="mb-4">Editar Usuario</h4>

    <!-- Campo para el nombre -->
    <div class="form-group mb-3">
        <label for="name">Nombre</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name) }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Campo para el email -->
    <div class="form-group mb-3">
        <label for="email">Correo Electrónico</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Campo para la contraseña -->
    <div class="form-group mb-3">
        <label for="password">Contraseña (dejar en blanco si no desea cambiarla)</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Campo para confirmar la contraseña -->
    <div class="form-group mb-4">
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
    </div>

    <!-- Botón de enviar -->
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        <a href="{{ route('users') }}" class="btn btn-secondary">Cancelar</a>
    </div>
</form>

@stop

@section('css')
    @livewireStyles
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
@stop

