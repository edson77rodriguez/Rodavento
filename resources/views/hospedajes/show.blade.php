@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Mostrar Hospedaje</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('hospedajes.index') }}"> Regresar</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Descripción:</strong>
                {{ $hospedaje->descripcion }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Costo entre semana:</strong>
                {{ $hospedaje->costo_entre_semana }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Costo volumen:</strong>
                {{ $hospedaje->costo_volumen }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Costo fin de semana:</strong>
                {{ $hospedaje->costo_fin }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Costo especial:</strong>
                {{ $hospedaje->costo_especial }}
            </div>
        </div>
    </div>
@endsection
