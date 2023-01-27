<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- SEO Meta Tags -->
    <meta name="description"
        content="Este repositorio fue creado para la seccion de calidad del hospital departamental de villavicencio con el fin de tener control y evitar perdida de documentación.">
    <meta name="author" content="Inovatik">

    <!-- OG Meta Tags to improve the way the post looks when you share the page on LinkedIn, Facebook, Google+ -->
    <meta property="og:site_name" content="Hospital departamental de villavicencio" /> <!-- website name -->
    <meta property="og:site" content="www.hdv.gov.co" /> <!-- website link -->
    <meta property="og:title" content="calidad hdv" /> <!-- title shown in the actual shared post -->
    <meta property="og:description" content=" centro de repositorios del hospital departamental de villavicencio" />
    <!-- description shown in the actual shared post -->
    <meta property="og:image" content="https://www.hdv.gov.co/images/logos/logoHDV1.png" />
    <!-- image link, make sure it's jpg -->
    <meta property="og:url" content="" /> <!-- where do you want your post to link to -->
    <meta property="og:type" content="article" />
    <link rel="shortcut icon" href="http://localhost/inventario_hdv_lavanderia/public/favicons/favicon.ico">

    <!-- Website Title -->
    <title>Repositorio de calidad - HDV</title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,400i,600,700,700i&display=swap" rel="stylesheet">
    <link href="css/bootstrap.css" rel="stylesheet">
    <link href="css/fontawesome-all.css" rel="stylesheet">
    <link href="css/swiper.css" rel="stylesheet">
    <link href="css/magnific-popup.css" rel="stylesheet">
    <link href="css/styles2.css" rel="stylesheet">

    {{-- style data-tables --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap4.min.css" />

    {{-- <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css" /> --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/searchpanes/2.0.2/css/searchPanes.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.4.0/css/select.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.2.3/css/buttons.dataTables.min.css">










    <!-- Favicon  -->
    <link rel="icon" href="images/favicon.png">
    <style>
        .imagen-b {
            width: 258px !important;
            height: 46px !important;
        }

        div.dataTables_wrapper div.dataTables_filter input {
            margin-left: 0.5em;
            display: inline-block;
            width: 300px;
            align-content: center;
        }

        /* .dataTables_filter {
            text-align: center !important;
        } */

        .bajardoc {
            display: flex;
            width: 100%;
            padding-bottom: 30px;
            margin: 30px 0;
            border-bottom: 1px solid #E7E7E7;
        }

        .bajardoc img,
        .item_descarga img {
            width: 70px;
            height: auto;
            margin-right: 30px;
        }

        .descarga {
            text-decoration: none;
        }

        .form-1 {
            background-color: {{ $blog->cFondo1 }} !important;
        }

        .header {
            position: relative;
            padding-top: 8rem;
            padding-bottom: 35%;
            background: linear-gradient(to bottom right, rgb(0 145 255 / 0%), {{ $blog->cFondo2 }}), url('./images/header-background.jpg') center center no-repeat;
            background-size: cover;
            text-align: center;
        }

        h5 {
            color: {{ $blog->cTitulo }};
        }

        .header h1 {
            color: {{ $blog->cSubtitulo1 }} !important;
        }

        .header .p-large {
            margin-bottom: 1.75rem;
            color: {{ $blog->cSubtitulo2 }};
        }

        .btn-solid-lg {
            display: inline-block;
            padding: 1.375rem 2.625rem 1.375rem 2.625rem;
            border: 0.125rem solid {{ $blog->cBoton }};
            border-radius: 2rem;
            background-color: {{ $blog->cBoton }};
            color: #333;
            font: 600 0.875rem/0 "Montserrat", sans-serif;
            text-decoration: none;
            transition: all 0.2s;
        }
    </style>
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Preloader -->
    <div class="spinner-wrapper">
        <div class="spinner">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
    <!-- end of preloader -->


    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">

        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Corso</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image " href="https://www.hdv.gov.co"><img class="imagen-b"
                src="files/biblioteca/{{ $blog->logo }}" alt="alternative"></a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link"
                        href="http://backups/intranethdv/documentos/documentos-de-interes/gestion-documental/formatos-historia-clinica-contingencia/"
                        target="_blank">HISTORIA CLINICA (CONTINGENCIA)</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link"
                        href="http://backups/intranethdv/documentos/documentos-de-interes/servicio-farmaceutico/gases-medicinales/"
                        target="_blank">GASES MEDICINALES</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="#register">BUSCAR <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="{{ route('documentos.lista') }}">ADMINISTRAR <span
                            class="sr-only">(current)</span></a>
                </li>
            </ul>
            <span class="nav-item social-icons">
                <span class="fa-stack">
                    <a href="https://www.hdv.gov.co/" target="_blank">
                        <i class="fas fa-circle fa-stack-2x"></i>
                        <i class="fab fa-google fa-stack-1x"></i>
                    </a>
                </span>

            </span>
        </div>
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->


    <!-- Header -->
    <header id="header" class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-container">
                        {{-- <div class="countdown">
                            <span id="clock"></span>
                        </div> --}}
                        <h5>{{ $blog->titulo }}</h5>
                        <h1>{{ $blog->subtitulo1 }}</h1>
                        <p class="p-large">{{ $blog->subtitulo2 }}</p>
                        <a class="btn-solid-lg page-scroll" href="#register">{{ $blog->tBoton }}</a>
                        {{-- <a class="btn-outline-lg page-scroll" href="#instructor">DISCOVER</a> --}}
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->

        <!-- Image Slider -->
        <div class="outer-container">
            <div class="slider-container">
                <div class="swiper-container image-slider-1">
                    <div class="swiper-wrapper">

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <img class="img-fluid" src="files/biblioteca/{{ $blog->imagen1 }}" alt="alternative">
                        </div>
                        <!-- end of slide -->

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <img class="img-fluid" src="files/biblioteca/{{ $blog->imagen2 }}" alt="alternative">
                        </div>
                        <!-- end of slide -->

                        <!-- Slide -->
                        <div class="swiper-slide">
                            <img class="img-fluid" src="files/biblioteca/{{ $blog->imagen3 }}" alt="alternative">
                        </div>
                        <!-- end of slide -->

                    </div> <!-- end of swiper-wrapper -->

                    <!-- Add Arrows -->
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
                    <!-- end of add arrows -->

                </div> <!-- end of swiper-container -->
            </div> <!-- end of slider-container -->
        </div> <!-- end of outer-container -->
        <!-- end of image slider -->

    </header> <!-- end of header -->
    <!-- end of header -->

    <div id="register" class="form-1">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-container">
                        <h5 style="text-align: center; color: {{ $blog->cParrafo }};;font-weight: 500;">
                            {{ $blog->parrafo }}
                        </h5>
                        <h3
                            style="text-align: center; color:{{ $blog->cTitulo2 }};text-shadow: 0.1em 0.1em 0.2em black">
                            {{ $blog->fTitulo }}</h3>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <table id="documentos" style="font-size: 12px; background-color: white"
                    class="table table-striped table-bordered shadow-lg mt-4 display compact">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th style="width: 10%">TIPO PROCESO</th>
                            <th>PROCESO / SUBPROCESO</th>
                            <th>TIPO DE DOCUMENTO</th>
                            <th style="width: 8%">CÓDIGO</th>
                            <th>NOMBRE</th>
                            <th style="width: 5%">VERSION ACTUAL</th>
                            <th>ESTADO</th>
                            <th style="width: 10%">ACCION</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documentos as $documento)
                            @if ($documento->estado != 2)
                                <tr>
                                    <td>{{ $documento->nombre_id }}</td>
                                    <td>{{ $documento->documento }}</td>
                                    <td>{{ $documento->siglas }}</td>
                                    <td>{{ $documento->codigo }}</td>
                                    <td>{{ $documento->nombre }}</td>
                                    <td>{{ $documento->versionActual }}</td>
                                    <td>{{ $documento->status }}</td>
                                    <td>
                                        <a data-toggle="modal" data-target="#modal-show-{{ $documento->id }}"
                                            class="btn btn-warning btn-sm mb-2">
                                            <i class="fa fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endif
                            {{-- modal show --}}
                            <div class="modal fade" id="modal-show-{{ $documento->id }}" tabindex="-1"
                                role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLongTitle">Vista previa</h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <br>
                                            <div class="card" style="width: 100%;">
                                                <div class="card-header bg-primary text-white" align="center">
                                                    Datos del documento
                                                </div>
                                                <ul class="list-group list-group-flush">
                                                    <li class="list-group-item">Tipo de proceso:
                                                        <b>{{ $documento->nombre_id }}</b>
                                                    </li>
                                                    <li class="list-group-item">Proceso / Subproceso:
                                                        <b>{{ $documento->documento }}</b>
                                                    </li>
                                                    <li class="list-group-item">Tipo de documento:
                                                        <b>{{ $documento->siglas }}</b>
                                                    </li>
                                                    <li class="list-group-item">Código:
                                                        <b>{{ $documento->codigo }}</b>
                                                    </li>
                                                    <li class="list-group-item">Nombre:
                                                        <b>{{ $documento->nombre }}</b>
                                                    </li>
                                                    <li class="list-group-item">Versión actual:
                                                        <b>{{ $documento->versionActual }}</b>
                                                    </li>
                                                    <li class="list-group-item">Fecha de aprobación:
                                                        <b>{{ $documento->fechaAprobacion }}</b>
                                                    </li>
                                                    <li class="list-group-item">Estado de documento:
                                                        <b>{{ $documento->status }}</b>
                                                    </li>
                                                </ul>
                                            </div>
                                            @if ($documento->name != null)
                                                <div class="bajardoc">
                                                    <div class="col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-2">
                                                                <a href="{{ asset('files/biblioteca/' . $documento->ruta) }}"
                                                                    title="{{ $documento->nombre }} ({{ $documento->updated_at }})."
                                                                    target="blank">
                                                                    <img src="http://www.hdv.gov.co/files/biblioteca/2022-09-27_7271042.png"
                                                                        alt="{{ $documento->nombre }} ({{ $documento->updated_at }})."
                                                                        title="{{ $documento->nombre }} ({{ $documento->updated_at }})."
                                                                        width="100" height="100"
                                                                        class="mimethumb img-fluid">
                                                                </a>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <div class="row">
                                                                    <a href="{{ asset('files/biblioteca/' . $documento->ruta) }}"
                                                                        title="{{ $documento->nombre }}."
                                                                        target="blank">{{ $documento->nombre }}.</a>
                                                                </div>
                                                                <div class="row">
                                                                    <a class="descarga"
                                                                        href="{{ asset('documentos/download/' . $documento->id) }}">{{ $documento->size }}
                                                                        KB, Descargar</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h5 align="center"><b>Previsualización</b></h5>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div align="center">
                                                            @if ($documento->mime == 'image')
                                                                <img src="{{ asset('files/biblioteca/' . $documento->ruta) }}"
                                                                    height="200px" width="300px" alt="imagenes">
                                                            @endif
                                                            @if ($documento->extension == 'pdf')
                                                                <embed
                                                                    src="{{ asset('files/biblioteca/' . $documento->ruta) }}"
                                                                    type="application/pdf" width="100%"
                                                                    height="600px" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            @else
                                                <br><br>
                                                <h6> No sé a subido archivos para este documento </h6>
                                            @endif

                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary"
                                                data-dismiss="modal">Cerrar</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach


                    </tbody>
                </table>

            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of form-1 -->
    <!-- end of registration -->


    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <p class="p-small">Copyright © 2022 <a href="https://www.hdv.gov.co">HOSPITAL DEPARTAMENTAL DE
                            VILLAVICENCIO</a> - Todos los derechos reservados</p>
                </div> <!-- end of col -->
            </div> <!-- enf of row -->
        </div> <!-- end of container -->
    </div> <!-- end of copyright -->
    <!-- end of copyright -->


    <!-- Scripts -->
    <script src="js/jquery.min.js"></script> <!-- jQuery for Bootstrap's JavaScript plugins -->
    <script src="js/popper.min.js"></script> <!-- Popper tooltip library for Bootstrap -->
    <script src="js/bootstrap.min.js"></script> <!-- Bootstrap framework -->
    <script src="js/jquery.easing.min.js"></script> <!-- jQuery Easing for smooth scrolling between anchors -->
    <script src="js/jquery.countdown.min.js"></script> <!-- The Final Countdown plugin for jQuery -->
    <script src="js/swiper.min.js"></script> <!-- Swiper for image and text sliders -->
    <script src="js/jquery.magnific-popup.js"></script> <!-- Magnific Popup for lightboxes -->
    <script src="js/validator.min.js"></script> <!-- Validator.js - Bootstrap plugin that validates forms -->
    <script src="js/scripts.js"></script> <!-- Custom scripts -->
    {{-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/searchpanes/2.0.2/js/dataTables.searchPanes.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.4.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.print.min.js"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.3/js/buttons.html5.min.js"></script>











    <script>
        $(document).ready(function() {
            $('#documentos').DataTable({
                // dom:'Pfrtip',
                dom: 'PBfrtip',
                buttons: [
                    'copy', 'csv', 'excel', 'pdf', 'print'
                ],
                searchPanes: {
                    cascadePanes: true,
                    dtOpts: {
                        paging: 'true',
                        pagingType: 'numbers',
                        searching: false,
                    },
                },
                columnDefs: [{
                        searchPanes: {
                            show: false
                        },
                        targets: [3, 4, 5, 6, 7]
                    },
                    {
                        searchPanes: {
                            show: true
                        },
                        targets: [0, 1, 2]
                    },
                ],

                "language": {
                    searchPanes: {
                        title: {
                            _: 'Total de filtros selecionados - %d',
                            0: 'Selecione un opción para filtrar tu busqueda',
                            1: 'Se ha selecionado un filtro'
                        },
                        "clearMessage": "Borrar seleccionados",
                        "showMessage": "Mostrar Todo",
                        "collapseMessage": "Contraer Todo",
                        count: '{total}',
                        countFiltered: '{shown} ({total})',
                    },
                    "lengthMenu": "Mostrar _MENU_ registros por página",
                    "zeroRecords": "No se ha encontrado nada relacionado - Disculpa",
                    "info": "Mostrando la pagina _PAGE_ de _PAGES_",
                    "infoEmpty": "No records available",
                    "infoFiltered": "(Filtrado de _MAX_ registros totales)",
                    "search": "Buscar:",
                    "paginate": {
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "buttons": {
                        "copy": "Copiar",
                        "print": "Imprimir",
                    }
                }
            });
        });
    </script>


</body>

</html>
