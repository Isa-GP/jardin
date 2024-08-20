{{-- resources/views/estudiantes/edit.blade.php --}}

@extends('Dashboard')

@section('title', 'Editar Estudiante')

@section('content_header')
    <h1>Editar Estudiante</h1>
@stop

@section('content')
<div class="container">
    @include('forms.planes.Form', ['route' => route('planes.update', $plan->id), 'plan' => $plan])
</div>
@stop



