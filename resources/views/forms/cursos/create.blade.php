{{-- resources/views/estudiantes/create.blade.php --}}

@extends('Dashboard')

@section('title', 'Crear plan')

@section('content_header')
    <h1>Crear curso</h1>
@stop

@section('content')
<div class="container">
    @include('forms.cursos.Form', ['route' => route('cursos.store')])
</div>
@stop
