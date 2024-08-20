
<div>
    <div class="mb-4 d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
        <div class="input-group w-100 mb-2 mb-md-0" style="max-width: 300px;">
            <input type="text" class="form-control" placeholder="Buscar..." wire:model.debounce.300ms="searchTerm">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" wire:click="search">Buscar</button>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="cursor-pointer" wire:click="sortBy('estudiante_nombre')">Nombre del Estudiante</th>
                    <th class="cursor-pointer" wire:click="sortBy('tercero_nombre_completo')">Nombre del Tercero</th>
                    <th class="cursor-pointer" wire:click="sortBy('plan_nombre')">Nombre del Plan</th>
                    <th class="cursor-pointer" wire:click="sortBy('fecha_inscripcion')">Fecha Inscripción</th>
                    <th class="cursor-pointer" wire:click="sortBy('valor')">Valor</th>
                    <th class="cursor-pointer" wire:click="sortBy('pago')">Pago</th>
                    <th class="cursor-pointer" wire:click="sortBy('payment_link')">Payment Link</th>
                </tr>
            </thead>
            <tbody>
                @foreach($inscripciones as $inscripcion)
                    <tr class="{{ $inscripcion->pago == 1 ? 'bg-success text-white' : '' }}">
                        <td>{{ $inscripcion->estudiante_nombre }}</td>
                        <td>{{ $inscripcion->tercero_nombre_completo }}</td>
                        <td>{{ $inscripcion->plan_nombre }}</td>
                        <td>{{ $inscripcion->fecha_inscripcion }}</td>
                        <td>{{ $inscripcion->valor }}</td>
                        <td>
                            @if($inscripcion->pago == 1)
                                Pago
                            @else
                                No Pago
                            @endif
                        </td>
                        <td>{{ $inscripcion->payment_link }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        {{ $inscripciones->links('pagination::bootstrap-4') }}
    </div>
</div>
