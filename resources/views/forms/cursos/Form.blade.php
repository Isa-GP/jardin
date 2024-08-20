<form class="form-group" action="{{ $route }}" method="POST" id="ajaxForm">
    @csrf
    @isset($curso)
        @method('PUT')
    @endisset

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Nombre del Curso</label>
                <input type="text" class="form-control" id="nombre_curso" name="nombre_curso" value="{{ old('nombre_curso', $curso->nombre_curso ?? '') }}" required>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Edad Mínima</label>
                <input type="number" class="form-control" id="edadMin" name="edadMin" value="{{ old('edadMin', $curso->edadMin ?? '') }}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Edad Máxima</label>
                <input type="number" class="form-control" id="edadMax" name="edadMax" value="{{ old('edadMax', $curso->edadMax ?? '') }}" required>
            </div>
        </div>

        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Límite</label>
                <input type="number" class="form-control" id="limite" name="limite" value="{{ old('limite', $curso->limite ?? '') }}" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                @isset($curso)
                    Actualizar Curso
                @else
                    Agregar Curso
                @endisset
            </button>
        </div>
    </div>
</form>

<script>
document.getElementById('ajaxForm').addEventListener('submit', function(event) {
    var edadMin = parseInt(document.getElementById('edadMin').value);
    var edadMax = parseInt(document.getElementById('edadMax').value);

    if (edadMin > edadMax) {
        Swal.fire({
            icon: 'error',
            title: 'Error',
            text: 'La edad mínima no puede ser mayor que la edad máxima.',
        });
        event.preventDefault();  // Previene el envío del formulario
    }
});
</script>
