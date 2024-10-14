@extends('dashboard')

@section('template_title')
    Encargados
@endsection

@section('crud_content')
<div class="container py-5">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">{{ __('Encargados') }}</span>
            <div class="float-right">
                <button class="btn btn-dark me-3" data-bs-toggle="modal" data-bs-target="#createEncargadoModal">
                    {{ __('Crear Nuevo') }}
                </button>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            @foreach ($encargados as $encargado)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $encargado->persona->nombre }}</h5>
                            <p class="card-text"><strong>Id:</strong> {{ $encargado->id }}</p>
                            <p class="card-text"><strong>Nombre:</strong> {{ $encargado->persona->nombre }}</p>
                            <p class="card-text"><strong>Apellido P:</strong> {{ $encargado->persona->ap }}</p>
                            <p class="card-text"><strong>Apellido M:</strong> {{ $encargado->persona->am }}</p>
                            <p class="card-text"><strong>Teléfono:</strong> {{ $encargado->persona->telefono }}</p>
                            <p class="card-text"><strong>Área:</strong> {{ $encargado->area->nombre }}</p>

                            <div class="d-flex justify-content-between">
                                <button class="btn btn-info me-2 p-1" data-bs-toggle="modal" data-bs-target="#viewEncargadoModal{{ $encargado->id }}">Ver</button>
                                <button class="btn btn-primary me-2 p-1" data-bs-toggle="modal" data-bs-target="#editEncargadoModal{{ $encargado->id }}">Editar</button>
                                <form action="{{ route('encargados.destroy', $encargado->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('{{ $encargado->id }}')">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Modal Ver Encargado -->
                <div class="modal fade" id="viewEncargadoModal{{ $encargado->id }}" tabindex="-1" aria-labelledby="viewEncargadoModalLabel{{ $encargado->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewEncargadoModalLabel{{ $encargado->id }}">Detalles del Encargado</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Id:</strong> {{ $encargado->id }}</p>
                                <p><strong>Nombre:</strong> {{ $encargado->persona->nombre }}</p>
                                <p><strong>Apellido Paterno:</strong> {{ $encargado->persona->ap }}</p>
                                <p><strong>Apellido Materno:</strong> {{ $encargado->persona->am }}</p>
                                <p><strong>Teléfono:</strong> {{ $encargado->persona->telefono }}</p>
                                <p><strong>Área:</strong> {{ $encargado->area->nombre }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Editar Encargado -->
                <div class="modal fade" id="editEncargadoModal{{ $encargado->id }}" tabindex="-1" aria-labelledby="editEncargadoModalLabel{{ $encargado->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editEncargadoModalLabel{{ $encargado->id }}">Editar Encargado</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('encargados.update', $encargado->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="nombre_{{ $encargado->id }}" class="form-label">Nombre</label>
                                        <input type="text" name="nombre" id="nombre_{{ $encargado->id }}" value="{{ old('nombre', $encargado->persona->nombre) }}" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="ap_{{ $encargado->id }}" class="form-label">Apellido Paterno</label>
                                        <input type="text" name="ap" id="ap_{{ $encargado->id }}" value="{{ old('ap', $encargado->persona->ap) }}" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="am_{{ $encargado->id }}" class="form-label">Apellido Materno</label>
                                        <input type="text" name="am" id="am_{{ $encargado->id }}" value="{{ old('am', $encargado->persona->am) }}" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="telefono_{{ $encargado->id }}" class="form-label">Teléfono</label>
                                        <input type="tel" name="telefono" id="telefono_{{ $encargado->id }}" value="{{ old('telefono', $encargado->persona->telefono) }}" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="area_id_{{ $encargado->id }}" class="form-label">Área</label>
                                        <select name="area_id" id="area_id_{{ $encargado->id }}" class="form-control" required>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}" {{ $encargado->area_id == $area->id ? 'selected' : '' }}>
                                                    {{ $area->nombre }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-3">Guardar Cambios</button>
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Modal Crear Encargado -->
    <div class="modal fade" id="createEncargadoModal" tabindex="-1" aria-labelledby="createEncargadoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createEncargadoModalLabel">Crear Nuevo Encargado</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('encargados.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="persona_id" class="form-label">Persona</label>
                            <select name="persona_id" id="persona_id" class="form-control" required>
                                @foreach ($personas as $persona)
                                    <option value="{{ $persona->id }}">{{ $persona->nombre }} {{ $persona->ap }} {{ $persona->am }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="area_id" class="form-label">Área</label>
                            <select name="area_id" id="area_id" class="form-control" required>
                                @foreach ($areas as $area)
                                <option >Selecciona una area</option>
                                    <option value="{{ $area->id }}">{{ $area->desc_area }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-3">Crear Encargado</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/alertifyjs/build/alertify.min.js"></script>
<script>
    function confirmDelete(id) {
        alertify.confirm('Confirmar', '¿Está seguro de que desea eliminar este encargado?', function(){
            document.querySelector(`form[action*="${id}"]`).submit();
        }, function(){});
    }
</script>
@endsection
