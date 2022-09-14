@extends('adminlte::page')
@section('title', 'Lista de archivos')

@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Documentos</h2>
        </div>

    </div>

@endsection

@section('content')

    <div class="container">
        @if ($errors->any())
            <ul>
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
                <form method="POST" action="{{ route('Files.create') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="exampleInputEmail1">Archivos </label>
                        <input type="file" class="form-control" name="file" multiple  required>
                    </div>

                    <button type="submit" class="btn btn-primary float-right">Agregar</button>
                    <a class="btn btn-danger float-left" href="{{ URL::previous() }}">Atras</a>

                </form>

            </div>
        </div>

    </div>
    {{-- @dd($errors) --}}
@endsection
