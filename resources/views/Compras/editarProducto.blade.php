@extends('adminlte::page')
@section('title', 'Productos')

@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Devolucion de producto</h2>
        </div>

    </div>

@endsection

@section('content')



    <div class="container">

        @foreach (['danger', 'warning', 'success', 'info'] as $msg)
            @if (Session::has('alert-' . $msg))
                <div class="alert {{ 'alert-' . $msg }} alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    {{ Session::get('alert-' . $msg) }}
                </div>
            @endif
        @endforeach
        <div class="card">
            <div class="card-body">
                <form method="POST" action="{{ route('compras.updateProducto', [$compras->id, $ventas->id]) }}">
                    @csrf
                    <style>
                        .padding_center {
                            padding-left: 25%;
                        }

                        .texto_radio {
                            text-align: center;
                        }

                        @media (min-width: 400px) and (max-width: 767px) {
                            .padding_center {
                                padding-left: 0px;
                            }

                            .texto_radio {
                                text-align: left
                            }

                            .two-column {
                                width: 50%;
                                float: left;
                            }
                        }

                        @media (min-width: 768px) and (max-width: 1413px) {
                            .padding_center {
                                padding-left: 15%;
                            }

                            .texto_radio {
                                text-align: center;
                                height: 57px;
                            }

                        }

                    </style>

                    <div class="form-group">
                        <h3>Cantidad de {{ $compras->elemento }} {{ $compras->caracteristicas }}, con codigo {{ $compras->serial }} va a recibir</h3>
                        <br>
                        <div class="row">
                            <div class="col-sm-4">
                                <label for="">Unidades </label>
                                <input type="number" min="1" max="{{ $ventas->unidades }}" class="form-control" name="unidades" required>
                            </div>
                        </div>

                    </div>

                    <br>
                    <input class="btn btn-success" type="submit" value="Ingresar" />

                </form>



            </div>
        </div>

    </div>
@endsection

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
<script>
    $('.selectpicker').selectpicker({
        style: 'btn-default'
    });
</script>
