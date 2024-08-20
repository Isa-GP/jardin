{{-- resources/views/estudiantes/form.blade.php --}}

<form class="form-group" action="{{ $route }}" method="POST" id="ajaxForm">
    @csrf
    @isset($estudiante)
        @method('PUT')
    @endisset

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Documento</label>
                <input type="number" class="form-control" id="Documento" name="Documento" value="{{ old('Documento', $estudiante->documento ?? '') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Tipo Documento</label>
                <select class="form-control" aria-label="Default select example" id="Tipodc" name="Tipodc">
                    <option value="">Tipo de documento</option>
                    <option value="1" {{ (old('Tipodc', $estudiante->tipo_docuid ?? '') == 1) ? 'selected' : '' }}>Registro Civil</option>
                    <option value="2" {{ (old('Tipodc', $estudiante->tipo_docuid ?? '') == 2) ? 'selected' : '' }}>Tarjeta de Identidad</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Nombre Completo</label>
                <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre', $estudiante->nombre ?? '') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Fecha Nacimiento</label>
                <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ old('fecha_nacimiento', $estudiante->fecha_nacimiento ?? '') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Edad</label>
                <input type="number" class="form-control" id="Edad" name="Edad" value="{{ old('Edad', $estudiante->edad ?? '') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">RH</label>
                <select class="form-control" aria-label="Default select example" id="RH" name="RH">
                    <option value="">RH</option>
                    <option value="1" {{ (old('RH', $estudiante->rh ?? '') == 1) ? 'selected' : '' }}>O+</option>
                    <option value="2" {{ (old('RH', $estudiante->rh ?? '') == 2) ? 'selected' : '' }}>O-</option>
                    <option value="3" {{ (old('RH', $estudiante->rh ?? '') == 3) ? 'selected' : '' }}>A+</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Estado</label>
                <select class="form-control" aria-label="Default select example" id="Estado" name="Estado">
                    <option value="">Estado</option>
                    <option value="1" {{ (old('Estado', $estudiante->estado ?? '') == 1) ? 'selected' : '' }}>Activo</option>
                    <option value="2" {{ (old('Estado', $estudiante->estado ?? '') == 2) ? 'selected' : '' }}>Inactivo</option>
                </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Alergias</label>
                <input type="text" class="form-control" id="Alergias" name="Alergias" value="{{ old('Alergias', $estudiante->alergias ?? '') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Eps</label>
                <input type="text" class="form-control" id="Eps" name="Eps" value="{{ old('Eps', $estudiante->eps ?? '') }}">
            </div>
        </div>
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Plan</label>
                <select class="form-control" aria-label="Default select example" id="Plan" name="Plan">
                    <option value="">Plan</option>
                    <option value="1" {{ (old('Plan', $estudiante->plan_id ?? '') == 1) ? 'selected' : '' }}>Basic</option>
                    <option value="2" {{ (old('Plan', $estudiante->plan_id ?? '') == 2) ? 'selected' : '' }}>Medium</option>
                    <option value="3" {{ (old('Plan', $estudiante->plan_id ?? '') == 3) ? 'selected' : '' }}>Premium</option>
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Num. Documento Acudiente</label>
                <input type="text" class="form-control" id="idacudiente" name="idacudiente" value="{{ old('idacudiente', $estudiante->nume_docu_acud ?? '') }}">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
    </div>
</form>
