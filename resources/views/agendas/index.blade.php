@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Registrar una agenda</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('agendas.create') }}"> Crear nueva agenda</a>
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
            <th>Inicio</th>
            <th>Fin</th>
            <th>Actividad</th>
            <th>Lugar</th>
            <th>Equipo</th>
            <th>Montaje</th>
            <th>Comentarios</th>

            <th width="280px">Acción</th>
        </tr>
        @foreach ($agendas as $agenda)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $agenda->inicio }}</td>
                <td>{{ $agenda->fin }}</td>
                <td>{{ $agenda->actividad }}</td>
                <td>{{ $agenda->lugar }}</td>
                <td>{{ $agenda->equipo }}</td>
                <td>{{ $agenda->montaje }}</td>
                <td>{{ $agenda->comentarios }}</td>
                <td>
                    <form action="{{ route('agendas.destroy',$agenda->id_agenda) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('agendas.show',$agenda->id_agenda) }}">Mostrar</a>

                        <a class="btn btn-primary" href="{{ route('agendas.edit',$agenda->id_agenda) }}">Editar</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $agendas->links() !!}

@endsection
