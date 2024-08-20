




{{-- resources/views/estudiantes/edit.blade.php --}}

@extends('Dashboard')

@section('title', 'Editar Estudiante')

@section('content_header')
    <h1>Inscribir Estudiantes</h1>
@stop

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@section('css')
<title>Preinscripción de Alumnos</title>
<style>
    .stepwizard-step p {
        margin-top: 10px; 
    }
    .stepwizard-row {
        display: table-row;
    }
    .stepwizard {
        display: table;     
        width: 100%;
        position: relative;
    }
    .stepwizard-step button[disabled] {
        opacity: 1 !important;
        filter: alpha(opacity=100) !important;
    }
    .stepwizard-row:before {
        top: 14px;
        bottom: 0;
        position: absolute;
        content: " ";
        width: 100%;
        height: 1px;
        background-color: #ccc;
        z-order: 0;
    }
    .stepwizard-step {    
        display: table-cell;
        text-align: center;
        position: relative;
    }
    .btn-circle {
        width: 30px;
        height: 30px;
        text-align: center;
        padding: 6px 0;
        font-size: 12px;
        line-height: 1.428571429;
        border-radius: 15px;
    }
</style>

    @livewireStyles
@stop

@section('content')
<div class="container mt-5">
    <div class="stepwizard">
        <div class="stepwizard-row setup-panel">
            <div class="stepwizard-step">
                <a href="#step-1" type="button" class="btn btn-primary btn-circle">1</a>
                <p>Datos del Estudiante</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-2" type="button" class="btn btn-default btn-circle" disabled="disabled">2</a>
                <p>Datos del Padre</p>
            </div>
            <div class="stepwizard-step">
                <a href="#step-3" type="button" class="btn btn-default btn-circle" disabled="disabled">3</a>
                <p>Curso y Planes</p>
            </div>
        </div>
    </div>
    <form id="preinscripcionForm"  method="POST">
        @csrf
        <!-- Paso 1: Datos del Estudiante -->
        <div class="setup-content" id="step-1">
            <div class="form-group">
                <label for="documento">Documento:</label>
                <input type="text" class="form-control" id="documento" name="documento" >
            </div>
            <div class="form-group">
                <label for="tipo_docuId">Tipo de documento:</label>
                <select class="form-control" id="tipo_docuId" name="tipo_docuId" >
                    <option value="1">Registro Civil</option>
                    <option value="2">Tarjeta de Identidad</option>
                </select>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" >
            </div>
            @livewire('edad-calculator')
            <div class="form-group">
                <label for="rh">RH:</label>
                <select class="form-control" id="rh" name="rh" >
                    <option value="4">O+</option>
                    <option value="5">O-</option>
                    <option value="6">A+</option>
                    <option value="7">A-</option>
                    <option value="8">B+</option>
                    <option value="9">B-</option>
                    <option value="10">AB+</option>
                    <option value="11">AB-</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alergias">Alergias:</label>
                <input type="text" class="form-control" id="alergias" name="alergias">
            </div>
            <div class="form-group">
                <label for="eps">EPS:</label>
                <input type="text" class="form-control" id="eps" name="eps" >
            </div>
            <button class="btn btn-primary nextBtn" type="button">Siguiente</button>
        </div>
    
        <!-- Paso 2: Datos del Padre -->
        <div class="setup-content" id="step-2">
               @livewire('buscar-acudiente')
            <button class="btn btn-primary nextBtn" type="button">Siguiente</button>
        </div>
    
        <!-- Paso 3: Curso y Planes -->
        <div class="setup-content" id="step-3">
            @livewire('cursos-planes-form')
            <button class="btn btn-success" type="submit">Enviar Preinscripción</button>
        </div>
    </form>
    
</div>
@stop


@section('js')
    @livewireScripts
  <!-- Incluye aquí tus scripts JS -->
  <script>
   document.addEventListener('DOMContentLoaded', function () {
    var navListItems = document.querySelectorAll('.stepwizard-step a'),
        allWells = document.querySelectorAll('.setup-content'),
        allNextBtn = document.querySelectorAll('.nextBtn');

    allWells.forEach(well => well.style.display = 'none');

    navListItems.forEach(item => {
        item.addEventListener('click', function (e) {
            e.preventDefault();
            var target = document.querySelector(this.getAttribute('href')),
                item = this;

            if (!item.classList.contains('disabled')) {
                navListItems.forEach(step => step.classList.remove('btn-primary'));
                item.classList.add('btn-primary');
                allWells.forEach(well => well.style.display = 'none');
                target.style.display = 'block';
                var firstInput = target.querySelector('input');
                if (firstInput) {
                    firstInput.focus();
                }
            }
        });
    });

    allNextBtn.forEach(btn => {
        btn.addEventListener('click', function () {
            var curStep = this.closest(".setup-content"),
                curStepBtn = curStep.getAttribute("id"),
                nextStepWizard = document.querySelector('.stepwizard-row a[href="#' + curStepBtn + '"]').parentElement.nextElementSibling?.querySelector('a'),
                curInputs = curStep.querySelectorAll("input[required], select[required]"),
                isValid = true;

            curStep.querySelectorAll(".form-group").forEach(group => group.classList.remove("has-error"));

            curInputs.forEach(input => {
                if (!input.validity.valid) {
                    isValid = false;
                    input.closest(".form-group").classList.add("has-error");
                }
            });

            if (isValid && nextStepWizard) {
                nextStepWizard.removeAttribute('disabled');
                nextStepWizard.classList.remove('btn-default');
                nextStepWizard.classList.add('btn-primary');
                nextStepWizard.click();
            }
        });
    });

    document.querySelector('.stepwizard-step a.btn-primary').click();
});


document.getElementById('preinscripcionForm').addEventListener('submit', function(event) {
    event.preventDefault();

    let formData = new FormData(this);
    let action = this.action;

   fetch('/inscripcion/store', {
    method: 'POST',
    body: formData,
    headers: {
        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
        'Accept': 'application/json'
    }
})
.then(response => response.json())
.then(data => {
    if (data.success) {
        Swal.fire({
            title: 'Éxito',
            text: data.message,
            icon: 'success',
            confirmButtonText: 'OK'
        }).then(() => {
            window.location.href = '/Estudiantes';
        });
    } else {
        Swal.fire({
            title: 'Error',
            text: data.message,
            icon: 'error',
            confirmButtonText: 'Cerrar'
        });
    }
})
.catch(error => {
    Swal.fire({
        title: 'Error',
        text: 'Ocurrió un error al realizar la inscripción',
        icon: 'error',
        confirmButtonText: 'Cerrar'
    });
    console.error('Error:', error);
});
});




</script>
<!-- Incluye Bootstrap JS y dependencias de Popper.js -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
@stop



  

   

