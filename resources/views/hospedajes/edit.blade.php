@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar hospedaje</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('hospedajes.index') }}"> Regresar</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Whoops!</strong> Hubo algunos problemas con tu entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hospedajes.update',$hospedaje->id_hospedaje) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <input type="text" name="descripcion" value="{{ $hospedaje->descripcion }}" class="form-control" placeholder="Descripción">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Costo entre semana:</strong>
                    <input type="text" name="costo_entre_semana" value="{{ $hospedaje->costo_entre_semana }}" class="form-control" placeholder="Costo entre semana">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Costo volumen:</strong>
                    <input type="text" name="costo_volumen" value="{{ $hospedaje->costo_volumen }}" class="form-control" placeholder="Costo volumen">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Costo fin de semana:</strong>
                    <input type="text" name="costo_fin" value="{{ $hospedaje->costo_fin }}" class="form-control" placeholder="Costo fin de semana">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Costo especial:</strong>
                    <input type="text" name="costo_especial" value="{{ $hospedaje->costo_especial }}" class="form-control" placeholder="Costo especial">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
        </div>

    </form>
@endsection
