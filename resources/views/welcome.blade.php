<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Plantilla de Página</title>
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.css"
    />
    <style>
      body {
        margin: 0;
        font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa; /* Color de fondo suave */
      }
      .navbar {
        position: fixed;
        width: 100%;
        top: 0;
        left: 0;
        background-color: #007bff; /* Azul claro */
        z-index: 1000;
        padding: 0.5rem 1rem; /* Ajuste del padding para el logo */
      }
      .navbar-brand {
        display: flex;
        align-items: center;
        color: #fff;
        font-size: 1.5rem;
        font-weight: bold;
      }
      .navbar-brand img {
        width: 150px; /* Tamaño del logo como ícono */
        height: auto; /* Mantiene la relación de aspecto del logo */
        margin-right: 0.75rem; /* Espacio entre el logo y el texto */
      }
      .navbar-nav a {
        color: #fff;
        margin-left: 15px;
        font-size: 1rem;
      }
      .navbar-nav a:hover {
        color: #e9ecef; /* Color claro al pasar el mouse */
      }
      .carousel-item img {
        width: 100%;
        height: auto;
      }
      .section {
        padding: 60px 0;
      }
      .section img {
        width: 100%;
        height: auto;
      }
      .section-text {
        text-align: center;
        margin: 20px 0;
      }
      .map-container {
        display: flex;
        align-items: center;
        margin: 20px 0;
      }
      .map {
        height: 300px;
        width: 60%;
      }
      .map-text {
        width: 40%;
        padding: 20px;
        background: #ffffff;
        border: 1px solid #dee2e6;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      }
      .map-container.reverse {
        flex-direction: row-reverse;
      }
      .container-fluid {
        padding: 0 15px;
      }
      .dropdown-menu {
        background-color: #007bff; /* Azul claro */
      }
      .dropdown-item {
        color: #fff;
      }
      .dropdown-item:hover {
        background-color: #0056b3; /* Azul más oscuro */
      }

      .section-text {
        text-align: center;
        margin-bottom: 30px;
      }

      .service-item {
        background: #ffffff;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
      }

      .service-img {
        width: 100%;
        height: auto;
        border-bottom: 1px solid #dee2e6;
      }

      .service-item h3 {
        margin: 15px 0 10px;
        font-size: 1.5rem;
        color: #333;
      }

      .service-item p {
        font-size: 1rem;
        color: #666;
      }

      .item {
        background: #ffffff;
        border: 1px solid #dee2e6;
        border-radius: 8px;
        overflow: hidden;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        padding: 20px;
        text-align: center; /* Centra el texto dentro del contenedor */
      }

      .item-img {
        width: 100%;
        height: auto;
        border-bottom: 1px solid #dee2e6; /* Línea divisoria entre la imagen y el texto */
      }

      .item h3 {
        margin: 15px 0 10px;
        font-size: 1.5rem;
        color: #333;
      }

      .item p {
        font-size: 1rem;
        color: #666;
      }
    </style>
  </head>
  <body>
    <!-- Sección 1: Menú -->
    <nav class="navbar navbar-expand-lg navbar-dark">
      <a class="navbar-brand" href="#">
        <img src="img/logo2.png" alt="Logo" />
        <span>Gestión de Cementerios El Alto</span>
      </a>

      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarNav"
        aria-controls="navbarNav"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a class="nav-link" href="#carouselExampleIndicators">Inicio</a>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="servicesDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Servicios
            </a>
            <div class="dropdown-menu" aria-labelledby="servicesDropdown">
              <a class="dropdown-item" href="#servicios">Servicios</a>
              <a class="dropdown-item" href="#items">Mas Servicios</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="servicesDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Mercedario
            </a>
            <div class="dropdown-menu" aria-labelledby="servicesDropdown">
              <a class="dropdown-item" href="admin/login">Administración</a>
              <a class="dropdown-item" href="/consulta">Consusltas</a>
              <a class="dropdown-item" href="#mapa_1">Ubicacion</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="servicesDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Tarapaca
            </a>
            <div class="dropdown-menu" aria-labelledby="servicesDropdown">
              <a class="dropdown-item" href="tarapaca/login">Administracion</a>
              <a class="dropdown-item" href="/consulta">Consusltas</a>
              <a class="dropdown-item" href="#mapa_2">Ubicacion</a>
            </div>
          </li>

          <li class="nav-item dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              id="aboutDropdown"
              role="button"
              data-toggle="dropdown"
              aria-haspopup="true"
              aria-expanded="false"
            >
              Villa Ingenio
            </a>
            <div class="dropdown-menu" aria-labelledby="aboutDropdown">
              <a class="dropdown-item" href="ingenio/login">Administracion</a>
              <a class="dropdown-item" href="/consulta">Consusltas</a>
              <a class="dropdown-item" href="#mapa_3">Ubicacion</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>

    <!-- Sección 2: Carrusel -->
    <div id="carouselExampleIndicators" class="carousel slide section">
      <ol class="carousel-indicators">
        <li
          data-target="#carouselExampleIndicators"
          data-slide-to="0"
          class="active"
        ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="img/IMG-20230927-WA0174-1536x864.jpg" alt="Imagen 1" />
        </div>
        <div class="carousel-item">
          <img src="img/slider6.jpeg" alt="Imagen 2" />
        </div>
        <div class="carousel-item">
          <img src="img/slider5.jpeg" alt="Imagen 3" />
        </div>
      </div>
      <a
        class="carousel-control-prev"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="prev"
      >
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a
        class="carousel-control-next"
        href="#carouselExampleIndicators"
        role="button"
        data-slide="next"
      >
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>

    <!-- Sección 3: Ítems -->
    <div id="servicios" class="section">
      <div class="container">
        <div class="section-header text-center">
          <h2>Servicios</h2>
        </div>
        <div class="row">
          <div class="col-md-4 section-text">
            <div class="service-item">
              <img
                src="img/inhumacion.jpg"
                alt="Servicio 1"
                class="service-img"
              />
              <h3>Inhumación</h3>
              <p>
                *CERTIFICADO DE DEFUNCIÓN OTORGADO POR EL REGISTRO CIVIL<br />
                *FOTOCOPIA VERIFICADA DEL CERTIFICAO MEDICO DE DEFUNCIÓN<br />
                *FOTOCOPIA SIMPLE DE CEDULA DE IDENTIDAD DEL FALLECIDO<br />
                *VERIFICADA FOTOCOPIA SIMPLE DE CEDULA DE IDENTIDAD DE <br />
                *FAMILIAR O CONTRIBUYENTE VERIFICADO FOTOCOPIA SIMPLE DE CEDULA
                DE IDENTIDAD (TESTIGOS) VERIFICADA.<br />
                *PAGO EN EFECTIVO DE BS.<br />
                >CEMENTERIO HÉROES DEL GAS SUR (TARAPACÁ):156,00.<a
                  href="https://www.google.com/maps/place/Cementerio+Tarapac%C3%A1/@-16.5261561,-68.1675157,17z/data=!4m10!1m2!2m1!1sCementerio+ingavi!3m6!1s0x915edf731e125ec3:0x1b5174611ed83bbc!8m2!3d-16.525244!4d-68.1651798!15sChFDZW1lbnRlcmlvIGluZ2F2aZIBCGNlbWV0ZXJ54AEA!16s%2Fg%2F1tkc357q?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                  target="_parent"
                  rel="sponsored"
                >
                  Ubicación</a
                ><br />
                >CEMENTERIO MERCEDARIO: 101,00.<a
                  href="https://www.google.com/maps/place/Cementerio+Mercedario/@-16.5298293,-68.2503607,17z/data=!4m6!3m5!1s0x915edc2d3d9f4cb5:0xb83b68d5098a2ff8!8m2!3d-16.5305236!4d-68.2499852!16s%2Fg%2F11c574wwpk?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                  target="_parent"
                  rel="sponsored"
                >
                  Ubicación</a
                ><br />
                >CEMENTERIO HÉROES DE GAS NORTE(VILLA INGENIO): 101,00.

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

          <div class="col-md-4 section-text">
            <div class="service-item">
              <img
                src="img/construccion.jpeg"
                alt="Servicio 2"
                class="service-img"
              />
              <h3>Construc. Nicho</h3>
              <p>
                *COMPROBANTE DE ENTIERRO O CERTIFICADO DE DEFUNCIÓN<br />
                *FOTOCOPIA DE LA CEDULA DE IDENTIDAD DEL USUARIO
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
                >CEMENTERIO HÉROES DE GAS NORTE(VILLA INGENIO): 135,00
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
          <div class="col-md-4 section-text">
            <div class="service-item">
              <img
                src="img/renovacion.jpg"
                alt="Servicio 3"
                class="service-img"
              />
              <h3>Renovación</h3>
              <p>
                * FOTOCOPIA DE CERTIFICADO DE DEFUNCIÓN <br />
                *PAGO EN EFECTIVO DE BS.<br />
                >CEMENTERIO HÉROES DEL GAS SUR (TARAPACÁ): 180,00 Bs
                <a
                  href="https://www.google.com/maps/place/Cementerio+Tarapac%C3%A1/@-16.5261561,-68.1675157,17z/data=!4m10!1m2!2m1!1sCementerio+ingavi!3m6!1s0x915edf731e125ec3:0x1b5174611ed83bbc!8m2!3d-16.525244!4d-68.1651798!15sChFDZW1lbnRlcmlvIGluZ2F2aZIBCGNlbWV0ZXJ54AEA!16s%2Fg%2F1tkc357q?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                  target="_parent"
                  rel="sponsored"
                >
                  Ubicación</a
                ><br />
                >CEMENTERIO MERCEDARIO: 135,00 Bs<a
                  href="https://www.google.com/maps/place/Cementerio+Mercedario/@-16.5298293,-68.2503607,17z/data=!4m6!3m5!1s0x915edc2d3d9f4cb5:0xb83b68d5098a2ff8!8m2!3d-16.5305236!4d-68.2499852!16s%2Fg%2F11c574wwpk?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                  target="_parent"
                  rel="sponsored"
                >
                  Ubicación</a
                ><br />
                CEMENTERIO HÉROES DE GAS NORTE(VILLA INGENIO): 135,00 Bs
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
        </div>
      </div>
    </div>

    <!-- Sección 4: Ítems -->
    <div id="items" class="section">
      <div class="container">
        <div class="section-header text-center">
          <h2> Mas Servicios</h2>
        </div>
        <div class="row">
          <div class="col-md-4 section-text">
            <div class="item">
              <img src="img/exhumacion.jpg" alt="Ítem 4" class="item-img" />
              <h3>Exhumación</h3>
              <p>
                *NOTA DE AUTORIZACIÓN EMITIDA POR LA AUTORIDAD DEL LUGAR Y/O
                COMUNIDAD DE DONDE SE VA A TRASLADAR LOS RESTOS OSEOS,
                ESPECIFICANDO EL NOMBRE DEL CEMENTERIO <br />
                *FOTOCOPIA DE CERTIFICADO DE DEFUNCION<br />
                *FOTOCOPIA DE CEDULA DE IDENTIDAD DEL SOLICITANTE<br />
                *FOTOCOPIA DECEDULA DE IDENTIDAD DE FAMILIARES DE PRIMER GRADO
                (con firma de autorización) ULTIMO COMPROBANTE DE PAGO <br />
                *NOTA DE AUTORIZACIÓN EMITIDA POR LA AUTORIDAD DEL LUGAR Y/O
                COMUNIDAD DE DONDE SE VA A TRASLADAR LOS RESTOS OSEOS,
                ESPECIFICANDO EL NOMBRE DEL CEMENTERIO
                <br />
                *PAGO EN EFECTIVO DE BS.<br />
                >CEMENTERIO HÉROES DEL GAS SUR (TARAPACÁ): 224,00 Bs
                <a
                  href="https://www.google.com/maps/place/Cementerio+Tarapac%C3%A1/@-16.5261561,-68.1675157,17z/data=!4m10!1m2!2m1!1sCementerio+ingavi!3m6!1s0x915edf731e125ec3:0x1b5174611ed83bbc!8m2!3d-16.525244!4d-68.1651798!15sChFDZW1lbnRlcmlvIGluZ2F2aZIBCGNlbWV0ZXJ54AEA!16s%2Fg%2F1tkc357q?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                  target="_parent"
                  rel="sponsored"
                >
                  Ubicación</a
                ><br />
                >CEMENTERIO MERCEDARIO: 224,00 Bs<a
                  href="https://www.google.com/maps/place/Cementerio+Mercedario/@-16.5298293,-68.2503607,17z/data=!4m6!3m5!1s0x915edc2d3d9f4cb5:0xb83b68d5098a2ff8!8m2!3d-16.5305236!4d-68.2499852!16s%2Fg%2F11c574wwpk?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                  target="_parent"
                  rel="sponsored"
                >
                  Ubicación</a
                ><br />
                >CEMENTERIO HÉROES DE GAS NORTE(VILLA INGENIO): 224,00 Bs
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
          <div class="col-md-4 section-text">
            <div class="item">
              <img src="img/certificacion.jpg" alt="Ítem 5" class="item-img" />
              <h3>Certificación </h3>
              <p>
                *NOTA DIRIGIDA AL DIRECTOR DE SERVICIOS MUNICIPALES E INICIATIVAS ECONOMICAS:LIC. PETER CHARLES MALDONADO BAKOVIC	</br>
                *FOTOCOPIA DE LA CEDULA DE IDENTIDAD DEL USUARIO (CONTRIBUYENTE)	</br>
                *FOTOCOPIA (TOTALMENTE LEGIBLE) DEL DOCUMENTO A CERTIFICAR</br>
                *PAGO EN EFECTIVO DE BS.<br />
                >CEMENTERIO HÉROES DEL GAS SUR (TARAPACÁ): 47,00 Bs
                <a
                  href="https://www.google.com/maps/place/Cementerio+Tarapac%C3%A1/@-16.5261561,-68.1675157,17z/data=!4m10!1m2!2m1!1sCementerio+ingavi!3m6!1s0x915edf731e125ec3:0x1b5174611ed83bbc!8m2!3d-16.525244!4d-68.1651798!15sChFDZW1lbnRlcmlvIGluZ2F2aZIBCGNlbWV0ZXJ54AEA!16s%2Fg%2F1tkc357q?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                  target="_parent"
                  rel="sponsored"
                >
                  Ubicación</a
                ><br />
                >CEMENTERIO MERCEDARIO: 47,00 Bs<a
                  href="https://www.google.com/maps/place/Cementerio+Mercedario/@-16.5298293,-68.2503607,17z/data=!4m6!3m5!1s0x915edc2d3d9f4cb5:0xb83b68d5098a2ff8!8m2!3d-16.5305236!4d-68.2499852!16s%2Fg%2F11c574wwpk?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                  target="_parent"
                  rel="sponsored"
                >
                  Ubicación</a
                ><br />
                >CEMENTERIO HÉROES DE GAS NORTE(VILLA INGENIO): 47,00 Bs
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
          <div class="col-md-4 section-text">
            <div class="item">
              <img src="img/legalizacion.jpg" alt="Ítem 6" class="item-img" />
              <h3>Legalización</h3>
              <p>
                *NOTA DIRIGIDA AL DIRECTOR DE SERVICIOS MUNICIPALES E INICIATIVAS ECONOMICAS: LIC. PETER MALDONADO BAKOVIC
                *FOTOCOPIA DE LA CEDULA DE IDENTIDAD DEL USUARIO (CONTRIBUYENTE)
                *FOTOCOPIA (TOTALMENTE LEGIBLE) DEL DOCUMENTO A LEGALIZAR
                *PAGO EN EFECTIVO DE BS.<br />
                >CEMENTERIO HÉROES DEL GAS SUR (TARAPACÁ): 36,00 Bs
                <a
                  href="https://www.google.com/maps/place/Cementerio+Tarapac%C3%A1/@-16.5261561,-68.1675157,17z/data=!4m10!1m2!2m1!1sCementerio+ingavi!3m6!1s0x915edf731e125ec3:0x1b5174611ed83bbc!8m2!3d-16.525244!4d-68.1651798!15sChFDZW1lbnRlcmlvIGluZ2F2aZIBCGNlbWV0ZXJ54AEA!16s%2Fg%2F1tkc357q?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                  target="_parent"
                  rel="sponsored"
                >
                  Ubicación</a
                ><br />
                >CEMENTERIO MERCEDARIO: 36,00 Bs<a
                  href="https://www.google.com/maps/place/Cementerio+Mercedario/@-16.5298293,-68.2503607,17z/data=!4m6!3m5!1s0x915edc2d3d9f4cb5:0xb83b68d5098a2ff8!8m2!3d-16.5305236!4d-68.2499852!16s%2Fg%2F11c574wwpk?entry=ttu&g_ep=EgoyMDI0MDgyOC4wIKXMDSoASAFQAw%3D%3D"
                  target="_parent"
                  rel="sponsored"
                >
                  Ubicación</a
                ><br />
                >CEMENTERIO HÉROES DE GAS NORTE(VILLA INGENIO): 36,00 Bs
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
        </div>
      </div>
    </div>

    <!-- Sección 5: Mapa y Texto -->
    <div id="mapa_1" class="section">
      <div class="container">
        <div class="map-container">
          <div id="map" class="map"></div>
          <div class="map-text">
            <h4>UBICACIÓN DEL CEMENTERO “MERCEDARIO</h4>
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
          </div>
        </div>
      </div>
    </div>

    <!-- Sección 6: Mapa 2 y Texto (Reversa) -->
    <div id="mapa_2" class="section">
      <div class="container">
        <div class="map-container reverse">
          <div id="map2" class="map"></div>
          <div class="map-text">
            <h4>UBICACIÓN DEL CEMENTERIO TARAPACÁ
              HÉROES DEL GAS SUR</h4>
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
          </div>
        </div>
      </div>
    </div>

    <!-- Sección 7: Mapa 3 y Texto (Reversa) -->
    <div id="mapa_3" class="section">
      <div class="container">
        <div class="map-container reverse">
          <div class="map-text">
            <h4>UBICACIÓN DEL CEMENTERIO VILLA INGENIO
              HÉROES DE GAS NORTE”</h4>
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
          </div>
          <div id="map3" class="map"></div>
        </div>
      </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/leaflet/1.7.1/leaflet.js"></script>
    <script>
      // Configuración del mapa
      var map = L.map("map").setView([-16.5298293,-68.2503607], 15);

      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
          '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(map);

      L.marker([-16.5298293,-68.2503607])
        .addTo(map)
        .bindPopup("Cementerio <br> Mercedario")
        .openPopup();

      // Configuración del segundo mapa
      var map2 = L.map("map2").setView([-16.5261561, -68.1675157], 16);

      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
          '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(map2);

      L.marker([-16.5261561, -68.1675157])
        .addTo(map2)
        .bindPopup("Cementerio.<br> TARAPACÁ HÉROES DEL GAS SUR.")
        .openPopup();
      // Inicialización del tercer mapa
      var map3 = L.map("map3").setView([-16.4489864, -68.2110248], 15); // Coordenadas de ejemplo para el tercer mapa

      L.tileLayer("https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png", {
        attribution:
          '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
      }).addTo(map3);

      L.marker([-16.4489864, -68.2110248])
        .addTo(map3)
        .bindPopup("CEMENTERIO.<br> VILLA INGENIO HÉROES DE GAS NORTE”.")
        .openPopup();
    </script>
  </body>
</html>
