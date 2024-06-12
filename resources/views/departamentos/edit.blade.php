@extends('layouts.template')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Editar Departamento</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('departamentos.index') }}"> Volver</a>
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

    <form action="{{ route('departamentos.update', $departamento->id_departamento) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tipo:</strong>
                    <input type="text" name="tipo" value="{{ $departamento->tipo }}" class="form-control" placeholder="Tipo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Departamento:</strong>
                    <input type="text" name="departamento" value="{{ $departamento->departamento }}" class="form-control" placeholder="Departamento">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Costo:</strong>
                    <input type="text" name="costo" value="{{ $departamento->costo }}" class="form-control" placeholder="Costo">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Precio sin IVA:</strong>
                    <input type="text" name="precio_sin_iva" value="{{ $departamento->precio_sin_iva }}" class="form-control" placeholder="Precio sin IVA">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>IVA:</strong>
                    <input type="text" name="iva" value="{{ $departamento->iva }}" class="form-control" placeholder="IVA">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Subtotal:</strong>
                    <input type="text" name="subtotal" value="{{ $departamento->subtotal }}" class="form-control" placeholder="Subtotal">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Servicio:</strong>
                    <input type="text" name="servicio" value="{{ $departamento->servicio }}" class="form-control" placeholder="Servicio">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total:</strong>
                    <input type="text" name="total" value="{{ $departamento->total }}" class="form-control" placeholder="Total">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Observaciones:</strong>
                    <textarea class="form-control" style="height:150px" name="observaciones" placeholder="Observaciones">{{ $departamento->observaciones }}</textarea>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>

    </form>
@endsection
