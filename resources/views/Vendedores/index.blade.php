@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>Listado de Vendedores</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ route('vendedores.create') }}"> Crear Nuevo Vendedor</a>
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
            @foreach ($vendedores as $vendedor)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $vendedor->persona->nom }}</td>
                    <td>{{ $vendedor->persona->ap }}</td>
                    <td>{{ $vendedor->persona->am }}</td>
                    <td>{{ $vendedor->persona->num_tel }}</td>
                    <td>{{ $vendedor->persona->rfc }}</td>
                    <td>{{ $vendedor->persona->corre_elect }}</td>
                    <td>
                        <form action="{{ route('vendedores.destroy', $vendedor->id_vendedor) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        {!! $vendedores->links() !!}
    </div>
@endsection
