@extends('layouts.template')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Agregar Cotización</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('cotizaciones.index') }}"> Regresar</a>
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
    <form action="{{ route('cotizaciones.store') }}" method="POST">
        @csrf
        <div class="row justify-content-center">
            <div class="col-7">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Cliente:</strong>
                            <select name="id_cliente" id="" class="form-control">
                                <option value="" selected disabled>Selecciona un cliente</option>
                                @foreach($clientes as $cliente)
                                    <option value="{{$cliente->id_client}}">{{$cliente->persona->nom}} {{$cliente->persona->ap}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Vendedor:</strong>
                            <select name="id_vendedor" id="" class="form-control">
                                <option value="" selected disabled>Selecciona un vendedor</option>
                                @foreach($vendedores as $vendedor)
                                    <option value="{{$vendedor->id_vendedor}}">{{$vendedor->persona->nom}} {{$vendedor->persona->ap}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Número de personas:</strong>
                            <input type="number" name="num_personas" class="form-control" placeholder="Número de personas">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Empresa:</strong>
                            <select name="id_empresa" id="" class="form-control">
                                <option value="" selected disabled>Selecciona una empresa</option>
                                @foreach($empresas as $empresa)
                                    <option value="{{$empresa->id_empresa}}">{{$empresa->nom}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection
