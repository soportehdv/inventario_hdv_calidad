@extends('adminlte::page')
@section('title', 'Productos')

@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Modificar tipo de documento</h2>
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
                    <form method="POST" action="{{ route('TipoDocumentos.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 center_margin">
                                    <label for="">Nombre documento </label>
                                    <input type="text" class="form-control" name="documento" id="documento"
                                        value="{{ $siglasDocumentos->documento }}">
                                </div>
                                <div class="col-md-12 center_margin">
                                    <label for="">Sigla </label>
                                    <input type="text" class="form-control" name="sigla" id="sigla"
                                        value="{{ $siglasDocumentos->sigla }}">
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
