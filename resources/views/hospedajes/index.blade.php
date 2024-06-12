@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Listado hospedajes</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('hospedajes.create') }}"> Crear Nuevo Registro</a>
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
            <th>Descripcion</th>
            <th>Costo entre semana</th>
            <th>Costo volumen</th>
            <th>Costo fin </th>
            <th>Costo epecial</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($hospedajes as $hospedaje)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $hospedaje->descripcion }}</td>
                <td>{{ $hospedaje->costo_entre_semana }}</td>
                <td>{{ $hospedaje->costo_volumen }}</td>
                <td>{{ $hospedaje->costo_fin }}</td>
                <td>{{ $hospedaje->costo_especial }}</td>
                <td>
                    <form action="{{ route('hospedajes.destroy',$hospedaje->id_hospedaje) }}" method="POST">

                        <a class="btn btn-info" href="{{ route('hospedajes.show',$hospedaje->id_hospedaje) }}">Mostar</a>

                        <a class="btn btn-primary" href="{{ route('hospedajes.edit',$hospedaje->id_hospedaje) }}">Editar</a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $hospedajes->links() !!}

@endsection
