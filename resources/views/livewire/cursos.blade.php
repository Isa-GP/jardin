<div>
    <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
        <div class="input-group w-100 mb-2 mb-md-0" style="max-width: 300px;">
            <input type="text" class="form-control" placeholder="Buscar..." wire:model.debounce.300ms="searchTerm">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" wire:click="search">Buscar</button>
            </div>
            <a href="{{ route('create.curso') }}" class="btn btn-primary ml-0 ml-md-2">
                <i class="fas fa-plus" title="Agregar"></i>
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="cursor-pointer" wire:click="sortBy('nombre_curso')">Nombre del Curso</th>
                    <th class="cursor-pointer" wire:click="sortBy('edadMin')">Edad Mínima</th>
                    <th class="cursor-pointer" wire:click="sortBy('edadMax')">Edad Máxima</th>
                    <th class="cursor-pointer" wire:click="sortBy('limite')">Cupos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($cursos as $curso)
                    <tr>
                        <td>{{ $curso->nombre_curso }}</td>
                        <td>{{ $curso->edadMin }}</td>
                        <td>{{ $curso->edadMax }}</td>
                        <td>{{ $curso->limite }}</td>
                        <td>
                            <a href="{{ route('edit.curso', $curso->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="confirmDelete({{ $curso->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-{{ $curso->id }}" action="{{ route('cursos.destroy', $curso->id) }}" method="POST" style="display:none;">
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
        {{ $cursos->links('pagination::bootstrap-4') }}
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
