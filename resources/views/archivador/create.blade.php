@extends('adminlte::page')
@section('title', 'Crear nuevo archivador')
@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Crear nuevo archivador</h2>
        </div>
    </div>
@endsection
@section('content')
    <style>
        .center_margin {
            margin-left: auto;
            margin-right: auto;
            margin-top: 15px;
        }
    </style>
    <div class="container">
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <div class="alert {{ 'alert-' . $msg }} alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('alert-' . $msg) }}
                </div>
            @endif
        @endforeach
        <div class="col-sm-7 center_margin">
            <div class="card">
                <div class="card-body">
                    <form method="POST" action="{{ route('Archivador.create') }}">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 center_margin">
                                    <label for="">Nombre archivador </label>
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                        value="">
                                </div>
                                <div class="col-md-12 center_margin">
                                    <label for="">Ubicación </label>
                                    <input type="text" class="form-control" name="ubicacion" id="ubicacion"
                                        value="">
                                </div>
                                <div class="col-md-12 center_margin">
                                    <label for="">Caracteristicas </label>
                                    <input type="text" class="form-control" name="caracteristicas" id="caracteristicas"
                                        value="">
                                </div>
                            </div>
                            <div class="col-sm-12 center_margin">
                                <input class="btn btn-success float-right" type="submit" value="Ingresar" />
                                <a class="btn btn-danger float-left" href="{{ URL::previous() }}">Atras</a>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
