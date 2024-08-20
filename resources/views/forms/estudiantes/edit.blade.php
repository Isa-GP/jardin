{{-- resources/views/estudiantes/edit.blade.php --}}

@extends('Dashboard')

@section('title', 'Editar Estudiante')

@section('content_header')
    <h1>Editar Estudiante</h1>
@stop

@section('content')
<div class="container">
    @include('forms.estudiantes.Form', ['route' => route('estudiantes.update', $estudiante->id), 'estudiante' => $estudiante])
</div>
@stop
