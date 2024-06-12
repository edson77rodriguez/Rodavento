@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>CRUD de Departamentos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('departamentos.create') }}"> Crear Nuevo Departamento</a>
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
            <th>Tipo</th>
            <th>Departamento</th>
            <th>Costo</th>
            <th>Precio sin IVA</th>
            <th>IVA</th>
            <th>Subtotal</th>
            <th>Servicio</th>
            <th>Total</th>
            <th>Observaciones</th>
            <th width="280px">Acción</th>
        </tr>
        @foreach ($departamentos as $departamento)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $departamento->tipo }}</td>
                <td>{{ $departamento->departamento }}</td>
                <td>{{ $departamento->costo }}</td>
                <td>{{ $departamento->precio_sin_iva }}</td>
                <td>{{ $departamento->iva }}</td>
                <td>{{ $departamento->subtotal }}</td>
                <td>{{ $departamento->servicio }}</td>
                <td>{{ $departamento->total }}</td>
                <td>{{ $departamento->observaciones }}</td>
                <td>
                    <form action="{{ route('departamentos.destroy', $departamento->id_departamento) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('departamentos.show', $departamento->id_departamento) }}">Mostrar</a>
                        <a class="btn btn-primary" href="{{ route('departamentos.edit', $departamento->id_departamento) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $departamentos->links() !!}
@endsection
