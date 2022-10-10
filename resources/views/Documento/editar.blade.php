@extends('adminlte::page')
@section('title', 'Modificar documentos')

@section('content_header')
    <div class="card">
        <div class="card-header" style="height:4em;">
            <h2>Modificar documentos</h2>
        </div>

    </div>

@endsection

@section('content')



    <div class="container">
        <style>
            .center_margin {
                margin-left: auto;
                margin-right: auto;
                margin-top: 19px;
            }
        </style>

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
                    <form method="POST" action="{{ route('documentos.update', $documentos->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12 center_margin">
                                    <h5 for="">Tipo de proceso:
                                        @foreach ($tipo as $tip)
                                            @if ($documentos->tipoProceso === $tip->id)
                                                <label>{{ $tip->nombre_id }}</label>
                                            @endif
                                        @endforeach
                                    </h5>
                                    <select id="proceso" name="proceso" class="form-control">
                                        @foreach ($tipo as $tip)
                                            <option value="{{ $tip->id }}"
                                                @if ($documentos->tipoProceso === $tip->id) selected='selected' @endif>
                                                {{ $tip->nombre_id }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 center_margin">
                                    <h5 for="">Proceso / Subproceso:
                                        @foreach ($subcategorias as $sub)
                                            @if ($documentos->proceso === $sub->id)
                                                <label>{{ $sub->documento }}</label>
                                            @endif
                                        @endforeach
                                    </h5>
                                    <select id="subproceso" name="subproceso" class="form-control">
                                        @foreach ($subcategorias as $sub)
                                            <option value="{{ $sub->id }}"
                                                @if ($documentos->proceso === $sub->id) selected='selected' @endif>
                                                {{ $sub->documento }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 center_margin">
                                    <h5 for="">Tipo de documento:
                                        @foreach ($siglasDocumentos as $sig)
                                            @if ($documentos->tipoDocumento === $sig->id)
                                                <label>{{ $sig->documento }}</label>
                                            @endif
                                        @endforeach
                                    </h5>
                                    <select id="tipoDoc" name="tipoDoc" class="form-control">
                                        @foreach ($siglasDocumentos as $Sd)
                                            <option value="{{ $Sd->id }}"
                                                @if ($documentos->tipoDocumento === $Sd->id) selected='selected' @endif>
                                                {{ $Sd->documento }}</option>
                                        @endforeach
                                        {{-- <option value="">Selecciona una opción</option>
                                        @foreach ($siglasDocumentos as $Sd)
                                            <option value="{{ $Sd->id }}">
                                                {{ $Sd->documento }}
                                            </option>
                                        @endforeach --}}
                                    </select>
                                </div>
                                @php
                                    $divicion = explode('-', $documentos->codigo);
                                @endphp
                                <div class="col-sm-6 center_margin">
                                    <label for="">Código </label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="cT" id="cT"
                                                value="{{ $divicion[0] }}">
                                        </div>
                                        <div>
                                            <p>-</p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="cD" id="cD"
                                                value="{{ $divicion[1] }}">
                                        </div>
                                        <div>
                                            <p>-</p>
                                        </div>
                                        @if (isset($divicion[2]))
                                            <div class="col-md-4">
                                                <input type="number" class="form-control" name="cN" id="cN"
                                                    value="{{ $divicion[2] }}">
                                            </div>
                                        @else
                                            <div class="col-md-4">
                                                <input type="number" class="form-control" name="cN" id="cN"
                                                    value="">
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-sm-2 center_margin">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">V. actual </label>
                                            <input type="number" class="form-control" name="version" id="version"
                                                value="{{ $documentos->versionActual }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 center_margin">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">F. Apr. Vigente </label>
                                            <input type="date" class="form-control" name="fecha" id="fecha"
                                                value="{{ $documentos->fechaAprobacion }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 center_margin">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="">Nombre documento</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre"
                                                value="{{ $documentos->nombre }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Estado </label>
                                            <select id="estado" name="estado" class="form-control">
                                                <option value="">Selecciona una opción</option>
                                                @foreach ($estado as $est)
                                                    <option value="{{ $est->id }}">
                                                        {{ $est->estado }}
                                                    </option>
                                                @endforeach

                                                @foreach ($estado as $est)
                                                    <option value="{{ $est->id }}"
                                                        @if ($documentos->estado === $est->id) selected='selected' @endif>
                                                        {{ $est->estado }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 center_margin">
                                    <label for="">Observación</label>
                                    <textarea type="text" class="form-control" name="observacion" id="observacion"
                                        value="{{ $documentos->observacion }}">{{ $documentos->observacion }}</textarea>
                                    {{-- @php
                                         dd($documentos->observacion);
                                    @endphp --}}
                                </div>
                                <div class="col-sm-12 center_margin">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Archivos </label>
                                        <input type="file" class="form-control" name="file" value=""
                                            multiple>
                                        <br>
                                        @if ($documentos->ruta != null)
                                            <table style="font-size: 12px;"
                                                class="table table-striped table-bordered shadow-lg mt-4 display compact">
                                                <thead class="bg-primary text-white">
                                                    <tr>
                                                        <th>Nombre</th>
                                                        <th>Extensión</th>
                                                        <th>peso</th>
                                                        <th style="width: 20%">ACCION</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>{{ $documentos->name }}</td>
                                                        <td>{{ $documentos->extension }}</td>
                                                        <td>{{ $documentos->size }} Kb</td>
                                                        <td>
                                                            {{-- <a href="{{ route('documentos.update.vista', $documentos->id) }}"
                                                        class="btn btn-danger btn-sm mb-2">
                                                        <i class="fas fa-trash"></i>
                                                    </a> --}}
                                                            <a data-toggle="modal"
                                                                data-target="#modal-delete-{{ $documentos->id }}"
                                                                class="btn btn-danger btn-sm mb-2">
                                                                <i class="fas fa-trash" style="color: white"></i>
                                                            </a>
                                                            <a target="_blank"
                                                                href="{{ asset('files/biblioteca/' . $documentos->ruta) }}"
                                                                class="btn btn-warning btn-sm mb-2">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        @endif

                                        {{-- modal eliminar --}}
                                        <div class="modal fade" id="modal-delete-{{ $documentos->id }}" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h4 class="modal-title">Eliminar</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>
                                                            ¿Esta seguro que desea eliminar el archivo:<b>
                                                                {{ $documentos->name }}</b>
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        {{-- <button type="submit" class="btn btn-danger">Eliminar</button> --}}
                                                        <a href="{{ route('documentos.eliminar', $documentos->id) }}"
                                                            class="btn btn-danger">Eliminar</a>
                                                        <a style="color: white" class="btn btn-primary"
                                                            data-dismiss="modal">Cerrar</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 center_margin">
                                    <input class="btn btn-success float-right" type="submit" value="Actualizar" />
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

{{-- script para los select dependientes --}}
<script>
    $(document).ready(function() {
        document.getElementById('proceso').addEventListener('change', (e) => {
            fetch('../subcategorias', {
                method: 'POST',
                body: JSON.stringify({
                    texto: e.target.value
                }),
                headers: {
                    'Content-Type': 'application/json',
                    "X-CSRF-Token": document.querySelector(
                        'meta[name="csrf-token"]').getAttribute('content')
                }
            }).then(response => {
                return response.json()
            }).then(data => {
                var opciones = "<option value=''>Selecciona una opción</option>";
                console.log(data.lista);

                for (let i in data.lista) {
                    opciones += '<option value="' + data.lista[i].id + '">' + data
                        .lista[i].documento +
                        '</option>';
                }
                document.getElementById("subproceso").innerHTML = opciones;
                $('#subproceso').prop('disabled', false);
            }).catch(error => console.error(error));
        })
    });
    $(document).on('change', '#subproceso', (e) => {
        fetch('../busqueda', {
            method: 'POST',
            body: JSON.stringify({
                texto: e.target.value
            }),
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": document.querySelector(
                    'meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(response => {
            return response.json()
        }).then(data => {
            for (let i in data.lista) {
                var opciones = data.lista[i].sigla;
            }
            $('#cD').val(opciones);
        }).catch(error => console.error(error));
    });
    $(document).on('change', '#tipoDoc', (e) => {
        // console.log(e.target.value);
        fetch('../documentos', {
            method: 'POST',
            body: JSON.stringify({
                texto: e.target.value
            }),
            headers: {
                'Content-Type': 'application/json',
                "X-CSRF-Token": document.querySelector(
                    'meta[name="csrf-token"]').getAttribute('content')
            }
        }).then(response => {
            return response.json()
        }).then(data => {
            for (let i in data.lista) {
                var opciones = data.lista[i].sigla;
                // var opciones = data.lista[i].id;

            }
            $('#cT').val(opciones);
            // console.log(opciones);
        }).catch(error => console.error(error));
    });
</script>
