<?php session_start();
if (isset($_SESSION["activo"])) {
   //  echo ("LOGUEADO");
} else {
   //  echo ("NO LOGUEADO");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>Martínez Travels & Tours</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />
    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />
    <!-- Google Fonts -->
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900"
        rel="stylesheet" />
    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet" />
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet" />
    <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
    <link href="assets/css/slider.css" rel="stylesheet" />
    <link href="assets/vendor/venobox/venobox.css" rel="stylesheet" />
    <link href="assets/css/adminlte.css" rel="stylesheet" />
    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/animate.min.css" rel="stylesheet" />
    <link href="assets/css/style_slider.css" rel="stylesheet" />
    <link href="assets/vendor/galery/disponibilidad.css" rel="stylesheet">
    <link href="assets/css/avatar.css" rel="stylesheet">


</head>

<style type="text/css" media="all">
h3,
h6 {
    display: inline;
}

.centrar {

    text-align: center;
}
</style>


<body data-spy="scroll" data-target="#navbar-example">
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex" style="max-width: 100%;">
            <div class="logo mr-auto">
                <h1 class="text-light">
                    <a href="index.php"><span>Martínez</span>Travels & Tours</a>
                </h1>
            </div>
            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class=""><a href="index.php">Inicio</a></li>
                    <li class="active"><a href="#">¿Quiénes somos?</a></li>
                    <li class="drop-down">
                        <a href="#services">Servicios</a>
                        <ul>
                            <li>
                                <a href="servicios/asesoria/cita.php">Asesoría Migratora</a>
                            </li>
                            <li>
                                <a href="servicios/paquetes/disponibles.php">Paquetes</a>
                            </li>
                            <li>
                                <a href="servicios/tours/disponibles.php">Tours</a>
                            </li>
                            <li>
                                <a href="servicios/vehiculos/disponibilidad.php">Flota de Vehículos</a>
                            </li>
                            <li>
                                <a href="servicios/vehiculos/cotizarVehiculo.php">Cotización de Vehículo</a>
                            </li>
                            <li>
                                <a href="servicios/vuelos/cotizarVuelo.php">Cotización de Vuelos</a>
                            </li>
                            <li>
                                <a href="servicios/paquetes/cotizar.php">Cotización de Paquete</a>
                            </li>
                            <li>
                                <a href="servicios/vuelos/disponibilidadPromociones.php">Promociones de Vuelos</a>
                            </li>
                            <li>
                                <a href="servicios/encomienda/cotizador.php">Encomienda</a>
                            </li>
                            <li>
                                <a href="assets/apk/Martínez Travel y Tours.apk">Descargar Aplicación Móvil</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="#contact">Contacto</a></li>
                    <li class="drop-down"><a href="#">Mi Cuenta</a>
                        <ul>
                            <?php if (!isset($_SESSION["activo"])) : ?>
                            <li><a href="createAccount.php">Registrarse</a></li>
                            <li><a href="login.php">Identifícate</a></li>
                            <?php else : ?>
                            <li><a href="servicios/client/updateInfo.php">Actualizar Datos </a></li>
                            <li><a href="servicios/client/updateDocumentos.php">Documentos Personales</a></li>
                            <li class="drop-down"><a href="#">Servicios Adquiridos</a>
                                <ul>
                                    <li><a href="servicios/paquetes/adquiridos.php">Tours/Paquetes</a></li>
                                    <li><a href="servicios/vehiculos/vehiculosAlquilados.php">Vehículos</a></li>
                                    <li><a href="#">Encomiendas</a></li>
                                </ul>
                            </li>
                            <li class="drop-down"><a href="#">Cotizaciones</a>
                                <ul>
                                    <li><a href="servicios/paquetes/solicitudes.php">Paquetes</a></li>
                                    <li><a href="servicios/vehiculos/cotizacionesRealizadas.php">Vehículos</a></li>
                                    <li><a href="servicios/vuelos/cotizacionesRealizadasV.php">Vuelos</a></li>
                                </ul>
                            </li>
                            <li><a name="logout" id="logout" href="#">Cerrar Sesión</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                    <?php if (isset($_SESSION["activo"])) : ?>
                    <li><a style="padding: 0px; margin-top: -4px;" href="#">
                            <div class="user-image"><img src="assets/img/no-user.png" id="avatar-img"
                                    class="user-image">
                            </div>
                        </a>
                    </li>
                    <?php endif; ?>

                </ul>
            </nav>
            <!-- .nav-menu -->
        </div>
    </header>
    <!-- End Header -->

    <main id="main">
        <!-- ======= About Section ======= -->
        <div id="about" class="about-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">
                            <br><br><br>
                            <h2>¿Quiénes Somos?</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <!-- single-well start-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="well-left">
                            <div class="single-well">
                                <a href="#">
                                    <img src="assets/img/agencia.jpg" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- single-well end-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="well-middle">
                            <div class="single-well">
                                <br>
                                <a href="#">
                                    <h4 class="sec-head">Agencia de Viajes</h4>
                                </a>
                                <p style="text-align: justify;">
                                    La agencia de viajes surge en el año 2009 como un
                                    negocio familiar, realizando excursiones
                                    nacionales y en Centroamérica, vía terrestre,
                                    orientados desde un principio en la calidad,
                                    seguridad, además del profesionalismo en cada uno
                                    de sus tours, promoviendo paquetes turísticos a lo
                                    largo de todo el mundo, realizando circuitos en
                                    más de 20 países incluyendo tanto Europeos como
                                    Asiáticos, gracias al éxito obtenido en cada uno
                                    de esos viajes surge lo que hoy en día es una
                                    agencia de viajes llamada MARTINEZ TRAVEL & TOURS
                                    siendo de alta calidad y completos los servicios
                                    que ofrecen a sus clientes.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End col-->
                </div>
            </div>
        </div>
        <!-- End About Section -->
    </main>



    <main id="main">
        <!-- ======= About Section ======= -->
        <div id="about" class="about-area area-padding">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="section-headline text-center">

                        </div>
                    </div>
                </div>
                <div class="row">

                    <!-- single-well end-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="well-middle">
                            <div class="single-well">
                                <br><br><br><br>
                                <a href="#">
                                    <h4 class="sec-head">Misión</h4>
                                </a>
                                <p style="text-align: justify;">

                                    Su misión es brindar las mejores experiencias de viajes alrededor del mundo vía
                                    aérea, marítima y terrestre, obteniendo la mayor satisfacción de los clientes,
                                    concediendo servicios que van más allá de las expectativas. </p>
                            </div>
                        </div>
                    </div>
                    <!-- End col-->
                    <!-- single-well start-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="well-left">
                            <div class="single-well">
                                <a href="#">
                                    <img src="assets/img/slider/12.jpg" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End About Section -->
    </main>

    <main id="main">
        <!-- ======= About Section ======= -->
        <div id="about" class="about-area area-padding">
            <div class="container">

                <div class="row">
                    <!-- single-well start-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="well-left">
                            <div class="single-well">
                                <a href="#">
                                    <img src="assets/img/portfolio/9.jpg" alt="" />
                                </a>
                            </div>
                        </div>
                    </div>
                    <!-- single-well end-->
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="well-middle">
                            <div class="single-well">
                                <br><br><br><br>
                                <a href="#">
                                    <h4 class="sec-head">Visión</h4>
                                </a>
                                <p style="text-align: justify;">
                                    Ser una agencia de viajes reconocida a nivel nacional e internacional, orientados en
                                    la calidad, seguridad, experiencia, profesionalismo y servicio para sus clientes,
                                    promoviendo las mejores opciones de viaje para satisfacer las necesidades y
                                    expectativas de los clientes a través de productos turísticos de calidad.
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- End col-->
                </div>
            </div>
        </div>
        <!-- End About Section -->
    </main>
    <main id="main">
        <!-- ======= About Section ======= -->
        <div id="about" class="about-area area-padding">
            <div class="container">

                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <h4>GALERIA</h4>
                                <div class="flicker-img">
                                    <a href="#"><img src="assets/img/portfolio/1.jpg" alt=""></a>
                                    <a href="#"><img src="assets/img/portfolio/2.jpg" alt=""></a>
                                    <a href="#"><img src="assets/img/portfolio/3.jpg" alt=""></a>
                                    <a href="#"><img src="assets/img/portfolio/4.jpg" alt=""></a>
                                    <a href="#"><img src="assets/img/portfolio/5.jpg" alt=""></a>
                                    <a href="#"><img src="assets/img/portfolio/6.jpg" alt=""></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
        </div>
        <!-- End About Section -->
    </main>

    <!-- ======= Footer ======= -->
    <footer id="contact">
        <div class="footer-area">
            <div class="container caja-footer">
                <div class="row">
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <div class="footer-logo">
                                    <h2><span>Martínez</span>Travels & Tours</h2>
                                </div>

                                <p style="color: #444; font-weight: 200;">Síguenos en todas nuestras redes sociales para
                                    estar al tanto de todas
                                    nuestras promociones y productos.</p>
                                <div class="footer-icons">
                                    <ul>
                                        <li>
                                            <a href="https://www.facebook.com/martineztours99/"
                                                style="padding-top: 10px"><i class="fa fa-facebook"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://api.whatsapp.com/send/?phone=50378411184&text&app_absent=0"
                                                style="padding-top: 10px"><i class="fa fa-whatsapp"></i></a>
                                        </li>
                                        <li>
                                            <a href="https://mail.google.com/mail/?view=cm&fs=1&to=info.ventas@martineztraveltours.com&su=Asunto&body=cuerpo%20mensaje."
                                                style="padding-top: 10px"><i class="fa fa-google"></i></a>
                                        </li>

                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <div class="footer-logo">
                                    <h2><span>Cont</span>acto</h2>
                                </div>
                                <p style="color: #444; font-weight: 200;">
                                    También puedes contactarnos de las siguiente manera:
                                </p>
                                <div class="footer-contacts">
                                    <p><span>Teléfono:</span>
                                        <span style="color: #444; font-weight: 200;" name="telefono_a"
                                            id="telefono_a"></span>
                                    </p>
                                    <p><span>Email:</span>
                                        <span style="color: #444; font-weight: 200;" name="email_a" id="email_a"></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end single footer -->
                    <div class="col-md-4 col-sm-4 col-xs-12">
                        <div class="footer-content">
                            <div class="footer-head">
                                <div class="footer-logo">
                                    <h2><span>Ubic</span>ación</h2>
                                </div>
                                <div class="footer-contacts">
                                    <p>
                                        <span>Ubicación: </span>
                                        <span style="color: #444; font-weight: 200;" name="direccion_a"
                                            id="direccion_a"></span>
                                    </p>
                                    <p><span name="semana_a" id="semana_a"></span>
                                        <span style="color: #444; font-weight: 200;" name="horaS_a" id="horaS_a"></span>
                                    </p>
                                    <p><span name="fin_a" id="fin_a"></span>
                                        <span style="color: #444; font-weight: 200;" name="horaF_a" id="horaF_a"></span>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <br>



                <div class="container">
                    <div class="row">
                        <!-- Start Google Map -->
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <!--PONDRE EL CHAT-->
                            <link rel="stylesheet"
                                href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-area-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="copyright text-center">
                            <p>
                                &copy; UES <strong>2021</strong>. Todos los derechos reservados
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- End  Footer -->
    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
    <div id="preloader"></div>
    <!-- Vendor JS Files -->

    <script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-app.js"></script>
    <!-- Add additional services that you want to use -->
    <script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-auth.js"></script>
    <script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-firestore.js"></script>
    <script src="assets/vendor/jquery/jquery.min.js"></script>
    <script src="assets/js/controladores/client/changeAvatar.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>
    <script src="assets/vendor/appear/jquery.appear.js"></script>
    <script src="assets/vendor/knob/jquery.knob.js"></script>
    <script src="assets/vendor/parallax/parallax.js"></script>
    <script src="assets/vendor/wow/wow.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/venobox/venobox.min.js"></script>
    <script src="assets/js/conf.js"></script>
    <!-- Template Main JS File -->
    <script src="assets/js/controladores/agencia/mostrarInfo.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/controladores/firebase/firestore-config.js"></script>
    <script src="assets/js/controladores/firebase/main.js"></script>
    <script src="assets/vendor/moment/moment.min.js"></script>

    <script src="assets/js/controladores/client/closeSesion.js"></script>

</body>

</html>