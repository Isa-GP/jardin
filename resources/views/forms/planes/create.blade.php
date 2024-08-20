{{-- resources/views/estudiantes/create.blade.php --}}

@extends('Dashboard')

@section('title', 'Crear plan')

@section('content_header')
    <h1>Crear plan</h1>
@stop

@section('content')
<div class="container">
    @include('forms.planes.Form', ['route' => route('planes.store')])
</div>
@stop
