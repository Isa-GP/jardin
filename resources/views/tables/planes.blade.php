@extends('dashboard')

@section('title', 'Lista de Planes')

@section('content_header')
    <h1>Lista de Planes</h1>
@stop

@section('content')
    @livewire('Planes')
@stop

@section('css')
    @livewireStyles
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
@stop
