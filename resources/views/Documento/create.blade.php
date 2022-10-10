@extends('adminlte::page')
@section('title', 'Crear Documento')

@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Crear Documento</h2>
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
                    <form method="POST" action="{{ route('documentos.create') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row">
                                <div class="col-sm-12 center_margin">
                                    <label for="">Tipo de proceso </label>
                                    <select id="proceso" name="proceso" class="form-control" required>
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($tipo as $tip)
                                            <option value="{{ $tip->id }}">
                                                {{ $tip->nombre_id }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-12 center_margin">
                                    <label for="">Proceso / Subproceso </label>
                                    <select id="subproceso" name="subproceso" class="form-control" required>
                                        <option value="">Selecciona una opción</option>
                                    </select>
                                </div>
                                <div class="col-sm-12 center_margin">
                                    <label for="">Tipo de documento </label>
                                    <select id="tipoDoc" name="tipoDoc" class="form-control" required>
                                        <option value="">Selecciona una opción</option>
                                        @foreach ($siglasDocumentos as $Sd)
                                            <option value="{{ $Sd->id }}">
                                                {{ $Sd->documento }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-sm-6 center_margin">
                                    <label for="">Código </label>
                                    <div class="row">
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="cT" id="cT"
                                                value="">
                                        </div>
                                        <div>
                                            <p>-</p>
                                        </div>
                                        <div class="col-md-3">
                                            <input type="text" class="form-control" name="cD" id="cD"
                                                value="">
                                        </div>
                                        <div>
                                            <p>-</p>
                                        </div>
                                        <div class="col-md-4">
                                            <input type="number" class="form-control" name="cN" id="cN"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-2 center_margin">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">V. actual </label>
                                            <input type="number" class="form-control" name="version" id="version"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 center_margin">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <label for="">F. Apr. Vigente </label>
                                            <input type="date" class="form-control" name="fecha" id="fecha"
                                                value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 center_margin">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <label for="">Nombre documento</label>
                                            <input type="text" class="form-control" name="nombre" id="nombre"
                                                value="">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="">Estado </label>
                                            <select id="estado" name="estado" class="form-control" required>
                                                <option value="">Selecciona una opción</option>
                                                @foreach ($estado as $est)
                                                    <option value="{{ $est->id }}">
                                                        {{ $est->estado }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 center_margin">
                                    <label for="">Observación</label>
                                    <textarea type="text" class="form-control" name="observacion" id="observacion" value=""></textarea>
                                </div>
                                <div class="col-sm-12 center_margin">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Archivos (PDF)</label>
                                        <input type="file" class="form-control" name="file" required>
                                    </div>
                                </div>

                                <div class="col-sm-12 center_margin">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Archivos (EDITABLES)</label>
                                        <input type="file" class="form-control" name="file_edit">
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

{{-- script para los select dependientes --}}
<script>
    $(document).ready(function() {
        document.getElementById('proceso').addEventListener('change', (e) => {
            fetch('subcategorias', {
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
                for (let i in data.lista) {
                    opciones += '<option value="' + data.lista[i].id + '">' + data
                        .lista[i].documento +
                        '</option>';
                }
                document.getElementById("subproceso").innerHTML = opciones;
            }).catch(error => console.error(error));
        })
    });
    $(document).on('change', '#subproceso', (e) => {
        fetch('busqueda', {
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
        fetch('documentos', {
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
