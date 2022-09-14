@extends('adminlte::page')
@section('title', 'Archivos')

@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Documentos</h2>
        </div>

    </div>
@section('cssDataTable')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
@endsection

@endsection

@section('content')



<div class="container">
    <a href="{{ route('files.create.vista') }}" class="btn btn-primary mb-2"><i class="fas fa-plus-circle"></i> Añadir
        nuevo</a>
    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if (Session::has('alert-' . $msg))
            <div class="alert {{ 'alert-' . $msg }} alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get('alert-' . $msg) }}
            </div>
        @endif
    @endforeach
    <br>
    <table id="archivos" class="table table-striped table-bordered shadow-lg mt-4 display compact">
        <thead class="bg-primary text-white">
            <tr>
                <th>Id</th>
                <th>Ruta</th>
                <th>Nombre</th>
                <th>Mime</th>
                <th>Created_at</th>
                <th>Acción</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($files as $file)
                <tr>
                    <th>{{ $file->id }}</th>
                    <td>{{ $file->nombre }}</td>
                    <td>{{ $file->ruta }}</td>
                    <td>{{ $file->mime }}</td>
                    <td>{{ $file->created_at }}</td>
                    <td>
                        <a href="{{ route('files.update.vista', $file->id) }}" class="btn btn-success mb-2">
                            <i class="fas fa-edit"></i>
                        </a>
                        {{-- <a href="{{ route('files.update.vista', $file->id) }}" class="btn btn-primary mb-2">
                            <i class="fas fa-eye"></i>
                        </a> --}}
                        <a data-toggle="modal" data-target="#modal-show-{{ $file->id }}"
                            class="btn btn-primary mb-2">
                            <i class="fa fa-eye"></i>
                        </a>
                        <a data-toggle="modal" data-target="#modal-delete-{{ $file->id }}"
                            class="btn btn-danger mb-2">
                            <i class="fas fa-trash" style="color: white"></i>
                        </a>
                        <a href="{{ route('files.update.vista', $file->id) }}" class="btn btn-warning mb-2">
                            <i class="fas fa-download"></i>
                        </a>
                    </td>

                </tr>
                {{-- modal eliminar --}}
                <div class="modal fade" id="modal-delete-{{ $file->id }}" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Eliminar</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    ¿Esta seguro que desea eliminar el archivo:<b> {{ $file->nombre }}</b>
                                </p>
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="submit" class="btn btn-danger">Eliminar</button> --}}
                                <a href="{{ route('files.eliminar', $file->id) }}" class="btn btn-danger">Eliminar</a>
                                <a style="color: white" class="btn btn-primary" data-dismiss="modal">Cerrar</a>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- modal show --}}
                <div class="modal fade" id="modal-show-{{ $file->id }}" tabindex="-1" role="dialog"
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
                                <div class="row">
                                    <div class="col-md-12">
                                        <div align="center">
                                            @if ($file->mime != 'image')
                                                {{-- <img src="{{asset("images/logos/document.png")}}" height="40px" width="30px" /> --}}
                                            @else
                                                <img src="{{ asset('files/biblioteca/' . $file->ruta) }}"
                                                    height="200px" width="300px" alt="imagenes">
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <h6><b>Nombre: </b> {{ $file->nombre }}</h6>
                                <h6><b>Url: </b> {{ asset('files/biblioteca/' . $file->ruta) }}</h6>
                                <h6><b>Tipo: </b> {{ $file->mime }}</h6>
                                <h6><b>Tamaño: </b> {{ $file->size }} KB</h6>
                                <h6><b>Subida: </b> {{ $file->created_at }}</h6>

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
                $('#archivos').DataTable();
            });
        </script>
    @endsection
</div>



@endsection

