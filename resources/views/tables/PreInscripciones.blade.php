@extends('dashboard')

@section('title', 'Lista de PreInscripciones')

@section('content_header')
    <h1>Lista de Estudiantes</h1>
@stop

@section('content')
    @livewire('PreInscripciones')
@stop

@section('css')
    @livewireStyles
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
@stop
