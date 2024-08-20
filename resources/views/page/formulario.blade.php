<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preinscripción de Alumnos</title>
    <!-- Incluye Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <!-- Incluye SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
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
</head>
<body>
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
        <form id="preinscripcionForm" action="/ruta-a-tu-controlador" method="POST">
            @csrf
            <!-- Paso 1: Datos del Estudiante -->
            <div class="setup-content" id="step-1">
                <div class="form-group">
                    <label for="nombre">Nombre del Alumno:</label>
                    <input type="text" class="form-control" id="nombre" name="nombre" required>
                </div>
                <div class="form-group">
                    <label for="apellido">Apellido del Alumno:</label>
                    <input type="text" class="form-control" id="apellido" name="apellido" required>
                </div>
                <div class="form-group">
                    <label for="fechaNacimiento">Fecha de Nacimiento:</label>
                    <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
                </div>
                <button class="btn btn-primary nextBtn" type="button">Siguiente</button>
            </div>
            <!-- Paso 2: Datos del Padre -->
            <div class="setup-content" id="step-2">
                <div class="form-group">
                    <label for="nombrePadre">Nombre del Padre/Madre/Tutor:</label>
                    <input type="text" class="form-control" id="nombrePadre" name="nombrePadre" required>
                </div>
                <div class="form-group">
                    <label for="telefono">Teléfono de Contacto:</label>
                    <input type="tel" class="form-control" id="telefono" name="telefono" required>
                </div>
                <div class="form-group">
                    <label for="email">Correo Electrónico:</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <button class="btn btn-primary nextBtn" type="button">Siguiente</button>
            </div>
            <!-- Paso 3: Curso y Planes -->
            <div class="setup-content" id="step-3">
                <div class="form-group">
                    <label for="curso">Curso:</label>
                    <select class="form-control" id="curso" name="curso" required>
                        <option value="">Seleccione un curso</option>
                        <option value="Sala Cuna Menor">Sala Cuna Menor (0 a 1 año)</option>
                        <option value="Sala Cuna Mayor">Sala Cuna Mayor (1 a 2 años)</option>
                        <option value="Maternal">Maternal (2 a 3 años)</option>
                        <option value="Prejardín">Prejardín (3 a 4 años)</option>
                        <option value="Jardín">Jardín (4 a 5 años)</option>
                        <option value="Transición">Transición (5 a 6 años)</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="plan">Plan:</label>
                    <select class="form-control" id="plan" name="plan" required>
                        <option value="">Seleccione un plan</option>
                        <option value="Plan Básico">Plan Básico</option>
                        <option value="Plan Completo">Plan Completo</option>
                        <option value="Plan Premium">Plan Premium</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="valorMatricula">Valor de la Matrícula:</label>
                    <input type="text" class="form-control" id="valorMatricula" name="valorMatricula" required>
                </div>
                <button class="btn btn-success" type="submit">Enviar Preinscripción</button>
            </div>
        </form>
    </div>

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
                        target.querySelector('input').focus();
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

            fetch(action, {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire({
                        title: 'Éxito',
                        text: 'Preinscripción enviada correctamente.',
                        icon: 'success',
                        confirmButtonText: 'Cerrar'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.href = '/';
                        }
                    });
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'Hubo un problema al enviar la preinscripción.',
                        icon: 'error',
                        confirmButtonText: 'Cerrar'
                    });
                }
            })
            .catch(error => {
                console.error('Error:', error);
                Swal.fire({
                    title: 'Error',
                    text: 'Hubo un problema al enviar la solicitud.',
                    icon: 'error',
                    confirmButtonText: 'Cerrar'
                });
            });
        });
    </script>
    <!-- Incluye Bootstrap JS y dependencias de Popper.js -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
