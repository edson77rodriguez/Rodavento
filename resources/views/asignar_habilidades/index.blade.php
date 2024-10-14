@extends('dashboard')

@section('template_title')
    Asignar Habilidades a Guías
@endsection

@section('crud_content')
<div class="container py-5">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">{{ __('Asignar Habilidades') }}</span>
            <div class="float-right">
                <button class="btn btn-dark me-3" data-bs-toggle="modal" data-bs-target="#createAsignarHabilidadModal">
                    {{ __('Asignar Nueva Habilidad') }}
                </button>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        <div class="row">
            @foreach ($asignaciones as $asignacion)
                <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title text-center">{{ $asignacion->guia->persona->nombre }} {{ $asignacion->guia->persona->ap }} {{ $asignacion->guia->persona->am }}</h5>
                            <p class="card-text"><strong>Habilidad:</strong> {{ $asignacion->habilidad->desc_h }}</p>
                            <p class="card-text"><strong>Fecha de Emisión:</strong> {{ $asignacion->fecha_emision }}</p>
                            <p class="card-text"><strong>Fecha de Vencimiento:</strong> {{ $asignacion->fecha_vencimiento }}</p>

                            <div class="d-flex justify-content-between">
                                <button class="btn btn-info me-2 p-1" data-bs-toggle="modal" data-bs-target="#viewAsignarHabilidadModal{{ $asignacion->id }}">Ver</button>
                                <button class="btn btn-primary me-2 p-1" data-bs-toggle="modal" data-bs-target="#editAsignarHabilidadModal{{ $asignacion->id }}">Editar</button>
                                <form action="{{ route('asignar_habilidades.destroy', $asignacion->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('{{ $asignacion->id }}')">Eliminar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Ver Asignación -->
                <div class="modal fade" id="viewAsignarHabilidadModal{{ $asignacion->id }}" tabindex="-1" aria-labelledby="viewAsignarHabilidadModalLabel{{ $asignacion->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="viewAsignarHabilidadModalLabel{{ $asignacion->id }}">Detalles de la Asignación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p><strong>Guía:</strong> {{ $asignacion->guia->persona->nombre }} {{ $asignacion->guia->persona->ap }} {{ $asignacion->guia->persona->am }}</p>
                                <p><strong>Habilidad:</strong> {{ $asignacion->habilidad->desc_h }}</p>
                                <p><strong>Fecha de Emisión:</strong> {{ $asignacion->fecha_emision }}</p>
                                <p><strong>Fecha de Vencimiento:</strong> {{ $asignacion->fecha_vencimiento }}</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal Editar Asignación -->
                <div class="modal fade" id="editAsignarHabilidadModal{{ $asignacion->id }}" tabindex="-1" aria-labelledby="editAsignarHabilidadModalLabel{{ $asignacion->id }}" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editAsignarHabilidadModalLabel{{ $asignacion->id }}">Editar Asignación</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form method="POST" action="{{ route('asignar_habilidades.update', $asignacion->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="guia_id_{{ $asignacion->id }}" class="form-label">Guía</label>
                                        <select name="guia_id" id="guia_id_{{ $asignacion->id }}" class="form-control" required>
                                            @foreach ($guias as $guia)
                                                <option value="{{ $guia->id }}" {{ $asignacion->guia_id == $guia->id ? 'selected' : '' }}>
                                                {{ $guia->persona->nombre }} {{ $guia->persona->ap }} {{ $guia->persona->am }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="habilidad_id_{{ $asignacion->id }}" class="form-label">Habilidad</label>
                                        <select name="habilidad_id" id="habilidad_id_{{ $asignacion->id }}" class="form-control" required>
                                            @foreach ($habilidades as $habilidad)
                                                <option value="{{ $habilidad->id }}" {{ $asignacion->habilidad_id == $habilidad->id ? 'selected' : '' }}>
                                                    {{ $habilidad->desc_h }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="fecha_emision_{{ $asignacion->id }}" class="form-label">Fecha de Emisión</label>
                                        <input type="date" name="fecha_emision" id="fecha_emision_{{ $asignacion->id }}" value="{{ old('fecha_emision', $asignacion->fecha_emision) }}" class="form-control" required>
                                    </div>

                                    <div class="mb-3">
                                        <label for="fecha_vencimiento_{{ $asignacion->id }}" class="form-label">Fecha de Vencimiento</label>
                                        <input type="date" name="fecha_vencimiento" id="fecha_vencimiento_{{ $asignacion->id }}" value="{{ old('fecha_vencimiento', $asignacion->fecha_vencimiento) }}" class="form-control" required>
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

    <!-- Modal Crear Asignación -->
    <div class="modal fade" id="createAsignarHabilidadModal" tabindex="-1" aria-labelledby="createAsignarHabilidadModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createAsignarHabilidadModalLabel">Asignar Nueva Habilidad</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('asignar_habilidades.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="guia_id" class="form-label">Guía</label>
                            <select name="guia_id" id="guia_id" class="form-control" required>
                                <option value="">Seleccionar guía</option>
                                @foreach ($guias as $guia)
                                    <option value="{{ $guia->id }}">{{ $guia->persona->nombre }} {{ $guia->persona->ap }} {{ $guia->persona->am }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="habilidads_id" class="form-label">Habilidad</label>
                            <select name="habilidads_id" id="habilidads_id" class="form-control" required>
                                <option value="">Seleccionar habilidad</option>
                                @foreach ($habilidades as $habilidad)
                                    <option value="{{ $habilidad->id }}">{{ $habilidad->desc_h }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_emision" class="form-label">Fecha de Emisión</label>
                            <input type="date" name="fecha_emision" id="fecha_emision" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento</label>
                            <input type="date" name="fecha_vencimiento" id="fecha_vencimiento" class="form-control" required>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Asignar Habilidad</button>
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
            text: '¿Estás seguro de que deseas eliminar esta Asignacion de habilidad?',
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
                form.action = '/asignar_habilidades/' + id;
                form.innerHTML = '@csrf @method("DELETE")';
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
</script>

@if(session('register'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Registro exitoso',
            text: 'Tu registro ha sido exitoso',
            timer: 1300,
            showConfirmButton: false
        });
    </script>
@endif
@if(session('modify'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Cambio generado',
            text: ' ',
            timer: 1400,
            showConfirmButton: false
        });
    </script>
@endif
@if(session('destroy'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Eliminado',
            text: 'El elemento ha sido eliminado exitosamente',
            timer: 1200,
            showConfirmButton: false
        });
    </script>
@endif
@endsection
