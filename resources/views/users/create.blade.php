
@extends('dashboard')

@section('title', 'Lista de cursos')

@section('content_header')
    <h1>creacion de Usuarios</h1>
@stop

@section('content')
<form action="{{ route('users.store') }}" method="POST" class="card p-4 shadow-sm">
    @csrf
    <h4 class="mb-4">Registrar Nuevo Usuario</h4>

    <!-- Campo para el nombre -->
    <div class="form-group mb-3">
        <label for="name">Nombre</label>
        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
        @error('name')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Campo para el email -->
    <div class="form-group mb-3">
        <label for="email">Correo Electrónico</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
        @error('email')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Campo para la contraseña -->
    <div class="form-group mb-3">
        <label for="password">Contraseña</label>
        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
        @error('password')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>

    <!-- Campo para confirmar la contraseña -->
    <div class="form-group mb-4">
        <label for="password_confirmation">Confirmar Contraseña</label>
        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
    </div>

    <!-- Botón de enviar -->
    <div class="d-flex justify-content-between">
        <button type="submit" class="btn btn-success">Registrar Usuario</button>
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



