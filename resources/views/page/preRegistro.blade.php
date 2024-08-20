
@include('page.header')
<div class="container mt-5">
    <h1 class="text-center">Preinscripción de Alumnos</h1>
    <form id="preinscripcionForm" action="/preinscripcion" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre </label>
            <input type="text" class="form-control" id="nombre" name="nombre" required>
        </div>
        <div class="form-group">
            <label for="apellido">Apellido </label>
            <input type="text" class="form-control" id="apellido" name="apellido" required>
        </div>
        <div class="form-group">
            <label for="fechaNacimiento">Fecha de Nacimiento:</label>
            <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento" required>
        </div>
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
        <button type="submit" class="btn btn-success mt-3">Enviar Preinscripción</button>
    </form>
</div>

<!-- Incluye aquí tus scripts JS -->
<script>
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
@include('page.footer')