@extends('adminlte::page')
@section('title', 'Editar Usuarios')

@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Editar Usuarios</h2>
        </div>

    </div>

@endsection

@section('content')

    <div class="container">
        @if ($errors->any())
            <ul style="padding: initial">
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger alert-dismissable">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <li>{{ $error }}</li>
                    </div>
                @endforeach
            </ul>
        @endif
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('blog.update') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titulo</label>
                                    <input type="text" class="form-control" name="titulo" value="{{ $blog->titulo }}"
                                        placeholder="titulo">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subtitulo 1</label>
                                    <input type="text" class="form-control" name="subtitulo1"
                                        value="{{ $blog->subtitulo1 }}" placeholder="subtitulo 1">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subtitulo 2</label>
                                    <input type="text" class="form-control" name="subtitulo2"
                                        value="{{ $blog->subtitulo2 }}" placeholder="subtitulo 2">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Texto en el boton</label>
                                    <input type="text" class="form-control" name="tBoton" value="{{ $blog->tBoton }}"
                                        placeholder="Texto de boton">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Texto Parrafo</label>
                                    <textarea class="form-control" type="text" cols="30" rows="3">{{ $blog->parrafo }}</textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- campos ocultos --}}
                    <input type="hidden" name="id" id="id" value="{{ $blog->id }}">


                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ asset('documentos/lista') }}" class="btn btn-danger">Regresar</a>

                </form>

            </div>
        </div>

    </div>
@endsection
