@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar agenda</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('agendas.index') }}"> Regresar</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hubo algunos problemas con tu entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('agendas.update',$agenda->id_agenda) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Inicio:</strong>
                    <input type="date" name="inicio" value="{{ $agenda->inicio }}" class="form-control" placeholder="Inicio">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Fin:</strong>
                    <input type="date" name="fin" value="{{ $agenda->fin }}" class="form-control" placeholder="Fin">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Actividad:</strong>
                    <input type="text" name="actividad" value="{{ $agenda->actividad }}" class="form-control" placeholder="Actividad">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Lugar:</strong>
                    <input type="text" name="lugar" value="{{ $agenda->lugar }}" class="form-control" placeholder="Lugar">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Equipo:</strong>
                    <input type="text" name="equipo" value="{{ $agenda->equipo }}" class="form-control" placeholder="Equipo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Montaje:</strong>
                    <input type="text" name="montaje" value="{{ $agenda->montaje }}" class="form-control" placeholder="Montaje">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Comentarios:</strong>
                    <input type="text" name="comentarios" value="{{ $agenda->comentarios }}" class="form-control" placeholder="Comentarios">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>

    </form>
@endsection
