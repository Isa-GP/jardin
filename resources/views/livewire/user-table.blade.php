<div>
    <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
        <!-- Campo de búsqueda -->
        <div class="input-group w-100 mb-2 mb-md-0" style="max-width: 300px;">
            <input type="text" class="form-control" placeholder="Buscar por nombre o email..." wire:model.debounce.300ms="searchTerm">
        </div>

        <!-- Botón para registrar un nuevo usuario -->
        <a href="{{ route('users.create') }}" class="btn btn-success ml-2">Registrar Nuevo Usuario</a>
    </div>

    <!-- Tabla de usuarios -->
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th wire:click="sortBy('name')" class="cursor-pointer">Nombre</th>
                    <th wire:click="sortBy('email')" class="cursor-pointer">Email</th>
                    <th wire:click="sortBy('created_at')" class="cursor-pointer">Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d/m/Y') }}</td>
                        <td>
                            <!-- Botón de Editar -->
                            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary btn-sm">Editar</a>

                            <!-- Botón de Eliminar -->
                            <button type="button" class="btn btn-danger btn-sm" wire:click="deleteUser({{ $user->id }})">Eliminar</button>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="mt-4">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>
</div>

<script>
    function confirmDelete(userId) {
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
                Livewire.emit('deleteUser', userId);
            }
        })
    }
</script>

