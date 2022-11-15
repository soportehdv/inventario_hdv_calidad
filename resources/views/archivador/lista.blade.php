@extends('adminlte::page')
@section('title', 'Archivador')

@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Archivadores</h2>
        </div>

    </div>

@section('cssDataTable')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />
@endsection

@endsection

@section('content')



<div class="container">
    <a href="{{ route('Archivador.create') }}" class="btn btn-primary mb-2"><i class="fas fa-plus-circle"></i> Añadir
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
    <table id="files" style="font-size: 16px;"
        class="table table-striped table-bordered shadow-lg mt-4 display compact">
        <thead class="bg-primary text-white">
            <tr>
                <th>ID</th>
                <th>NOMBRE</th>
                <th>UBICACION</th>
                <th>CARACTERISTICAS</th>
                <th>ACCIÓN</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($Files as $file)
                <tr>
                    <td>{{ $file->id }}</td>
                    <td>{{ $file->nombre }}</td>
                    <td>{{ $file->ubicacion }}</td>
                    <td>{{ $file->caracteristicas }}</td>
                    <td>
                        <a href="{{ route('Archivador.update.vista', $file->id) }}"
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
                $('#files').DataTable();
            });
        </script>
    @endsection
</div>
@endsection
