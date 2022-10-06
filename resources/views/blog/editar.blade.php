@extends('adminlte::page')
@section('title', 'Editar Blog')

@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Editar Blog</h2>
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
                    <h3 align="center" for="exampleInputEmail1">CONTROL DE TEXTO EN EL BLOG </h3>

                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titulo</label>
                                    <input type="text" class="form-control" name="titulo" value="{{ $blog->titulo }}"
                                        placeholder="titulo">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Color</label>
                                    <input type="color" class="form-control" name="cTitulo" value="{{ $blog->cTitulo }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subtitulo 1</label>
                                    <input type="text" class="form-control" name="subtitulo1"
                                        value="{{ $blog->subtitulo1 }}" placeholder="subtitulo 1">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Color</label>
                                    <input type="color" class="form-control" name="cSubtitulo1"
                                        value="{{ $blog->cSubtitulo1 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Subtitulo 2</label>
                                    <input type="text" class="form-control" name="subtitulo2"
                                        value="{{ $blog->subtitulo2 }}" placeholder="subtitulo 2">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Color</label>
                                    <input type="color" class="form-control" name="cSubtitulo2"
                                        value="{{ $blog->cSubtitulo2 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Texto en el boton</label>
                                    <input type="text" class="form-control" name="tBoton" value="{{ $blog->tBoton }}"
                                        placeholder="Texto de boton">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Color</label>
                                    <input type="color" class="form-control" name="cBoton" value="{{ $blog->cBoton }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Texto Parrafo</label>
                                    <textarea class="form-control" name="parrafo" type="text" cols="30" rows="4">{{ $blog->parrafo }}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Color</label>
                                    <input type="color" class="form-control" name="cParrafo"
                                        value="{{ $blog->cParrafo }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titulo 2</label>
                                    <input type="text" class="form-control" name="fTitulo"
                                        value="{{ $blog->fTitulo }}" placeholder="Titulo antes del filtro">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Color</label>
                                    <input type="color" class="form-control" name="cTitulo2"
                                        value="{{ $blog->cTitulo2 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Color de fondo primario</label>
                                    <input type="color" class="form-control" name="cFondo2"
                                        value="{{ $blog->cFondo2 }}">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Color de fondo secundario</label>
                                    <input type="color" class="form-control" name="cFondo1"
                                        value="{{ $blog->cFondo1 }}">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="col-sm-12">
                        <h3 align="center" for="exampleInputEmail1">IMAGENES DEL CARRUSEL </h3>
                        <br>
                        @if ($blog->imagen1)
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Imagen 1 </label>

                                    <img width="300" src="{{ asset('files/biblioteca/' . $blog->imagen1) }}">

                                </div>
                                <div class="col-sm-8">
                                    <br>
                                    <h4>{{ $blog->imagen1 }}</h4>
                                    <a href="{{ route('blog.eliminar1', $blog->id) }}"
                                        class="btn btn-danger">Eliminar</a>
                                </div>

                            </div>
                        @else
                            <div class="form-group">
                                <label for="exampleInputEmail1">Imagen 1 </label>
                                <input type="file" class="form-control" name="imagen1" value="">
                            </div>
                        @endif
                    </div>
                    <br>
                    <div class="col-sm-12">
                        @if ($blog->imagen2)
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Imagen 2 </label>

                                    <img width="300" src="{{ asset('files/biblioteca/' . $blog->imagen2) }}">

                                </div>
                                <div class="col-sm-8">
                                    <br>
                                    <h4>{{ $blog->imagen2 }}</h4>
                                    <a href="{{ route('blog.eliminar2', $blog->id) }}"
                                        class="btn btn-danger">Eliminar</a>
                                </div>

                            </div>
                        @else
                            <div class="form-group">
                                <label for="exampleInputEmail1">Imagen 2 </label>
                                <input type="file" class="form-control" name="imagen2" value="">
                            </div>
                        @endif
                    </div>
                    <br>
                    <div class="col-sm-12">
                        @if ($blog->imagen3)
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Imagen 3 </label>

                                    <img width="300" src="{{ asset('files/biblioteca/' . $blog->imagen3) }}">

                                </div>
                                <div class="col-sm-8">
                                    <br>
                                    <h4>{{ $blog->imagen3 }}</h4>
                                    <a href="{{ route('blog.eliminar3', $blog->id) }}"
                                        class="btn btn-danger">Eliminar</a>
                                </div>

                            </div>
                        @else
                            <div class="form-group">
                                <label for="exampleInputEmail1">Imagen 3 </label>
                                <input type="file" class="form-control" name="imagen3" value="">
                            </div>
                        @endif
                    </div>
                    <br>
                    <h3 align="center" for="exampleInputEmail1">LOGO PRINCIPAL </h3>
                    <div class="col-sm-12">
                        @if ($blog->logo)
                            <div class="row">
                                <div class="col-sm-4">
                                    <label for="exampleInputEmail1">Logo principal </label>

                                    <img width="300" src="{{ asset('files/biblioteca/' . $blog->logo) }}">

                                </div>
                                <div class="col-sm-8">
                                    <br>
                                    <h4>{{ $blog->logo }}</h4>
                                    <a href="{{ route('blog.eliminarlogo', $blog->id) }}"
                                        class="btn btn-danger">Eliminar</a>
                                </div>

                            </div>
                        @else
                            <div class="form-group">
                                <label for="exampleInputEmail1">Logo </label>
                                <input type="file" class="form-control" name="logo" value="">
                            </div>
                        @endif
                    </div>
                    <br>



                    {{-- campos ocultos --}}
                    <input type="hidden" name="id" id="id" value="{{ $blog->id }}">


                    <button type="submit" class="btn btn-primary">Guardar</button>
                    <a href="{{ asset('documentos/lista') }}" class="btn btn-danger">Regresar</a>

                </form>

            </div>
        </div>

    </div>
@endsection
