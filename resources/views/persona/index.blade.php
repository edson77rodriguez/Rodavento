@extends('dashboard')

@section('template_title')
    Personas
@endsection

@section('crud_content')
<div class="container py-5">
    <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
            <span id="card_title">{{ __('Personas') }}</span>
            <div class="float-right">
                <button class="btn btn-dark me-3" data-bs-toggle="modal" data-bs-target="#createPersonaModal">
                    {{ __('Create New') }}
                </button>
            </div>
        </div>
    </div>


    <div class="container mt-4">
    <div class="row">
        @foreach ($personas as $persona)
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title text-center">{{ $persona->nombre}}</h5>
                        <p class="card-text"><strong>Id:</strong> {{ $persona->id }}</p>
                        <p class="card-text"><strong>Nombre:</strong> {{ $persona->nombre}}</p>
                        <p class="card-text"><strong>Apellido P:</strong> {{ $persona->ap}}</p>
                        <p class="card-text"><strong>Apellido M:</strong> {{ $persona->am}}</p>
                        <p class="card-text"><strong>Dirección:</strong> {{ $persona->direccion}}</p>
                        <p class="card-text"><strong>Telefono:</strong> {{ $persona->telefono}}</p>

                        <div class="d-flex justify-content-between">
                        <button class="btn btn-info me-2 p-1" data-bs-toggle="modal" data-bs-target="#viewPersonaModal{{ $persona->id }}">Ver</button>
                            <button class="btn btn-primary me-2 p-1" data-bs-toggle="modal" data-bs-target="#editPersonaModal{{ $persona->id }}">Editar</button>
                            <form action="{{ route('persona.destroy', $persona->id) }}" method="POST" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-sm btn-danger" onclick="confirmDelete('{{ $persona->id }}')">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
<!-- Modal Ver Persona -->
<div class="modal fade" id="viewPersonaModal{{ $persona->id }}" tabindex="-1" aria-labelledby="viewPersonaModalLabel{{ $persona->id }}" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="viewPersonaModalLabel{{ $persona->id }}">Detalles de la Persona</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Id:</strong> {{ $persona->id }}</p>
                <p><strong>Nombre:</strong> {{ $persona->nombre }}</p>
                <p><strong>Apellido Paterno:</strong> {{ $persona->ap }}</p>
                <p><strong>Apellido Materno:</strong> {{ $persona->am }}</p>
                <p><strong>Dirección:</strong> {{ $persona->direccion }}</p>
                <p><strong>Teléfono:</strong> {{ $persona->telefono }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

                    <!-- Modal Editar Persona -->
                    <div class="modal fade" id="editPersonaModal{{ $persona->id }}" tabindex="-1" aria-labelledby="editPersonaModalLabel{{ $persona->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editPersonaModalLabel{{ $persona->id }}">Editar Persona</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form method="POST" action="{{ route('persona.update', $persona->id) }}">
                                        @csrf
                                        @method('PUT')
                                        <div class="mb-3">
                                            <label for="nombre_{{ $persona->id }}" class="form-label">Nombre</label>
                                            <input type="text" name="nombre" id="nombre_{{ $persona->id }}" value="{{ old('nombre', $persona->nombre) }}" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="ap_{{ $persona->id }}" class="form-label">Apellido Paterno</label>
                                            <input type="text" name="ap" id="ap_{{ $persona->id }}" value="{{ old('ap', $persona->ap) }}" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="am_{{ $persona->id }}" class="form-label">Apellido Materno</label>
                                            <input type="text" name="am" id="am_{{ $persona->id }}" value="{{ old('am', $persona->am) }}" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="direccion{{ $persona->id }}" class="form-label">Direccion</label>
                                            <input type="tel" name="direccion" id="direccion_{{ $persona->id }}" value="{{ old('direccion', $persona->direccion) }}" class="form-control" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="telefono_{{ $persona->id }}" class="form-label">Teléfono</label>
                                            <input type="tel" name="telefono" id="telefono_{{ $persona->id }}" value="{{ old('telefono', $persona->telefono) }}" class="form-control" required>
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
            </tbody>
        </table>
    </div>

    <!-- Modal Crear Persona -->
    <div class="modal fade" id="createPersonaModal" tabindex="-1" aria-labelledby="createPersonaModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="createPersonaModalLabel">Crear Nueva Persona</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form method="POST" action="{{ route('persona.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre</label>
                            <input type="text" name="nombre" id="nombre" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="ap" class="form-label">Apellido Paterno</label>
                            <input type="text" name="ap" id="ap" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="am" class="form-label">Apellido Materno</label>
                            <input type="text" name="am" id="am" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="direccion" class="form-label">Direccion</label>
                            <input type="tel" name="direccion" id="direccion" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="tel" name="telefono" id="telefono" class="form-control" required>
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
            text: '¿Estás seguro de que deseas eliminar esta persona?',
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
                form.action = '/persona/' + id;
                form.innerHTML = '@csrf @method("DELETE")';
                document.body.appendChild(form);
                form.submit();
            }
        });
    }
    function RegistroExitoso() {
        Swal.fire({
            icon: 'success',
            title: 'Registro exitoso',
            text: 'Tu registro ha sido exitoso',
            timer: 1300,
            showConfirmButton: false
        });
    }
    function cambio() {
        Swal.fire({
            icon: 'success',
            title: 'cambio generado',
            text: ' ',
            timer: 1400,
            showConfirmButton: false
        });
    }
</script>

@if(session('register'))
    <script>
        RegistroExitoso();
    </script>
@endif
@if(session('modify'))
    <script>
        cambio();
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
