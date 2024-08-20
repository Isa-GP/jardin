




   



<form class="form-group" action="{{ $route }}" method="POST" id="ajaxForm">
    @csrf
    @isset($plan)
        @method('PUT')
    @endisset

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Nombre del Plan</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $plan->nombre ?? '') }}" required>
            </div>
        </div>
        
        <div class="col-md-6">
            <div class="mb-3 position-relative">
                <label class="form-label">Curso</label>
                <livewire:search-courses />
                <input type="hidden" name="cursoid" id="cursoid" value="{{ old('curso', $plan->curso_id  ?? '') }}">
            </div>
        </div>
        
        
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Valor</label>
                <input type="number" class="form-control" id="valor" name="valor" value="{{ old('valor', $plan->valor ?? '') }}" step="0.01" required>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">
                @isset($plan)
                    Actualizar Plan
                @else
                    Agregar Plan
                @endisset
            </button>
        </div>
    </div>
</form>

<script>
document.addEventListener('livewire:init', function () {
   
    Livewire.on('courseSelected', data => {
       
        document.getElementById('nombre_curso').value = data[0].name;
        document.getElementById('cursoid').value = data[0].id;

    });
});


</script>


