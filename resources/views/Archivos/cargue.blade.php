@extends('adminlte::page')
@section('titulo','Documentos')

{{-- @section('headers')
    <link rel="stylesheet" href="{{ asset('/gentelella/vendors/dropzone2/dropzone.css') }}">
@endsection --}}
@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Cargar documentos</h2>
        </div>

    </div>
    {{-- @if ($search)
        <div class="alert alert-primary" role="alert">
            Los resultados para su busqueda '{{ $search }}' son:
            <button type="button" class="close" data-dismiss="alert" style="color:white">&times;</button>
        </div>
    @endif --}}

@endsection




@section('content')


    {{-- Bloque de mensajes --}}
    <a href="{{ route('user.create.vista') }}" class="btn btn-primary mb-2"><i class="fas fa-plus-circle"></i> Añadir nuevo</a>
        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <div class="alert {{ 'alert-' . $msg }} alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('alert-' . $msg) }}
                </div>
            @endif
        @endforeach
        <br>

   
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
                    <div class="x_title">
                        <h2>Gestión archivos multiples </h2><br><br>
                        <div class="clearfix"></div>
                    </div>

                    <div class="x_content">

                        <div class="" role="tabpanel" data-example-id="togglable-tabs">
                            {{-- encabezados --}}
                            <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">
                                <li role="presentation" @if(session('status')) class="" @else class="active" @endif>
                                    <a href="#tab_cargue_content" id="home-tab" role="tab" data-toggle="tab" aria-expanded="true"> <i class="fa fa-upload"></i> Cargue</a>
                                </li>
                                <li role="presentation" @if(session('status')) class="active" @else class="" @endif>
                                    <a href="#tab_listado_content" role="tab" id="profile-tab" data-toggle="tab" aria-expanded="false"> <i class="fa fa-list"></i> Listado</a>
                                </li>
                            </ul>

                            <div id="myTabContent" class="tab-content">
                                {{-- detalles --}}
                                <div role="tabpanel" @if(session('status')) class="tab-pane fade" @else class="tab-pane fade active in" @endif id="tab_cargue_content" aria-labelledby="home-tab">
                                    <p>Arrastre los archivos aqui.</p>

                                    <form action="{{ asset('/archivos/dropzone') }}" method="POST" class="dropzone" enctype="multipart/form-data">
                                        @csrf
                                    </form>

                                </div>
                                <div role="tabpanel" @if(session('status')) class="tab-pane fade active in" @else class="tab-pane fade" @endif  id="tab_listado_content" aria-labelledby="profile-tab">
                                    {{-- <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo
                                    booth letterpress, commodo enim craft beer mlkshk aliquip</p> --}}
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <table id="files" class="table table-striped table-bordered" width="100%">
                                                <thead>
                                                    <tr>
                                                        <th width="10%"><center>VISTA</center></th>
                                                        <th width="50%"><center>NOMBRE</center></th>
                                                        <th width="10%"><center>TIPO</center></th>
                                                        <th width="20%"><center>SUBIDA</center></th>
                                                        <th width="10%"><center>ACCIONES</center></th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
            </div>
        </div>
    </div>

    {{-- <form action="" method="POST" class="dropzone">
    </form> --}}
@endsection
@section('imports')

    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('/gentelella/vendors/dropzone2/dropzone.js') }}"></script>

    <script>
        $(document).ready( function(){
            $('#files').DataTable(
                {
                "serverSide":true,
                "ajax": "{{ url('api/files') }}",
                "columns":[
                    {data:'ruta'},
                    {data:'nombre'},
                    {data:'mime'},
                    {data:'created_at'},
                    // {data:'visitas'},
                    {data:'btn'},
                ],language:{
                url: "{{ asset('gentelella/vendors/datatables.net/Spanish.json') }}"
                }
            });
        });
    </script>

@endsection
