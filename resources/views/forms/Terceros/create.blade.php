{{-- resources/views/estudiantes/create.blade.php --}}

@extends('Dashboard')

@section('title', 'Crear Estudiante')

@section('content_header')
    <h1>Crear Estudiante</h1>
@stop

@section('content')
<div class="container">
    @include('forms.estudiantes.Form', ['route' => route('estudiantes.store')])
</div>
@stop
