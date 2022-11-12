@extends('adminlte::page')
@section('title', 'Documentos')

@section('content_header')

    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Documentos</h2>
        </div>
    </div>

@section('cssDataTable')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.0.2/css/searchPanes.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css" />
    <style>
        .bajardoc {
            display: flex;
            width: 100%;
            padding-bottom: 30px;
            margin: 30px 0;
            border-bottom: 1px solid #E7E7E7;
        }

        .bajardoc img,
        .item_descarga img {
            width: 70px;
            height: auto;
            margin-right: 30px;
        }

        .descarga {
            text-decoration: none;
        }
    </style>
@endsection

@endsection

@section('content')



<div class="container">
    <a href="{{ route('documentos.create.vista') }}" class="btn btn-primary mb-2"><i class="fas fa-plus-circle"></i>
        Añadir
        nuevo</a>
    <a data-toggle="modal" data-target="#modal-importar" class="btn btn-primary mb-2" style="color: white">
        <i class="fas fa-plus-circle"></i> Importar
    </a>
    <a data-toggle="modal" data-target="#modal-exportar" class="btn btn-primary mb-2" style="color: white">
        <i class="fas fa-plus-circle"></i> exportar
    </a>
    {{-- modal importar --}}
    <div class="modal fade" id="modal-importar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
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
    {{-- modal exportar --}}
    <div class="modal fade" id="modal-exportar" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Filtro para exportar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <form action="{{ route('documentos.exportar') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="col-md-12">
                                <input type="date" name="fecha_ini" id="fecha_ini" required>
                                <input type="date" name="fecha_fin" id="fecha_fin" required>
                                <button class="btn btn-primary" type="submit">exportar</button>
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
                                <div class="card" style="width: 100%;">
                                    <div class="card-header bg-primary text-white" align="center">
                                        Datos del documento
                                    </div>
                                    <ul class="list-group list-group-flush">
                                        <li class="list-group-item">Tipo de proceso:
                                            <b>{{ $documento->nombre_id }}</b>
                                        </li>
                                        <li class="list-group-item">Proceso / Subproceso:
                                            <b>{{ $documento->documento }}</b>
                                        </li>
                                        <li class="list-group-item">Tipo de documento: <b>{{ $documento->siglas }}</b>
                                        </li>
                                        <li class="list-group-item">Código: <b>{{ $documento->codigo }}</b></li>
                                        <li class="list-group-item">Nombre: <b>{{ $documento->nombre }}</b></li>
                                        <li class="list-group-item">Versión actual:
                                            <b>{{ $documento->versionActual }}</b>
                                        </li>
                                        <li class="list-group-item">Fecha de aprobación:
                                            <b>{{ $documento->fechaAprobacion }}</b>
                                        </li>
                                        @if ($documento->status != null)
                                            <li class="list-group-item">Estado de documento:
                                                <b>{{ $documento->status }}</b>
                                            </li>
                                        @endif
                                        @if ($documento->observacion != null)
                                            <li class="list-group-item">Observaciones:
                                                <b>{{ $documento->observacion }}</b>
                                            </li>
                                        @else
                                            <li class="list-group-item">Observaciones:
                                                <b>No hay observaciones para este documento</b>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                                @if ($documento->name != null)
                                    <div class="bajardoc">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <a href="{{ asset('files/biblioteca/' . $documento->ruta) }}"
                                                        title="{{ $documento->nombre }} ({{ $documento->updated_at }})."
                                                        target="blank">
                                                        <img src="http://www.hdv.gov.co/files/biblioteca/2022-09-27_7271042.png"
                                                            alt="{{ $documento->nombre }} ({{ $documento->updated_at }})."
                                                            title="{{ $documento->nombre }} ({{ $documento->updated_at }})."
                                                            width="100" height="100"
                                                            class="mimethumb img-fluid">
                                                    </a>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="row">
                                                        <a href="{{ asset('files/biblioteca/' . $documento->ruta) }}"
                                                            title="{{ $documento->nombre }}."
                                                            target="blank">{{ $documento->nombre }}.</a>
                                                    </div>
                                                    <div class="row">
                                                        <a class="descarga"
                                                            href="{{ asset('documentos/download/' . $documento->id) }}">{{ $documento->size }}
                                                            KB, Descargar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            @if ($documento->name_edit != null && $documento->extension_edit == 'doc')
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a href="{{ asset('files/biblioteca/' . $documento->ruta_edit) }}"
                                                            title="{{ $documento->nombre }}." target="blank">
                                                            <img src="http://www.hdv.gov.co/files/biblioteca/2022-09-27_337932.png"
                                                                alt="{{ $documento->nombre }}."
                                                                title="{{ $documento->nombre }}." width="100"
                                                                height="100" class="mimethumb img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <a href="{{ asset('files/biblioteca/' . $documento->ruta_edit) }}"
                                                                title="{{ $documento->nombre }}."
                                                                target="blank">{{ $documento->nombre }}.</a>
                                                        </div>
                                                        <div class="row">
                                                            <a class="descarga"
                                                                href="{{ asset('documentos/download/' . $documento->id) }}">{{ $documento->size_edit }}
                                                                KB, Descargar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @elseif($documento->name_edit != null)
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <a href="{{ asset('files/biblioteca/' . $documento->ruta_edit) }}"
                                                            title="{{ $documento->nombre }}." target="blank">
                                                            <img src="https://www.hdv.gov.co/files/biblioteca/2022-09-27_337958.png"
                                                                alt="{{ $documento->nombre }}."
                                                                title="{{ $documento->nombre }}." width="100"
                                                                height="100" class="mimethumb img-fluid">
                                                        </a>
                                                    </div>
                                                    <div class="col-md-8">
                                                        <div class="row">
                                                            <a href="{{ asset('files/biblioteca/' . $documento->ruta_edit) }}"
                                                                title="{{ $documento->nombre }}."
                                                                target="blank">{{ $documento->nombre }}.</a>
                                                        </div>
                                                        <div class="row">
                                                            <a class="descarga"
                                                                href="{{ asset('documentos/download/' . $documento->id) }}">{{ $documento->size_edit }}
                                                                KB, Descargar</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <br><br>
                                                <h6> No sé han subido archivos editables para este documento </h6>
                                            @endif
                                        </div>
                                    </div>
                                    <h5 align="center"><b>Previsualización</b></h5>
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
                                    <h6> No sé han subido archivos para este documento </h6>
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
        <script src="https://cdn.datatables.net/searchpanes/2.0.2/js/dataTables.searchPanes.min.js"></script>
        <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
        <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#documentos').DataTable({
                    dom: 'PBfrtip',
                    buttons: [
                        'copy', 'csv', 'excel', 'pdf', 'print'
                    ],
                    searchPanes: {
                        cascadePanes: true,
                        dtOpts: {
                            paging: 'true',
                            pagingType: 'numbers',
                            searching: false,
                        },
                    },
                    columnDefs: [{
                            searchPanes: {
                                show: false
                            },
                            targets: [3, 4, 5, 6, 7]
                        },
                        {
                            searchPanes: {
                                show: true
                            },
                            targets: [0, 1, 2]
                        },
                    ],

                    "language": {
                        searchPanes: {
                            title: {
                                _: 'Total de filtros selecionados - %d',
                                0: 'Selecione un opción para filtrar tu busqueda',
                                1: 'Se ha selecionado un filtro'
                            },
                            "clearMessage": "Borrar seleccionados",
                            "showMessage": "Mostrar Todo",
                            "collapseMessage": "Contraer Todo",
                            count: '{total}',
                            countFiltered: '{shown} ({total})',
                        },
                        "lengthMenu": "Mostrar _MENU_ registros por página",
                        "zeroRecords": "No se ha encontrado nada relacionado - Disculpa",
                        "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                        "infoEmpty": "No records available",
                        "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                        "search": "Buscar:",
                        "paginate": {
                            "next": "Siguiente",
                            "previous": "Anterior"
                        },
                        "buttons": {
                            "copy": "Copiar",
                            "print": "Imprimir",
                        }
                    }
                });
            });
        </script>
    @endsection
</div>
@endsection
