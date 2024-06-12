@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Detalles de la Cotización</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cotizaciones.index') }}"> Regresar</a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha de Cotización:</strong>
                {{ $cotizacion->fecha_cotizacion }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Total:</strong>
                {{ $cotizacion->total }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Cliente:</strong>
                {{ $cotizacion->cliente->persona->nom }} {{ $cotizacion->cliente->persona->ap }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Vendedor:</strong>
                {{ $cotizacion->vendedor->persona->nom }} {{ $cotizacion->vendedor->persona->ap }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Número de Personas:</strong>
                {{ $cotizacion->num_personas }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Empresa:</strong>
                {{ $cotizacion->empresa->nom }}
            </div>
        </div>
    </div>
@endsection
