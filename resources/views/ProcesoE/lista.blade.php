@extends('adminlte::page')
@section('title', 'Subprocesos')

@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Subprocesos</h2>
        </div>

    </div>

@section('cssDataTable')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
@endsection

@endsection

@section('content')



<div class="container">
    <a href="{{ route('tipoProcesoE.create.vista') }}" class="btn btn-primary mb-2"><i class="fas fa-plus-circle"></i> Añadir
        nuevo</a>



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
    <table id="proceso" style="font-size: 16px;"
        class="table table-striped table-bordered shadow-lg mt-4 display compact">
        <thead class="bg-primary text-white">
            <tr>
                <th>ID</th>
                <th>SUBPROCESO</th>
                <th>PROCESO</th>
                <th>SIGLA</th>
                <th>ACCIÓN</th>

            </tr>
        </thead>
        <tbody>
            @foreach ($Subcategorias as $Sp)
                <tr>
                    <td>{{ $Sp->id }}</td>
                    <td>{{ $Sp->documento }}</td>
                    <td>{{ $Sp->name }}</td>
                    <td>{{ $Sp->sigla }}</td>
                    <td>
                        <a href="{{ route('ProcesoE.update.vista', $Sp->id) }}"
                            class="btn btn-success btn-sm mb-2">
                            <i class="fas fa-edit"></i>
                        </a>
                    </td>


                </tr>
            @endforeach


        </tbody>
    </table>
    @section('jsDataTable')
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#proceso').DataTable();
            });
        </script>
    @endsection
</div>



@endsection
