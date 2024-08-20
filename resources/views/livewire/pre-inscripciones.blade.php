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
                    <th class="cursor-pointer" wire:click="sortBy('nombre_alumno')">Nombre</th>
                    <th class="cursor-pointer" wire:click="sortBy('apellido_alumno')">Apellido</th>
                    <th class="cursor-pointer" wire:click="sortBy('fecha_nacimiento')">Fecha de Nacimiento</th>
                    <th class="cursor-pointer" wire:click="sortBy('nombre_padre')">Nombre del Padre</th>
                    <th class="cursor-pointer" wire:click="sortBy('telefono')">Teléfono</th>
                    <th class="cursor-pointer" wire:click="sortBy('email')">Email</th>
                    <th class="cursor-pointer" wire:click="sortBy('curso')">Curso</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($estudiantes as $estudiante)
                    <tr>
                        <td>{{ $estudiante->nombre_alumno }}</td>
                        <td>{{ $estudiante->apellido_alumno }}</td>
                        <td>{{ $estudiante->fecha_nacimiento }}</td>
                        <td>{{ $estudiante->nombre_padre }}</td>
                        <td>{{ $estudiante->telefono }}</td>
                        <td>{{ $estudiante->email }}</td>
                        <td>{{ $estudiante->curso }}</td>
                        <td>
                            <a href="{{ route('confirm.Inscripcion', $estudiante->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar">
                                <i class="fas fa-check"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="confirmDelete({{ $estudiante->id }})">
                                <i class="fas fa-times"></i>
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
