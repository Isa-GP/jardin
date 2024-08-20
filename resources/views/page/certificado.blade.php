<!-- resources/views/certificados.blade.php -->
@include('page.header')

<div class="container py-5">
    <div class="row text-center pt-3">
        <div class="col-lg-6 m-auto">
            <h1 class="h1">Certificados de Estudiantes</h1>
            <p>
                Aquí puedes encontrar y descargar los certificados de los estudiantes destacados de nuestra institución.
            </p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-6 m-auto">
            <form action="{{ url('/certificados/generar') }}" method="POST" id="certificadoForm">
                @csrf
                <div class="form-group">
                    <label for="tipoCertificado">Tipo de Certificado</label>
                    <select class="form-control" id="tipoCertificado" name="tipoCertificado" required>
                        <option value="participacion">Certificado de Participación</option>
                        <option value="excelencia">Certificado de Excelencia Académica</option>
                        <option value="comportamiento">Certificado de Comportamiento</option>
                        <option value="creatividad">Certificado de Creatividad</option>
                        <option value="asistencia">Certificado de Asistencia Perfecta</option>
                        <option value="amistad">Certificado de Amistad</option>
                        <option value="esfuerzo">Certificado de Esfuerzo</option>
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="numeroDocumento">Número de Documento del Estudiante</label>
                    <input type="text" class="form-control" id="numeroDocumento" name="numeroDocumento" required>
                </div>
                <button type="submit" class="btn btn-success mt-3">Generar Certificado</button>
            </form>
        </div>
    </div>
</div>

<script>
    document.getElementById('certificadoForm').addEventListener('submit', function(event) {
        event.preventDefault();

        let formData = new FormData(this);

        fetch('/certificados/generar', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                Swal.fire({
                    title: 'Éxito',
                    text: 'Certificado generado y enviado a mariapolanco0617@gmail.com.',
                    icon: 'success',
                    confirmButtonText: 'Cerrar'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = '/';
                    }
                });
            }
        })
        .catch(error => console.log('Error:', error));
    });
</script>

@include('page.footer')
