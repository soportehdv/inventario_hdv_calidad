@extends('adminlte::page')
@section('title', 'Modificar Subprocesos')

@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Modificar Subprocesos</h2>
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
                    <form method="POST" action="{{ route('Proceso.update', $Tipo->id)}} enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-12 center_margin">
                                    <label for="">Nombre de Proceso </label>
                                    <input type="text" class="form-control" name="proceso" id="proceso"
                                        value="{{ $Tipo->nombre_id }}" required>
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
