<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <link href="https://fonts.googleapis.com/css?family=Montserrat:100,200,300,400,500,600,700,800,900" rel="stylesheet" />
        <title>cementerios el alto</title>

        <!-- Bootstrap core CSS -->
        <link href="{{ asset('cementerios_el_alto/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="{{ asset('cementerios_el_alto/assets/css/fontawesome.css') }}" />
        <link rel="stylesheet" href="{{ asset('cementerios_el_alto/assets/css/templatemo-grad-school.css') }}" />
        <link rel="stylesheet" href="{{ asset('cementerios_el_alto/assets/css/owl.css') }}" />
        <link rel="stylesheet" href="{{ asset('cementerios_el_alto/assets/css/lightbox.css') }}" />

        <style>
            ul {
                display: flex;
                justify-content: center;
                list-style-type: none;
                padding: 0;
                margin: 0;
                flex-wrap: wrap; /* Permite que los elementos se ajusten a varias líneas si es necesario */
            }

            li {
                margin: 0 20px;
            }

            a {
                text-decoration: none;
                color: #0cdbf7; /* Ajusta el color según tu diseño */
            }

            /* Media Query para pantallas pequeñas */
            @media (max-width: 768px) {
                li {
                    margin: 0 10px; /* Reducir el margen en pantallas más pequeñas */
                }
            }

            /* Media Query para pantallas muy pequeñas, como teléfonos */
            @media (max-width: 480px) {
                ul {
                    flex-direction: column; /* Cambiar la dirección del flex a columna en pantallas muy pequeñas */
                    align-items: center; /* Alinear los elementos al centro */
                }

                li {
                    margin: 10px 0; /* Ajustar el margen para una disposición en columna */
                }
            }
        </style>
    </head>

    <body>
        <!--header-->
        <header class="main-header clearfix" role="header">
            <div class="logo">
                <a href="#"><em>Cementerios el</em> Alto</a>
            </div>
            <a href="#menu" class="menu-link"><i class="fa fa-bars"></i></a>
            <nav id="menu" class="main-nav" role="navigation">
                <ul class="main-menu">
                    <li><a href="#section1">inicio</a></li>

                    <li class="has-submenu">
                        <a href="#">mercenario</a>
                        <ul class="sub-menu">
                            <li><a href="#section2">inhumacion</a></li>
                            <li><a href="#section2">construc.nicho</a></li>
                            <li><a href="#section2">renovaciones</a></li>
                            <li><a href="#section2">exhumacion</a></li>
                            <li><a class="nav-link" href="{{ url('/admin') }}">Administración</a></li>
                            <li><a class="nav-link" href="{{ url('/consulta') }}">Consulta</a></li>
                            <li><a href="https://www.google.com/maps/place/Cementerio+Mercedario/@-16.5298293,-68.2503607,17z/data=!4m6!3m5!1s0x915edc2d3d9f4cb5:0xb83b68d5098a2ff8!8m2!3d-16.5305236!4d-68.2499852!16s%2Fg%2F11c574wwpk?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D" rel="sponsored" class="external">Ubicación</a></li>
                        </ul>
                    </li>

                    <li class="has-submenu">
                        <a href="">tarapaca</a>
                        <ul class="sub-menu">
                            <li><a href="#section2">inhumacion</a></li>
                            <li><a href="#section2">construc.nicho</a></li>
                            <li><a href="#section2">renovaciones</a></li>
                            <li><a href="#section2">exhumacion</a></li>
                            <li><a class="nav-link" href="{{ url('/tarapaca') }}">Administración</a></li>
                            <li><a class="nav-link" href="{{ url('/consulta') }}">Consulta</a></li>
                            <li>
                                <a
                                    href="https://www.google.com/maps/place/Cementerio+Tarapac%C3%A1/@-16.5261561,-68.1675157,17.5z/data=!4m10!1m2!2m1!1sCementerio+ingavi!3m6!1s0x915edf731e125ec3:0x1b5174611ed83bbc!8m2!3d-16.525244!4d-68.1651798!15sChFDZW1lbnRlcmlvIGluZ2F2aZIBCGNlbWV0ZXJ54AEA!16s%2Fg%2F1tkc357q?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                                    rel="sponsored"
                                    class="external"
                                    >Ubicación</a
                                >
                            </li>
                        </ul>
                    </li>
                    <li class="has-submenu">
                        <a href="">Villa Ingenio</a>
                        <ul class="sub-menu">
                            <li><a href="#section2">inhumacion</a></li>
                            <li><a href="#section2">construc.nicho</a></li>
                            <li><a href="#section2">renovaciones</a></li>
                            <li><a href="#section2">exhumacion</a></li>
                            <li>
                                <a class="nav-link" href="/admin"
                                    >Administración</a
                                >
                            </li>
                            <li>
                                <a class="nav-link" href="/consulta"
                                    >Consulta</a
                                >
                            </li>
                            <li>
                                <a
                                    href="https://www.google.com/maps/place/Cementerio+Villa+Ingenio/@-16.4489812,-68.2135997,17z/data=!3m1!4b1!4m6!3m5!1s0x915ee0e97ac73c9f:0x30c5e6ab82ce128d!8m2!3d-16.4489864!4d-68.2110248!16s%2Fg%2F11dxbn1pw8?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                                    rel="sponsored"
                                    class="external"
                                    >Ubicación</a
                                >
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </header>

        <!-- ***** Main Banner Area Start ***** -->
        <section class="section main-banner" id="top" data-section="section1">
            <video autoplay muted loop id="bg-video">
                <source src="{{ asset('cementerios_el_alto/assets/images/course-video.mp4') }}" type="video/mp4" />
            </video>

            <div class="video-overlay header-text">
                <div class="caption"></div>
            </div>
        </section>
        <!-- ***** Main Banner Area End ***** -->

        <section class="features">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-12">
                        <div class="features-post">
                            <div class="features-content">
                                <div class="content-show">
                                    <h4>
                                        <i class="fa fa-book"></i>mercenario
                                    </h4>
                                </div>
                                <div class="content-hide">
                                    <p>
                                        CEMENTERO “MERCEDARIO” Se encuentra
                                        ubicada en el Distrito 3 de la ciudad de
                                        El Alto, en la zona de mercedario, a
                                        unos 45 minutos de la Ceja tomando el
                                        microbús 513. Antiguamente el terreno
                                        era de propiedad de la familia Alcoreza
                                        ahora de propiedad de la Alcaldía de El
                                        Alto. Funciona legalmente desde 1992,
                                        pero funcionaba en forma ilegal desde al
                                        menos 1980 según las fechas encontradas
                                        en algunos de los mausoleos más
                                        antiguos.
                                    </p>
                                    <p class="hidden-sm"></p>
                                    <div class="scroll-to-section">
                                        <a href="#section2">información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="features-post second-features">
                            <div class="features-content">
                                <div class="content-show">
                                    <h4>
                                        <i class="fa fa-book"></i>TARAPACÁ
                                        HÉROES DEL GAS SUR
                                    </h4>
                                </div>
                                <div class="content-hide">
                                    <p>
                                        CEMENTERO TARAPACÁ O HÉROES DEL GAS SUR
                                        El cementerio fue creado aproximadamente
                                        en 1969 hace 41 años y está ubicado en
                                        el Distrito 2 de la ciudad de El Alto a
                                        unos 6 km. de la Ceja, carretera a
                                        Oruro, altura del Regimiento Ingavi.
                                        Inicialmente se lo conoció como
                                        cementerio Cupi Lupaca, luego Cementerio
                                        General de El Alto, posteriormente
                                        Santiago I o Cementerio Tarapacá y
                                        actualmente es conocido como el
                                        “Cementerio Héroes del Gas Sur”.
                                    </p>
                                    <p class="hidden-sm"></p>
                                    <div class="scroll-to-section">
                                        <a href="#section2">información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-12">
                        <div class="features-post third-features">
                            <div class="features-content">
                                <div class="content-show">
                                    <h4>
                                        <i class="fa fa-book"></i>VILLA INGENIO
                                        HÉROES DE GAS NORTE”
                                    </h4>
                                </div>
                                <div class="content-hide">
                                    <p>
                                        “CEMENTERIO DE LOS HÉROES DE GAS NORTE”.
                                        Este cementerio fue creado
                                        aproximadamente en julio del año 1983 y
                                        esta ubicado al extremo norte del
                                        Distrito 7 de la ciudad de El Alto al
                                        lado del Relleno Sanitario (botadero de
                                        basura). Es un cementerio municipal
                                        ubicado en un terrero urbano alejado de
                                        las viviendas de villa Ingenio
                                    </p>
                                    <p class="hidden-sm"></p>
                                    <div class="scroll-to-section">
                                        <a href="#section2">información</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section why-us" data-section="section2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-heading">
                            <h2>Gestion Cementerios</h2>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div id="tabs">
                            <ul>
                                <li><a href="#tabs-1">Requisitos Inhumación</a></li>
                                <li><a href="#tabs-2">Construc. Nicho</a></li>
                                <li><a href="#tabs-3">Requisitos Renovación</a></li>
                                <li><a href="#tabs-4">Requisitos Exhumación</a></li>
                            </ul>

                            <section class="tabs-content">
                                <article id="tabs-1">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="{{ asset('cementerios_el_alto/assets/images/inhumacion.png') }}" alt="" />
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Inhumacion</h4>
                                            <p>
                                                *CERTIFICADO DE DEFUNCIÓN
                                                OTORGADO POR EL REGISTRO CIVIL
                                                *FOTOCOPIA VERIFICADA DEL
                                                CERTIFICAO MEDICO DE DEFUNCIÓN
                                                *FOTOCOPIA SIMPLE DE CEDULA DE
                                                IDENTIDAD DEL FALLECIDO
                                                *VERIFICADA FOTOCOPIA SIMPLE DE
                                                CEDULA DE IDENTIDAD DE *FAMILIAR
                                                O CONTRIBUYENTE VERIFICADO
                                                FOTOCOPIA SIMPLE DE CEDULA DE
                                                IDENTIDAD (TESTIGOS)
                                                VERIFICADA.<br />
                                                *PAGO EN EFECTIVO DE BS.<br />
                                                >CEMENTERIO HÉROES DEL GAS SUR (TARAPACÁ):156,00.<a
                                                    href="https://www.google.com/maps/place/Cementerio+Tarapac%C3%A1/@-16.5261561,-68.1675157,17z/data=!4m10!1m2!2m1!1sCementerio+ingavi!3m6!1s0x915edf731e125ec3:0x1b5174611ed83bbc!8m2!3d-16.525244!4d-68.1651798!15sChFDZW1lbnRlcmlvIGluZ2F2aZIBCGNlbWV0ZXJ54AEA!16s%2Fg%2F1tkc357q?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                                                    target="_parent"
                                                    rel="sponsored"
                                                >
                                                    Ubicación</a
                                                ><br />
                                                >CEMENTERIO MERCEDARIO:
                                                101,00.<a
                                                    href="https://www.google.com/maps/place/Cementerio+Mercedario/@-16.5298293,-68.2503607,17z/data=!4m6!3m5!1s0x915edc2d3d9f4cb5:0xb83b68d5098a2ff8!8m2!3d-16.5305236!4d-68.2499852!16s%2Fg%2F11c574wwpk?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                                                    target="_parent"
                                                    rel="sponsored"
                                                >
                                                    Ubicación</a
                                                ><br />
                                                >CEMENTERIO HÉROES DE GAS NORTE(VILLA INGENIO):
                                                101,00.

                                                <a
                                                    href="https://www.google.com/maps/place/Cementerio+Villa+Ingenio/@-16.4489864,-68.2110248,17z/data=!3m1!4b1!4m6!3m5!1s0x915ee0e97ac73c9f:0x30c5e6ab82ce128d!8m2!3d-16.4489864!4d-68.2110248!16s%2Fg%2F11dxbn1pw8?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                                                    target="_parent"
                                                    rel="sponsored"
                                                >
                                                    Ubicación</a
                                                >
                                            </p>
                                        </div>
                                    </div>
                                </article>

                                <article id="tabs-2">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="{{ asset('cementerios_el_alto/assets/images/contruccion.jpeg') }}" alt="" />
                                        </div>
                                        <div class="col-md-6">
                                            <h4>
                                                Autorización de Contruccion de
                                                Nicho
                                            </h4>
                                            <p>
                                                *COMPROBANTE DE ENTIERRO O
                                                CERTIFICADO DE DEFUNCIÓN
                                                *FOTOCOPIA DE LA CEDULA DE
                                                IDENTIDAD DEL USUARIO
                                                (CONTRIBUYENTE)<br />
                                                *PAGO EN EFECTIVO DE BS.<br />
                                                >CEMENTERIO HÉROES DEL GAS SUR (TARAPACÁ): 180,00
                                                <a
                                                href="https://www.google.com/maps/place/Cementerio+Tarapac%C3%A1/@-16.5261561,-68.1675157,17z/data=!4m10!1m2!2m1!1sCementerio+ingavi!3m6!1s0x915edf731e125ec3:0x1b5174611ed83bbc!8m2!3d-16.525244!4d-68.1651798!15sChFDZW1lbnRlcmlvIGluZ2F2aZIBCGNlbWV0ZXJ54AEA!16s%2Fg%2F1tkc357q?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                                                target="_parent"
                                                rel="sponsored"
                                                >
                                                    Ubicación</a
                                                ><br />
                                                >CEMENTERIO MERCEDARIO: 135,00<a
                                                href="https://www.google.com/maps/place/Cementerio+Mercedario/@-16.5298293,-68.2503607,17z/data=!4m6!3m5!1s0x915edc2d3d9f4cb5:0xb83b68d5098a2ff8!8m2!3d-16.5305236!4d-68.2499852!16s%2Fg%2F11c574wwpk?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                                                target="_parent"
                                                rel="sponsored"
                                                >
                                                    Ubicación</a
                                                ><br />
                                                >CEMENTERIO HÉROES DE GAS NORTE(VILLA INGENIO):
                                                135,00
                                                <a
                                                href="https://www.google.com/maps/place/Cementerio+Villa+Ingenio/@-16.4489864,-68.2110248,17z/data=!3m1!4b1!4m6!3m5!1s0x915ee0e97ac73c9f:0x30c5e6ab82ce128d!8m2!3d-16.4489864!4d-68.2110248!16s%2Fg%2F11dxbn1pw8?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                                                target="_parent"
                                                rel="sponsored"
                                                >
                                                    Ubicación</a
                                                >
                                            </p>
                                        </div>
                                    </div>
                                </article>

                                <article id="tabs-3">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="{{ asset('cementerios_el_alto/assets/images/tarapaca.jpeg') }}" alt="" />
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Renovación</h4>
                                            <p>
                                                * FOTOCOPIA DE CERTIFICADO DE
                                                DEFUNCIÓN <br />
                                                *PAGO EN EFECTIVO DE BS.<br />
                                                >CEMENTERIO HÉROES DEL GAS SUR (TARAPACÁ): 180,00
                                                <a
                                                href="https://www.google.com/maps/place/Cementerio+Tarapac%C3%A1/@-16.5261561,-68.1675157,17z/data=!4m10!1m2!2m1!1sCementerio+ingavi!3m6!1s0x915edf731e125ec3:0x1b5174611ed83bbc!8m2!3d-16.525244!4d-68.1651798!15sChFDZW1lbnRlcmlvIGluZ2F2aZIBCGNlbWV0ZXJ54AEA!16s%2Fg%2F1tkc357q?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                                                target="_parent"
                                                rel="sponsored"
                                                >
                                                    Ubicación</a
                                                ><br />
                                                >CEMENTERIO MERCEDARIO: 135,00<a
                                                href="https://www.google.com/maps/place/Cementerio+Mercedario/@-16.5298293,-68.2503607,17z/data=!4m6!3m5!1s0x915edc2d3d9f4cb5:0xb83b68d5098a2ff8!8m2!3d-16.5305236!4d-68.2499852!16s%2Fg%2F11c574wwpk?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                                                target="_parent"
                                                rel="sponsored"
                                                >
                                                    Ubicación</a
                                                ><br />
                                                CEMENTERIO HÉROES DE GAS NORTE(VILLA INGENIO):
                                                135,00
                                                <a
                                                href="https://www.google.com/maps/place/Cementerio+Villa+Ingenio/@-16.4489864,-68.2110248,17z/data=!3m1!4b1!4m6!3m5!1s0x915ee0e97ac73c9f:0x30c5e6ab82ce128d!8m2!3d-16.4489864!4d-68.2110248!16s%2Fg%2F11dxbn1pw8?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                                                target="_parent"
                                                rel="sponsored"
                                                >
                                                    Ubicación</a
                                                >
                                            </p>
                                        </div>
                                    </div>
                                </article>

                                <article id="tabs-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <img src="{{ asset('cementerios_el_alto/assets/images/exhumacion.png') }}" alt="" />
                                        </div>
                                        <div class="col-md-6">
                                            <h4>Exhumación</h4>
                                            <p>
                                                *NOTA DE AUTORIZACIÓN EMITIDA
                                                POR LA AUTORIDAD DEL LUGAR Y/O
                                                COMUNIDAD DE DONDE SE VA A
                                                TRASLADAR LOS RESTOS OSEOS,
                                                ESPECIFICANDO EL NOMBRE DEL
                                                CEMENTERIO <br />
                                                *FOTOCOPIA DE CERTIFICADO DE
                                                DEFUNCION<br />
                                                *FOTOCOPIA DE CEDULA DE
                                                IDENTIDAD DEL SOLICITANTE
                                                *FOTOCOPIA DE CEDULA DE
                                                IDENTIDAD DE FAMILIARES DE
                                                PRIMER GRADO (con firma de
                                                autorización) ULTIMO COMPROBANTE
                                                DE PAGO <br />
                                                *NOTA DE AUTORIZACIÓN EMITIDA
                                                POR LA AUTORIDAD DEL LUGAR Y/O
                                                COMUNIDAD DE DONDE SE VA A
                                                TRASLADAR LOS RESTOS OSEOS,
                                                ESPECIFICANDO EL NOMBRE DEL
                                                CEMENTERIO

                                                <br />
                                                *PAGO EN EFECTIVO DE BS.<br />
                                                >CEMENTERIO HÉROES DEL GAS SUR (TARAPACÁ): 224,00
                                                <a
                                                href="https://www.google.com/maps/place/Cementerio+Tarapac%C3%A1/@-16.5261561,-68.1675157,17z/data=!4m10!1m2!2m1!1sCementerio+ingavi!3m6!1s0x915edf731e125ec3:0x1b5174611ed83bbc!8m2!3d-16.525244!4d-68.1651798!15sChFDZW1lbnRlcmlvIGluZ2F2aZIBCGNlbWV0ZXJ54AEA!16s%2Fg%2F1tkc357q?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                                                target="_parent"
                                                rel="sponsored"
                                                >
                                                    Ubicación</a
                                                ><br />
                                                >CEMENTERIO MERCEDARIO: 224,00<a
                                                href="https://www.google.com/maps/place/Cementerio+Mercedario/@-16.5298293,-68.2503607,17z/data=!4m6!3m5!1s0x915edc2d3d9f4cb5:0xb83b68d5098a2ff8!8m2!3d-16.5305236!4d-68.2499852!16s%2Fg%2F11c574wwpk?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                                                target="_parent"
                                                rel="sponsored"
                                                >
                                                    Ubicación</a
                                                ><br />
                                                >CEMENTERIO HÉROES DE GAS NORTE(VILLA INGENIO):
                                                224,00
                                                <a
                                                href="https://www.google.com/maps/place/Cementerio+Villa+Ingenio/@-16.4489864,-68.2110248,17z/data=!3m1!4b1!4m6!3m5!1s0x915ee0e97ac73c9f:0x30c5e6ab82ce128d!8m2!3d-16.4489864!4d-68.2110248!16s%2Fg%2F11dxbn1pw8?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                                                target="_parent"
                                                rel="sponsored"
                                                >
                                                    Ubicación</a
                                                >
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-md-12"></div>
                </div>
            </div>
        </footer>


 <!-- Scripts -->
<script src="{{ asset('cementerios_el_alto/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('cementerios_el_alto/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('cementerios_el_alto/assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('cementerios_el_alto/assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('cementerios_el_alto/assets/js/lightbox.js') }}"></script>
<script src="{{ asset('cementerios_el_alto/assets/js/tabs.js') }}"></script>
<script src="{{ asset('cementerios_el_alto/assets/js/video.js') }}"></script>
<script src="{{ asset('cementerios_el_alto/assets/js/slick-slider.js') }}"></script>
<script src="{{ asset('cementerios_el_alto/assets/js/custom.js') }}"></script>


<script>
    $(".nav li:first").addClass("active");

    var showSection = function(section, isAnimate) {
        var direction = section.replace(/#/, ""), // Asegurarse de eliminar solo el '#'
            reqSection = $(".section").filter('[data-section="' + direction + '"]');

        if (reqSection.length > 0) {
            var reqSectionPos = reqSection.offset().top;

            if (isAnimate) {
                $("body, html").animate({ scrollTop: reqSectionPos }, 800);
            } else {
                $("body, html").scrollTop(reqSectionPos);
            }
        } else {
            console.warn('Sección no encontrada: ' + direction);
        }
    };

    var checkSection = function() {
        $(".section").each(function() {
            var $this = $(this),
                topEdge = $this.offset().top - 80,
                bottomEdge = topEdge + $this.height(),
                wScroll = $(window).scrollTop();

            if (topEdge < wScroll && bottomEdge > wScroll) {
                var currentId = $this.data("section"),
                    reqLink = $("a[href='#" + currentId + "']");

                reqLink.closest("li").addClass("active").siblings().removeClass("active");
            }
        });
    };

    $(".main-menu, .scroll-to-section").on("click", "a", function(e) {
        if ($(e.target).hasClass("external") || $(this).attr("href").startsWith('http')) {
            // Ignorar enlaces externos
            return;
        }
        e.preventDefault();
        $("#menu").removeClass("active");
        showSection($(this).attr("href"), true);
    });

    $(window).scroll(function() {
        checkSection();
    });
</script>


</body>
</html>
