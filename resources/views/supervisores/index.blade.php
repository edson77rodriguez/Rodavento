@extends('dashboard')

@section('crud_content')
<div class="container py-5">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">{{ __('Supervisores') }}</span>
            <div class="float-right">
                <button class="btn btn-dark me-3" data-bs-toggle="modal" data-bs-target="#createSupervisorModal">
                    {{ __('Crear Nuevo') }}
                </button>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            @foreach ($supervisores as $supervisor)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $supervisor->persona->nombre }}</h5>
                            <p class="card-text"><strong>Id:</strong> {{ $supervisor->id }}</p>
                            <p class="card-text"><strong>Nombre:</strong> {{ $supervisor->persona->nombre }} {{ $supervisor->persona->ap }} {{ $supervisor->persona->am }}</p>
                            <p class="card-text"><strong>Area:</strong> {{ $supervisor->area->desc_area }}</p>
                            <div class="d-flex justify-content-between">
                                <button class="btn btn-info me-2 p-1" data-bs-toggle="modal" data-bs-target="#viewSupervisorModal{{ $supervisor->id }}">Ver</button>
                                <button class="btn btn-primary me-2 p-1" data-bs-toggle="modal" data-bs-target="#editSupervisorModal{{ $supervisor->id }}">Editar</button>
                                <form action="{{ route('supervisores.destroy', $supervisor->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('{{ $supervisor->id }}')">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Ver Supervisor -->
                <div class="modal fade" id="viewSupervisorModal{{ $supervisor->id }}" tabindex="-1" aria-labelledby="viewSupervisorModalLabel{{ $supervisor->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewSupervisorModalLabel{{ $supervisor->id }}">Ver Supervisor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label class="form-label">Supervisor:</label>
                                    <p>{{ $supervisor->persona->nombre }} {{ $supervisor->persona->ap }} {{ $supervisor->persona->am }}</p>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Area:</label>
                                    <p>{{ $supervisor->area->desc_area }} </p>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Editar Supervisor -->
                <div class="modal fade" id="editSupervisorModal{{ $supervisor->id }}" tabindex="-1" aria-labelledby="editSupervisorModalLabel{{ $supervisor->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editSupervisorModalLabel{{ $supervisor->id }}">Editar Supervisor</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('supervisores.update', $supervisor->id) }}">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="persona_id" class="form-label">Persona</label>
                                        <select name="persona_id" id="persona_id" class="form-control" required>
                                            <option value="">Seleccione una persona</option>
                                            @foreach ($personas as $persona)
                                                <option value="{{ $persona->id }}" {{ $supervisor->persona_id == $persona->id ? 'selected' : '' }}>{{ $persona->nombre }} {{ $persona->ap }} {{ $persona->am }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="area_id" class="form-label">Areas</label>
                                        <select name="area_id" id="persona_id" class="form-control" required>
                                            <option value="">Seleccione una area</option>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}" {{ $supervisor->area_id == $area->id ? 'selected' : '' }}>{{ $area->desc_area }}</option>
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

    <!-- Modal Crear Supervisor -->
    <div class="modal fade" id="createSupervisorModal" tabindex="-1" aria-labelledby="createSupervisorModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createSupervisorModalLabel">Crear Nuevo Supervisor</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('supervisores.store') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="persona_id" class="form-label">Persona</label>
                            <select name="persona_id" id="persona_id" class="form-control" required>
                                <option value="">Seleccione una persona</option>
                                @foreach ($personas as $persona)
                                    <option value="{{ $persona->id }}">{{ $persona->nombre }} {{ $persona->ap }} {{ $persona->am }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="area_id" class="form-label">Área</label>
                            <select name="area_id" id="area_id" class="form-control" required>
                                <option value="">Seleccione un área</option>
                                @foreach ($areas as $area)
                                    <option value="{{ $area->id }}">{{ $area->desc_area }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-3">Guardar</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KF6o/kJF/b7ICQ1Zfs0cQ45oM0v4lL+SzR0t4i0p54K/xY8q3jOAV5tQ9l" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/alertifyjs/build/alertify.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/alertifyjs/build/css/alertify.min.css"/>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>

<script>
    function confirmDelete(id) {
        Swal.fire({
            title: 'Eliminar',
            text: '¿Estás seguro de que deseas eliminar este supervisor?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Eliminar',
            cancelButtonText: 'Cancelar'
        }).then((result) => {
            if (result.isConfirmed) {
                let form = document.createElement('form');
                form.method = 'POST'; 
                form.action = '/supervisores/' + id;
                form.innerHTML = '@csrf @method("DELETE")';
                document.body.appendChild(form);
                form.submit();
            }
        });
    }

    function showAlert(type, message) {
        Swal.fire({
            icon: type,
            title: message,
            timer: 1300,
            showConfirmButton: false
        });
    }
</script>

@if(session('register'))
    <script>
        showAlert('success', 'Registro exitoso');
    </script>
@endif
@if(session('modify'))
    <script>
        showAlert('success', 'Cambio generado');
    </script>
@endif
@if(session('destroy'))
    <script>
        showAlert('success', 'Eliminado', 'El elemento ha sido eliminado exitosamente');
    </script>
@endif
@endsection
