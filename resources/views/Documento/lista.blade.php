@extends('adminlte::page')
@section('title', 'Productos')

@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Productos</h2>
        </div>

    </div>

@section('cssDataTable')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
@endsection

@endsection

@section('content')



<div class="container">
    <a href="{{ route('documentos.create.vista') }}" class="btn btn-primary mb-2"><i class="fas fa-plus-circle"></i> Añadir
        nuevo</a>
    <a data-toggle="modal" data-target="#modal-importar" class="btn btn-primary mb-2" style="color: white">
        <i class="fas fa-plus-circle"></i> Importar
    </a>
    {{-- modal show --}}
    <div class="modal fade" id="modal-importar" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Importación masiva</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('documentos.importar') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <input type="file" name="doc" id="doc" required>
                                <button class="btn btn-primary" type="submit">importar</button>
                            </div>
                        </form>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>


    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if (Session::has('alert-' . $msg))
            <br>
            <div class="alert {{ 'alert-' . $msg }} alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get('alert-' . $msg) }}
            </div>
        @endif
    @endforeach
    <br>
    <table id="documentos" style="font-size: 12px;"
        class="table table-striped table-bordered shadow-lg mt-4 display compact">
        <thead class="bg-primary text-white">
            <tr>
                <th style="width: 10%">TIPO PROCESO</th>
                <th>PROCESO / SUBPROCESO</th>
                <th>TIPO DE DOCUMENTO</th>
                <th style="width: 8%">CÓDIGO</th>
                <th>NOMBRE</th>
                <th style="width: 5%">VERSION ACTUAL</th>
                <th>ESTADO</th>
                <th style="width: 10%">ACCION</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($documentos as $documento)
                <tr>
                    <td>{{ $documento->nombre_id }}</td>
                    <td>{{ $documento->documento }}</td>
                    <td>{{ $documento->siglas }}</td>
                    <td>{{ $documento->codigo }}</td>
                    <td>{{ $documento->nombre }}</td>
                    <td>{{ $documento->versionActual }}</td>
                    <td>{{ $documento->status }}</td>
                    <td>
                        <a href="{{ route('documentos.update.vista', $documento->id) }}"
                            class="btn btn-success btn-sm mb-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a data-toggle="modal" data-target="#modal-show-{{ $documento->id }}"
                            class="btn btn-warning btn-sm mb-2">
                            <i class="fa fa-eye"></i>
                        </a>
                    </td>


                </tr>
                {{-- modal show --}}
                <div class="modal fade" id="modal-show-{{ $documento->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Vista previa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">

                                <br>
                                <h5 align="center"><b>Datos del documento</b></h5>

                                <h6><b>Tipo de proceso: </b>{{ $documento->nombre_id }}</h6>
                                <h6><b>Proceso / Subproceso: </b>{{ $documento->documento }}</h6>
                                <h6><b>Tipo de documento: </b>{{ $documento->siglas }}</h6>
                                <h6><b>Código: </b>{{ $documento->codigo }}</h6>
                                <h6><b>Nombre: </b>{{ $documento->nombre }}</h6>
                                <h6><b>Versión actual: </b>{{ $documento->versionActual }}</h6>
                                <h6><b>Fecha de aprobación: </b>{{ $documento->fechaAprobacion }}</h6>
                                <h6><b>Estado de documento: </b>{{ $documento->status }}</h6>
                                @if ($documento->name != null)
                                <h5 align="center"><b>Datos del archivo</b></h5>
                                <h6><b>Nombre documento: </b> {{ $documento->name }}</h6>
                                <h6><b>Url: </b><a target="_blank"
                                        href="{{ asset('files/biblioteca/' . $documento->ruta) }}">{{ asset('files/biblioteca/' . $documento->ruta) }}</a>
                                </h6>
                                <h6><b>Tamaño: </b> {{ $documento->size }} KB</h6>
                                <h6><b>Subida: </b> {{ $documento->updated_at }}</h6>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div align="center">
                                            @if ($documento->mime == 'image')
                                                <img src="{{ asset('files/biblioteca/' . $documento->ruta) }}"
                                                    height="200px" width="300px" alt="imagenes">
                                            @endif
                                            @if ($documento->extension == 'pdf')
                                                <embed src="{{ asset('files/biblioteca/' . $documento->ruta) }}"
                                                    type="application/pdf" width="100%" height="600px" />
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @else
                                <br><br>
                                    <h6> No sé a subido archivos para este documento </h6>
                                @endif

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach


        </tbody>
    </table>
    @section('jsDataTable')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#documentos').DataTable();
            });
        </script>
    @endsection
</div>



@endsection
