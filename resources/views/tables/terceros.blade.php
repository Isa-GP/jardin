@extends('dashboard')

@section('title', 'Lista de terceros')

@section('content_header')
    <h1>Lista de Terceros</h1>
@stop

@section('content')
    @livewire('Terceros')
@stop

@section('css')
    @livewireStyles
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
@stop
