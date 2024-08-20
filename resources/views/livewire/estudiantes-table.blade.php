
<style>
    .bg-light-green {
    background-color: #c5ecce;
}
</style>
<div>
    <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
        <div class="input-group w-100 mb-2 mb-md-0" style="max-width: 300px;">
            <input type="text" class="form-control" placeholder="Buscar..." wire:model.debounce.300ms="searchTerm">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" wire:click="search">Buscar</button>
            </div>
            <a href="{{ route('create.estudiante') }}" class="btn btn-primary ml-0 ml-md-2">
                <i class="fas fa-plus" title="Agregar"></i>
            </a>
        </div>
       
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="cursor-pointer" wire:click="sortBy('documento')">Documento</th>
                    <th class="cursor-pointer" wire:click="sortBy('tipo_docuid')">Tipo Documento</th>
                    <th class="cursor-pointer" wire:click="sortBy('nombre')">Nombre Completo</th>
                    <th class="cursor-pointer" wire:click="sortBy('fecha_nacimiento')">Fecha Nacimiento</th>
                    <th class="cursor-pointer" wire:click="sortBy('edad')">Edad</th>
                    <th class="cursor-pointer" wire:click="sortBy('alergias')">Alergias</th>
                    <th class="cursor-pointer" wire:click="sortBy('eps')">Eps</th>
                    <th class="cursor-pointer" wire:click="sortBy('plan_id')">Plan</th>
                    <th class="cursor-pointer" wire:click="sortBy('nume_docu_acud')">Num. Documento Acudiente</th>
                    <th class="cursor-pointer" wire:click="sortBy('rh')">Tipo de sangre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estudiantes as $estudiante)
              
                    <tr  style=" background-color:{{ $estudiante->estado == 1 ? '#c5ecce' : '' }}"> 
                        <td>{{ $estudiante->documento }}</td>
                        <td>{{ $estudiante->tipoDocumento->nombre }}</td>
                        <td>{{ $estudiante->nombre }}</td>
                        <td>{{ $estudiante->fecha_nacimiento }}</td>
                        <td>{{ $estudiante->edad }}</td>
                        <td>{{ $estudiante->alergias }}</td>
                        <td>{{ $estudiante->eps }}</td>
                        <td>{{ $estudiante->plan_id }}</td>
                        <td>{{ $estudiante->nume_docu_acud }}</td>
                        <td>{{ $estudiante->grupoSanguineo->nombre }}</td>
                        <td>
                            <a href="{{ route('edit.estudiante', $estudiante->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="confirmDelete({{ $estudiante->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-{{ $estudiante->id }}" action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST" style="display:none;">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $estudiantes->links('pagination::bootstrap-4') }}
    </div>
</div>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: '¿Estás seguro?',
            text: "No podrás revertir esto!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Sí, eliminar!',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                document.getElementById('delete-form-' + id).submit();
            }
        })
    }
</script>
