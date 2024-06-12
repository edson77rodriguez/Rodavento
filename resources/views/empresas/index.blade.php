@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Listado de empresas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('empresas.create') }}">Crear Nueva Empresa</a>
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
            <th>Ubicación</th>
            <th>Correo</th>
            <th>RFC</th>
            <th width="280px">Acción</th>
        </tr>
        @foreach ($empresas as $empresa)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $empresa->nom }}</td>
                <td>{{ $empresa->ubicacion }}</td>
                <td>{{ $empresa->correo }}</td>
                <td>{{ $empresa->rfc }}</td>
                <td>
                    <form action="{{ route('empresas.destroy', $empresa->id_empresa) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('empresas.show', $empresa->id_empresa) }}">Mostrar</a>

                        <a class="btn btn-primary" href="{{ route('empresas.edit', $empresa->id_empresa) }}">Editar</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $empresas->links() !!}

@endsection
