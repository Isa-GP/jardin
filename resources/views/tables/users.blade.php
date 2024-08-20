@extends('dashboard')

@section('title', 'Lista de usuarios')

@section('content_header')
    <h1>Lista de usuarios</h1>
@stop

@section('content')
    @livewire('UserTable')
@stop

@section('css')
    @livewireStyles
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
@stop
