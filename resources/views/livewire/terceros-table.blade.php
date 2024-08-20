<div>
    <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
        <div class="input-group w-100 mb-2 mb-md-0" style="max-width: 300px;">
            <input type="text" class="form-control" placeholder="Buscar..." wire:model.debounce.300ms="searchTerm">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" wire:click="search">Buscar</button>
            </div>
            <a href="{{ route('create.tercero') }}" class="btn btn-primary ml-0 ml-md-2">
                <i class="fas fa-plus" title="Agregar"></i>
            </a>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="cursor-pointer" wire:click="sortBy('tipo_docuid')">Tipo Documento</th>
                    <th class="cursor-pointer" wire:click="sortBy('num_docu')">Número Documento</th>
                    <th class="cursor-pointer" wire:click="sortBy('nombres')">Nombres</th>
                    <th class="cursor-pointer" wire:click="sortBy('apellidos')">Apellidos</th>
                    <th class="cursor-pointer" wire:click="sortBy('edad')">Edad</th>
                    <th class="cursor-pointer" wire:click="sortBy('celular')">Celular</th>
                    <th class="cursor-pointer" wire:click="sortBy('direccion')">Dirección</th>
                    <th class="cursor-pointer" wire:click="sortBy('barrio')">Barrio</th>
                    <th class="cursor-pointer" wire:click="sortBy('departamento_id')">Departamento</th>
                    <th class="cursor-pointer" wire:click="sortBy('municipio_id')">Municipio</th>
                    <th class="cursor-pointer" wire:click="sortBy('correo')">Correo</th>
                    <th class="cursor-pointer" wire:click="sortBy('parentesco')">Parentesco</th>
                    <th class="cursor-pointer" wire:click="sortBy('profesion')">Profesión</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($terceros as $registro)
                    <tr>
                        <td>{{ $registro->tipo_docuid }}</td>
                        <td>{{ $registro->num_docu }}</td>
                        <td>{{ $registro->nombres }}</td>
                        <td>{{ $registro->apellidos }}</td>
                        <td>{{ $registro->edad }}</td>
                        <td>{{ $registro->celular }}</td>
                        <td>{{ $registro->direccion }}</td>
                        <td>{{ $registro->barrio }}</td>
                        <td>{{ $registro->departamento_id }}</td>
                        <td>{{ $registro->municipio_id }}</td>
                        <td>{{ $registro->correo }}</td>
                        <td>{{ $registro->parentesco }}</td>
                        <td>{{ $registro->profesion }}</td>
                        <td>
                            <a href="{{ route('edit.tercero', $registro->id) }}" class="btn btn-primary btn-sm" data-toggle="tooltip" data-placement="top" title="Editar">
                                <i class="fas fa-pencil-alt"></i>
                            </a>
                            <button type="button" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Eliminar" onclick="confirmDelete({{ $registro->id }})">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                            <form id="delete-form-{{ $registro->id }}" action="{{ route('terceros.destroy', $registro->id) }}" method="POST" style="display:none;">
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
        {{ $terceros->links('pagination::bootstrap-4') }}
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
