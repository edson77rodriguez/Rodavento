@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Cotizaciones</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('cotizaciones.create') }}">Crear Cotización</a>
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
            <th>Fecha de Cotización</th>
            <th>Total</th>
            <th>Vendedor</th>
            <th>Cliente</th>
            <th>Número de Personas</th>
            <th>Empresa</th>
            <th width="280px">Acción</th>
        </tr>

        @foreach ($cotizaciones as $cotizacion)
            <tr>
                <td>{{ $loop->index + 1 }}</td>
                <td>{{ $cotizacion->fecha_cotizacion }}</td>
                <td>{{ $cotizacion->total }}</td>
                <td>{{ $cotizacion->vendedor->persona->nom }} {{ $cotizacion->vendedor->persona->ap }}</td>
                <td>{{ $cotizacion->cliente->persona->nom }} {{ $cotizacion->cliente->persona->ap }}</td>
                <td>{{ $cotizacion->num_personas }}</td>
                <td>{{ $cotizacion->empresa->nom }}</td>
                <td>
                    <form action="{{ route('cotizaciones.destroy', $cotizacion->id_cotizacion) }}" method="POST">
                        <a class="btn btn-info" href="{{ route('cotizaciones.show', $cotizacion->id_cotizacion) }}">Mostrar</a>
                        <a class="btn btn-primary" href="{{ route('cotizaciones.edit', $cotizacion->id_cotizacion) }}">Editar</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
