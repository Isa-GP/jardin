<div class="container mt-5">
    <div class="mb-4 d-flex justify-content-center">
        <div class="input-group w-100" style="max-width: 600px;">
            <input type="text" class="form-control" placeholder="Buscar número de documento..." wire:model.debounce.300ms="num_docu">
            <div class="input-group-append">
                <button class="btn btn-primary" type="button" wire:click="buscarInscripcion">Buscar</button>
            </div>
        </div>
    </div>
    @if (session()->has('alert'))
    <div class="alert alert-warning">
        {{ session('alert') }}
    </div>
@endif


    @if($inscripcion)
        <div class="card p-4" style="box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
            <h4 class="text-center mb-4" style="font-weight: 600;">Detalles de la Inscripción</h4>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Estudiante</th>
                            <th>Curso</th>
                            <th>Plan</th>
                            <th>Valor</th>
                            <th>Estado de Pago</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $inscripcion->estudiante->nombre }}</td>
                            <td>{{ $inscripcion->curso->nombre_curso }}</td>
                            <td>{{ $inscripcion->plan->nombre }}</td>
                            <td>${{ number_format($inscripcion->valor, 2) }}</td>
                            <td>{{ $inscripcion->pago ? 'Pagado' : 'Pendiente' }}</td>
                            <td>
                                @if(!$inscripcion->pago)
                                    <button type="button" class="btn btn-success btn-sm" wire:click="pagarInscripcion">
                                        Pagar Ahora
                                    </button>
                                @else
                                    <span class="badge badge-success">Pago realizado</span>
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>


