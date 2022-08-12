@extends('adminlte::page')
@section('title', 'Entregas')

@section('content_header')
    <div class="card" style="height:4em;">
        <div class="card-header">
            <h2>Entregas</h2>
        </div>

    </div>

@endsection

@section('content')

    @foreach (['danger', 'warning', 'success', 'info'] as $msg)
        @if (Session::has('alert-' . $msg))
            <div class="alert {{ 'alert-' . $msg }} alert-dismissable">
                <button type="button" class="close" data-dismiss="alert">&times;</button>
                {{ Session::get('alert-' . $msg) }}
            </div>
        @endif
    @endforeach
    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Seleccione fechas para filtrar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="GET" action="{{ route('ventas.fecha', ['filtro' => 3]) }}">
                        @csrf

                        <div class="form-group">
                            <label for="exampleInputPassword1">Fecha Inicial</label>
                            <input type="date" class="form-control" name="fecha_inicial" placeholder="Fecha inicial">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Fecha Final</label>
                            <input type="date" class="form-control" name="fecha_final" placeholder="Fecha final">
                        </div>

                        <button type="submit" class="btn btn-primary">Filtrar</button>

                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                </div>
            </div>
        </div>
    </div>
    {{-- ---------- --}}
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <a href="{{ route('ventas.create.vista') }}" class="btn btn-success mb-2"><i
                        class="fas fa-clipboard-check"></i> Entregar</a>
                <br>
            </div>

            <br>
            </form>


        </div>
        <br>
        <table class="table table-striped table-res">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Responsable</th>
                    <th scope="col">producto</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cargo</th>
                    <th scope="col">Fecha entrega</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Servicio</th>
                    <th scope="col">Devolucion</th>

                    {{-- <th scope="col">Acción</th> --}}

                </tr>
            </thead>
            <tbody>
                @foreach ($ventas as $venta)
                    @if ($venta->unidades != 0)
                        <tr>
                            <th scope="row">{{ $venta->id }}</th>
                            <td>
                                @foreach ($user as $us)
                                    @if ($us->id == $venta->cliente)
                                        {{ $us->name }}
                                    @endif
                                @endforeach
                            </td>
                            <td>{{ $venta->serial }}</td>
                            <td>{{ $venta->nombre }}</td>
                            <td>{{ $venta->cargorecibe }}</td>
                            <td>{{ $venta->Fecha }}</td>
                            <td>{{ $venta->unidades }} </td>
                            <td>
                                <span class="center badge badge-pill badge-success">
                                    {{ $venta->devolucion }} en
                                    @foreach ($ubicacion as $ubi)
                                        @if ($ubi->id == $venta->ubicacion)
                                            {{ $ubi->nombre }}
                                        @endif
                                    @endforeach
                                </span>

                            </td>
                            <td>
                                @foreach ($compras as $compra)
                                    @if ($venta->serial == $compra->serial)
                                        <a href="{{ route('compras.updateProducto.vista', [$compra->id, $venta->id]) }}"
                                            class="btn btn-primary mb-2"><i class="fas fa-edit"></i>
                                        </a>
                                    @endif
                                @endforeach

                            </td>



                        </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        {{ $ventas->links() }}

    </div>
@endsection
