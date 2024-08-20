@extends('adminlte::page')






@section('content_header')
    <h1>@yield('header')</h1>
@stop

@section('content')
    @yield('content')
@stop


@section('css')
    @livewireStyles
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @livewireScripts
@stop