<center>
    <a data-toggle="modal" data-target="#modal-show-{{$id}}" title="Ver"><i class="fa fa-eye btn btn-primary btn-xs"></i></a>
    <a data-toggle="modal" data-target="#modal-delete-{{$id}}" title="Eliminar"><i class="fa fa-trash btn btn-danger btn-xs"></i></a>
</center>

{{-- modal show --}}
<div class="modal fade" id="modal-show-{{$id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            {{-- <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h4><b>{{$id}}</b></h4>
            </div> --}}
            <div class="modal-body">

                <div class="row">
                    <div class="col-md-12">
                        <div align="center">
                            @if ($mime != 'image')
                                {{-- <img src="{{asset("images/logos/document.png")}}" height="40px" width="30px" /> --}}
                            @else
                                <img src="{{asset('files/biblioteca/'.$ruta)}}" height="200px" width="300px" alt="imagenes">
                            @endif
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <table class="table table-striped table-bordered">
                            <tr>
                                <td><b>Nombre: &nbsp;</b></td>
                                <td>{{$nombre}}</td>
                            </tr>
                            <tr>
                                <td><b>Url: &nbsp;</b></td>
                                <td>{{asset("files/biblioteca/".$ruta)}}</td>
                            </tr>
                            <tr>
                                <td><b>Tipo</b></td>
                                <td>{{$mime}}</td>
                            </tr>
                            <tr>
                                <td><b>Tamaño</b></td>
                                <td>{{$size}}&nbsp;KB</td>
                            </tr>
                            <tr>
                                <td><b>Subida</b></td>
                                <td>{{$created_at}}</td>
                            </tr>
                        </table>
                    </div>
                </div>
                {{-- <hr> --}}
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" data-dismiss="modal">Cerrar</a>
            </div>
        </div>
    </div>
</div>

{{-- modal eliminar --}}
<div class="modal fade" id="modal-delete-{{$id}}">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">
                    <span>&times;</span>
                </button>
                <h4>Eliminar</h4>
            </div>
            <div class="modal-body">
                <p>
                    ¿Esta seguro que desea eliminar el archivo:<b> {{$nombre}} </b>
                </p>
            </div>
            <div class="modal-footer">
                {{-- <button type="submit" class="btn btn-danger">Eliminar</button> --}}
                <a href="{{ asset('/archivos/eliminar/'.$id) }}" class="btn btn-danger">Eliminar</a>
                <a class="btn btn-primary" data-dismiss="modal">Cerrar</a>
            </div>
        </div>
    </div>
</div>
