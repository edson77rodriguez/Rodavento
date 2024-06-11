@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Listado de Clientes</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('clientes.create') }}"> Crear Nuevo Cliente</a>
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
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Teléfono</th>
                <th>RFC</th>
                <th>Correo Electrónico</th>
                <th width="280px">Acción</th>
            </tr>
            @foreach ($clientes as $cliente)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $cliente->persona->nom }}</td>
                    <td>{{ $cliente->persona->ap }}</td>
                    <td>{{ $cliente->persona->am }}</td>
                    <td>{{ $cliente->persona->num_tel }}</td>
                    <td>{{ $cliente->persona->rfc }}</td>
                    <td>{{ $cliente->persona->corre_elect }}</td>
                    <td>

                    </td>

                </tr>
            @endforeach
        </table>

        {!! $clientes->links() !!}
    </div>
@endsection
