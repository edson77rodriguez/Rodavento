@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Agregar nuevo hospedaje</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('hospedajes.index') }}"> Regresar</a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hubo algunos problemas con su entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('hospedajes.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descripción:</strong>
                    <input type="text" name="descripcion" class="form-control" placeholder="Descripción">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Costo entre semana:</strong>
                    <input type="text" name="costo_entre_semana" class="form-control" placeholder="Costo entre semana">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Costo por volumen:</strong>
                    <input type="text" name="costo_volumen" class="form-control" placeholder="Costo por volumen">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Costo de fin de semana:</strong>
                    <input type="text" name="costo_fin" class="form-control" placeholder="Costo de fin de semana">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Costo especial:</strong>
                    <input type="text" name="costo_especial" class="form-control" placeholder="Costo especial">
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>

    </form>
@endsection
