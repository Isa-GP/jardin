{{-- resources/views/estudiantes/edit.blade.php --}}

@extends('Dashboard')

@section('title', 'Editar Estudiante')

@section('content_header')
    <h1>Editar Estudiante</h1>
@stop

@section('content')

<div class="container">
    @include('forms.terceros.Form', ['route' => route('terceros.update', $tercero->id), 'tercero' => $tercero])
</div>
@stop
