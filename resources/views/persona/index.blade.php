@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Listado de Personas</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('persona.create') }}"> Crear Nueva Persona</a>
                </div>
            </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <table class="table table-bordered">
            <tr>
                <th>No</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Teléfono</th>
                <th>RFC</th>
                <th>Correo Electrónico</th>
                <th width="280px">Acciones</th>
            </tr>
            @php
                $i = 0; // Definir variable $i
            @endphp
            @foreach ($personas as $persona)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $persona->nom }}</td>
                    <td>{{ $persona->ap }} {{ $persona->am }}</td>
                    <td>{{ $persona->num_tel }}</td>
                    <td>{{ $persona->rfc }}</td>
                    <td>{{ $persona->corre_elect }}</td>
                    <td>
                        <form action="{{ route('persona.destroy',$persona->id_pers) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('persona.show',$persona->id_pers) }}">Mostrar</a>

                            <a class="btn btn-primary" href="{{ route('persona.edit',$persona->id_pers) }}">Editar</a>

                            @csrf
                            @method('DELETE')

                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {{ $personas->links() }}
    </div>
@endsection
