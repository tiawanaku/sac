<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion Cementerios</title>
    <link rel="icon" href="images/logo.png">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Merienda' rel='stylesheet'>
    <link href="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.css" rel="stylesheet">
</head>

<body data-spy="scroll" data-target=".navbar" data-offset="50">

    <style>
        .navbar-red {
            background-color: #FF0000;
            /* Fondo rojo */
        }

        .navbar-red .navbar-brand {
            color: #FFFFFF !important;
            /* Letras en blanco */
            font-weight: bold;
            /* Negrita */
            text-transform: uppercase;
            /* Texto en mayúsculas */
            letter-spacing: 1px;
            /* Espaciado entre letras */
            display: flex;
            align-items: center;
        }

        .navbar-red .navbar-brand img {
            margin-right: 10px;
            /* Espacio entre el logo y el texto */
            filter: brightness(0) invert(1);
            /* Logo en blanco si es necesario */
        }

        .navbar-red .navbar-title {
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            text-align: center;
            color: #FFFFFF !important;
            font-weight: bold;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 1.75rem;
            /* Tamaño de fuente aumentado */
        }

        .navbar-red .nav-link {
            color: #FFFFFF !important;
        }

        .navbar-red .nav-link:hover {
            color: #FFD700 !important;
            /* Color dorado al pasar el ratón */
        }

        .navbar-red .navbar-toggler {
            margin-left: auto;
        }
    </style>

    <!-- Start Navigation Bar -->
    <nav class="navbar navbar-expand-lg navbar-light navbar-red fixed-top">
        <a class="navbar-brand" href="#Welcome">
            <img src="images/logo2.png" width="150" height="40" class="d-inline-block" alt="">
        </a>
        <div class="navbar-title">Cementerios El Alto</div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText"
            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="/admin">Administración</a>
                    <a class="nav-link" href="/consulta">Consulta</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- End Navigation Bar -->





    <!-- Start Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide mt-5" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="4"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="5"></li>
        </ol>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img class="d-block w-100 img-fluid img-slider" src="images/slider1.jpg" alt="First slide">
                <div class="carousel-caption">
                    <h2></h2>
                    <p>...</p>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100 img-fluid img-slider" src="images/slider2.jpg" alt="Second slide">
                <div class="carousel-caption">
                    <h2></h2>
                    <p>...</p>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100 img-fluid img-slider" src="images/slider3.jpg" alt="Third slide">
                <div class="carousel-caption">
                    <h2></h2>
                    <p>...</p>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100 img-fluid img-slider" src="images/slider4.jpeg" alt="Fourth slide">
                <div class="carousel-caption">
                    <h2></h2>
                    <p>...</p>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100 img-fluid img-slider" src="images/slider5.jpeg" alt="Fifth slide">
                <div class="carousel-caption">
                    <h2></h2>
                    <p>...</p>
                </div>
            </div>

            <div class="carousel-item">
                <img class="d-block w-100 img-fluid img-slider" src="images/slider6.jpeg" alt="Sixth slide">
                <div class="carousel-caption">
                    <h2></h2>
                    <p>...</p>
                </div>
            </div>
        </div>

        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!-- End Carousel -->

    <div class="container mt-5">
        <h1>Bienvenido a la Aplicación</h1>
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalIndex">
            Consultar
        </button>

        <!-- Modal -->
        <div class="modal fade" id="modalIndex" tabindex="-1" role="dialog" aria-labelledby="modalIndexLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalIndexLabel">Consulta</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- Contenido del modal cargado mediante AJAX -->
                        <div id="modalContent">
                            <!-- Aquí se cargará el contenido de index.blade.php -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start of Content Sections -->
    <div class="container">
        <div class="row" id="Restaurant">
            <div class="col navMenu">
                <h2 class="content-title"><i class="fas fa-church icon"></i>Cementerio Mercedario</h2>
            </div>
        </div>
        <div class="row bg-light">
            <div class="col-md-6">
                <h3 class="section-title"><i class="fas fa-map-marker-alt icon"></i>Zona Mercedario</h3>
                <p class="section-text">Recientemente remodelado, el cementerio mercedario brinda seguridad y comodidad
                    a todos los
                    visitantes.</p>
                <h5 class="section-title"><i class="fas fa-tools icon"></i>Trabajando Constantemente</h5>
                <p class="section-text">En constante crecimiento, estamos en continuo trabajo de refacción y remodelado.
                </p>
            </div>
            <div class="col-md-6" data-aos="fade-up">
                <img class="img-fluid" src="images/slider1.jpg" alt="Imagen Cementerio Mercedario">
            </div>
        </div>
        <div class="row bg-light">
            <div class="col-md-6 order-md-1 order-2" data-aos="fade-up">
                <img class="img-fluid" src="images/slider2.jpg" alt="Imagen Cementerio Tarapaca">
            </div>
            <div class="col-md-6 order-md-12 order-1">
                <h3 class="section-title"><i class="fas fa-city icon"></i>Cementerio Tarapaca</h3>
                <p class="section-text">Ubicado en el corazón de El Alto, brindando servicio desde 1980.</p>
                <h5 class="section-title"><i class="fas fa-map-pin icon"></i>Ubicación</h5>
                <p class="section-text">En pleno centro alteño, brinda constante servicio.</p>
            </div>
        </div>





        <!-- Services Section -->
        <div class="row" id="Menu">
            <div class="col navMenu">
                <h2 class="content-title"><i class="fas fa-concierge-bell icon"></i> Servicios</h2>
            </div>
        </div>
        <div class="row bg-light">
            <div class="col-md-3" data-aos="slide-up">
                <div class="card view zoom">
                    <img class="card-img-top img-fluid" src="images/inhumacion.jpg" alt="Servicio de Inhumación">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-cross icon"></i> Inhumación</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Certificado de defunción otorgado por el registro civil</li>
                            <li class="list-group-item">Fotocopia legalizada del médico de defunción</li>
                            <li class="list-group-item">Fotocopia simple de cédula de identidad del fallecido legalizada
                            </li>
                            <li class="list-group-item">Fotocopia simple de cédula de identidad de familiar o
                                contribuyente legalizada</li>
                            <li class="list-group-item">Fotocopia simple de cédula de identidad (testigos) legalizada
                            </li>
                            <li class="list-group-item">Pago en efectivo de BS 101</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="slide-up">
                <div class="card">
                    <img class="card-img-top img-fluid" src="images/renovacion.jpg" alt="Servicio de Renovación">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-redo icon"></i> Renovación</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Fotocopia de certificado de defunción</li>
                            <li class="list-group-item">Pago en efectivo de BS 135</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="slide-up">
                <div class="card">
                    <img class="card-img-top img-fluid" src="images/servicio2.jpg" alt="Servicio de Exhumación">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-skeleton icon"></i> Exhumación</h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Fotocopia de certificado de defunción</li>
                            <li class="list-group-item">Fotocopia de cédula de identidad</li>
                            <li class="list-group-item">Fotocopia de cédula de identidad del familiar de primer grado
                                (con firma de autorización)</li>
                            <li class="list-group-item">Último comprobante de pago</li>
                            <li class="list-group-item">Nota de autorización emitida por la autoridad del lugar y/o
                                comunidad de donde se va a trasladar los restos óseos, especificando el nombre del
                                cementerio</li>
                            <li class="list-group-item">Pago en efectivo de BS 224</li>
                            <li class="list-group-item">En caso de cremación, una nota de autorización de la funeraria
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-md-3" data-aos="slide-up">
                <div class="card">
                    <img class="card-img-top img-fluid" src="images/construccion.jpeg"
                        alt="Servicio de Autorización de Construcción de Nicho">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-hammer icon"></i> Autorización de Construcción de Nicho
                        </h5>
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item">Comprobante de inhumación o certificado de defunción</li>
                            <li class="list-group-item">Fotocopia de cédula de identidad del familiar o contribuyente
                            </li>
                            <li class="list-group-item">Pago en efectivo de BS 135</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>



        <!-- Start Footer -->
        <footer class="footer bg-dark text-light text-center">
            <p>&copy; 2024 Cementerios El Alto. Todos los derechos reservados.</p>
            <div class="social-icons">
                <a href="#" class="text-light mx-2"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="text-light mx-2"><i class="fab fa-twitter"></i></a>
                <a href="#" class="text-light mx-2"><i class="fab fa-instagram"></i></a>
            </div>
        </footer>
        <!-- End Footer -->

        <!-- Scripts -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
        <script src="https://cdn.rawgit.com/michalsnik/aos/2.1.1/dist/aos.js"></script>
        <script>
            AOS.init();
        </script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="../js/modal.js"></script>

</body>

</html>