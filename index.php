<?php session_start();
if (isset($_SESSION["activo"])) {
    echo ("LOGUEADO");
} else {
    echo ("NO LOGUEADO");
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
   <link href="assets/vendor/galery/disponibilidad.css" rel="stylesheet">


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
      <div class="container d-flex" style="max-width: 1000px;">
         <div class="logo mr-auto">
            <h1 class="text-light">
               <a href="index.php"><span>Martínez</span>Travels & Tours</a>
            </h1>
         </div>
         <nav class="nav-menu d-none d-lg-block">
            <ul>
               <li class="active"><a href="index.php">Inicio</a></li>
               <li><a href="#about">¿Quiénes somos?</a></li>
               <li class="drop-down">
                  <a href="#">Servicios</a>
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
                        <a href="servicios/vehiculos/disponibilidad.php">Renta de Vehículos</a>
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
                  </ul>
               </li>
               <li><a href="./servicios/chat/messenger.php">Contacto</a></li>
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

            </ul>
         </nav>
         <!-- .nav-menu -->
      </div>
   </header>
   <!-- End Header -->

   <!-- INICIO Slider Area -->
   <div class="container" style="padding-top: 10%;">
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="slideshow-container">

               <div class="mySlides fade">
                  <div class="numbertext">1 / 6</div>
                  <img src="assets/img/slider/1.jpg" style="width:100%">
               </div>

               <div class="mySlides fade">
                  <div class="numbertext">2 / 6</div>
                  <img src="assets/img/slider/2.jpg" style="width:100%">
               </div>

               <div class="mySlides fade">
                  <div class="numbertext">3 / 6</div>
                  <img src="assets/img/slider/3.jpg" style="width:100%">
               </div>
               <div class="mySlides fade">
                  <div class="numbertext">4 / 6</div>
                  <img src="assets/img/slider/4.jpg" style="width:100%">
               </div>
               <div class="mySlides fade">
                  <div class="numbertext">5 / 6</div>
                  <img src="assets/img/slider/5.jpg" style="width:100%">
               </div>
               <div class="mySlides fade">
                  <div class="numbertext">6 / 6</div>
                  <img src="assets/img/slider/6.jpg" style="width:100%">
               </div>

            </div>
            <br>

            <div style="text-align:center">
               <span class="dot"></span>
               <span class="dot"></span>
               <span class="dot"></span>
               <span class="dot"></span>
               <span class="dot"></span>
               <span class="dot"></span>
            </div>
         </div>
      </div>
   </div>



   <!-- FIN Slider Area -->

   <main id="main">
      <!-- ======= About Section ======= -->
      <div id="about" class="about-area area-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="section-headline text-center">
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
      <!-- ======= Services Section ======= -->
      <div id="services" class="services-area area-padding">
         <div class="container">
            <div class="row">
               <div class="col-md-12 col-sm-12 col-xs-12">
                  <div class="section-headline services-head text-center">
                     <h2>Nuestros Servicios</h2>
                  </div>
               </div>
            </div>
            <div class="row text-center">
               <!-- Start Left services -->
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="about-move">
                     <div class="services-details">
                        <div class="single-services">

                           <a href="servicios/asesoria/cita.php"><img src="assets/img/asesoria.png" /></a>
                           </a>
                           <h4>Asesoría Migratoria</h4>
                           <p>
                              Somos profesionales en El Salvador en asesoría sobre trámites
                              migratorios hacia
                              los Estados Unidos.
                           </p>
                        </div>
                     </div>
                     <!-- end about-details -->
                  </div>
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <div class="about-move">
                     <div class="services-details">
                        <div class="single-services">
                           <a href="servicios/paquetes/disponibles.php"><img src="assets/img/paquetes.png" /></a>
                           </a>
                           <h4>Paquetes</h4>
                           <p>
                              Haz realidad tus sueños con nuestros paquetes turísticos para Centro
                              América,
                              Sudamérica y Europa.
                           </p>
                        </div>
                     </div>
                     <!-- end about-details -->
                  </div>
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <!-- end col-md-4 -->
                  <div class="about-move">
                     <div class="services-details">
                        <div class="single-services">
                           <a href="servicios/tours/disponibles.php"><img src="assets/img/tours.png" /></a>
                           <h4>Tours</h4>
                           <p>
                              Tú elige el destino, nosotros te llevamos! haz realidad tus
                              sueños viajando a Centro América, Sudamérica y Europa.
                           </p>
                        </div>
                     </div>
                     <!-- end about-details -->
                  </div>
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <!-- end col-md-4 -->
                  <div class="about-move">
                     <div class="services-details">
                        <div class="single-services">
                           <a href="servicios/vehiculos/disponibilidad.php"><img src="assets/img/vehiculos.png" /></a>
                           <h4>Renta de Vehículos </h4>
                           <p>
                              Si lo que quieres es movilizarte en modernos vehículos, pregunta por
                              nuestro
                              servicio de alquiler de autos.
                           </p>
                        </div>
                     </div>
                     <!-- end about-details -->
                  </div>
               </div>
               <!-- End Left services -->
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <!-- end col-md-4 -->
                  <div class="about-move">
                     <div class="services-details">
                        <div class="single-services">
                           <a href="./servicios/vuelos/disponibilidadPromociones.php"><img
                                 src="assets/img/vuelos.png" /></a>
                           <h4>Vuelos</h4>
                           <p>
                              Conoce todas las promociones y tarifas bajas en vuelos nacionales e
                              internacionales.
                           </p>
                        </div>
                     </div>
                     <!-- end about-details -->
                  </div>
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <!-- end col-md-4 -->
                  <div class="about-move">
                     <div class="services-details">
                        <div class="single-services">
                           <a href="./servicios/encomienda/cotizador.php"><img src="assets/img/encomiendas.png" /></a>
                           <h4>Encomiendas</h4>
                           <p>
                              Deseas relizar envíos nacionales o al extrangero, no busques más somos
                              la mejor
                              opcion para enviar tu encomienda.
                           </p>
                        </div>
                     </div>
                     <!-- end about-details -->
                  </div>
               </div>
               <!-- End Left services -->

               <div class="col-md-4 col-sm-4 col-xs-12">
                  <!-- end col-md-4 -->

               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <!-- end col-md-4 -->
                  <div class="about-move">
                     <div class="services-details">
                        <div class="single-services">
                           <a href="./servicios/chat/messenger.php"><img src="assets/img/chat.png" /></a>
                           <h4>Atención al Cliente 24/7</h4>
                           <p>
                              Tienes alguna duda, no te preocupes estamos aqui para ayudarte, ponte en
                              contacto con nosotros.
                           </p>
                        </div>
                     </div>
                     <!-- end about-details -->
                  </div>
               </div>
               <div class="col-md-4 col-sm-4 col-xs-12">
                  <!-- end col-md-4 -->

               </div>
            </div>
         </div>
      </div>
      <!-- End Services Section -->
   </main>
   <!-- End #main -->
   <!-- ======= contenedor promociones ======= -->
   <div id="promociones" class="promociones-area area-padding">
      <div class="container">
         <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="section-headline services-head text-center">
                  <h2>Promociones</h2>
               </div>
            </div>
         </div>
         <div class="blog-page area-padding">
            <div class="container">
               <section class="content">
                  <form id="imagenPromociones" name="imagenPromociones" role="form" onsubmit="return false">
                     <div class="container">
                        <div class="row" id="contenedorPromociones">
                           <!-- Hover-Fall Efecto-->

                        </div>
                     </div>
                  </form>
               </section>
            </div>
         </div><!-- End Blog Page -->

      </div>
      <form id="miFormulario" name="miFormulario" role="form" onsubmit="return false">
         <!-- Modal EDITAR-->
         <div class="modal fade" id="modal-editar">
            <div class="modal-dialog modal-lg modal-dialog-centered">
               <div class="modal-content">

                  <section class="content">

                     <!-- Default box -->
                     <div class="card card-solid">
                        <div class="card-body">
                           <div class="row">
                              <div class="col-12 col-sm-6">
                                 <div id="imagenGrande" class="col-12">
                                 </div>
                                 <div id="imagenesPequenas" class="col-12 product-image-thumbs">

                                    <div class="product-image-thumb" id="0">

                                    </div>
                                    <div class="product-image-thumb" id="1">

                                    </div>
                                    <div class="product-image-thumb" id="2">

                                    </div>
                                    <div class="product-image-thumb" id="3">

                                    </div>
                                    <div class="product-image-thumb" id="4">

                                    </div>
                                    <div class="product-image-thumb" id="5">

                                    </div>
                                    <div class="product-image-thumb" id="6">

                                    </div>
                                    <div class="product-image-thumb" id="7">

                                    </div>
                                    <div class="product-image-thumb" id="8">

                                    </div>
                                    <div class="product-image-thumb" id="9">

                                    </div>
                                 </div>
                              </div>
                              <div class="col-12 col-sm-6">

                                 <br>
                                 <h6>Promoción disponible hasta: </h6>
                                 <label name="fechaR" id="fechaR" data-date="" data-date-format="DD MMMM YYYY"></label>
                                 <hr>


                                 <div class="bg-primary py-2 px-3 mt-4">
                                    <div class="centrar">
                                       <h6 style="color:#FFFFFF">Precio por persona: $</h6>

                                       <h6 class="mb-0" name="precioP" id="precioP"
                                          style="text-align:center; color:#FFFFFF">
                                       </h6>
                                    </div>
                                 </div>

                                 <div class="card">
                                    <div class="card-header">
                                       <h3 class="card-title">Descripción:</h3>

                                       <div class="card-tools">
                                          <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                                class="fas fa-minus"></i>
                                          </button>
                                       </div>
                                    </div>
                                    <div class="card-body p-0">
                                       <ul class="nav nav-pills flex-column">

                                          <li class="nav-item">
                                             <a href="#" class="nav-link">
                                                <i class="fas fa-plane-departure"></i> Saliendo
                                                de
                                                <span class="badge bg-warning float-right">
                                                   <h7 name="saliendo" id="saliendo"></h7>
                                                </span>

                                             </a>
                                          </li>

                                          <li class="nav-item active">
                                             <a href="#" class="nav-link">
                                                <i class="fas fa-plane-arrival"></i> País
                                                <span class="badge bg-primary float-right">
                                                   <h7 name="pais" id="pais"></h7>
                                                </span>
                                             </a>
                                          </li>
                                          <li class="nav-item">
                                             <a href="#" class="nav-link">
                                                <i class="fas fa-map-marked-alt"></i> Lugar de
                                                Destino
                                                <span class="badge bg-Secondary float-right">
                                                   <h7 name="lugard" id="lugard"></h7>
                                                </span>
                                             </a>
                                          </li>

                                          <li class="nav-item">
                                             <a href="#" class="nav-link">
                                                <i class="fas fa-plane"></i> Aerolínea
                                                <span class="badge bg-success float-right">
                                                   <h7 name="aerolineav" id="aerolineav"></h7>
                                                </span>

                                             </a>
                                          </li>
                                          <li class="nav-item">
                                             <a href="#" class="nav-link">
                                                <i class="fas fa-suitcase-rolling"></i> Tipo de
                                                Clase
                                                <span class="badge bg-danger float-right">
                                                   <h7 name="tipoClase" id="tipoClase"></h7>
                                                </span>

                                             </a>
                                          </li>
                                       </ul>
                                    </div>
                                 </div>
                              </div>
                              <label>*Restricciones aplican, en caso de querer adquirir la promoción,
                                 favor
                                 ponerse en contacto con la Agencia </label>
                           </div>
                        </div>
                        <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                  </section>
               </div>
               <!-- /.modal-content -->
            </div>
            <!-- /.modal-dialog -->
         </div>
         <!-- End Modal EDITAR-->
      </form>

   </div>

   <!-- ======= fin contenedor promociones ======= -->


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

                        <p>Síguenos en todas nuestras redes sociales para estar al tanto de todas
                           nuestras
                           promociones y
                           productos</p>
                        <div class="footer-icons">
                           <ul>
                              <li>
                                 <a href="https://www.facebook.com/martineztours99/" style="padding-top: 10px"><i
                                       class="fa fa-facebook"></i></a>
                              </li>
                              <li>
                                 <a href="https://api.whatsapp.com/send/?phone=50378411184&text&app_absent=0"
                                    style="padding-top: 10px"><i class="fa fa-whatsapp"></i></a>
                              </li>
                              <li>
                                 <a href="https://mail.google.com/mail/?view=cm&fs=1&to=info.ventas@martineztraveltours.com&su=Asunto&body=cuerpo%20mensaje&bcc=info.ventas@martineztraveltours.com."
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
                        <p>
                           También puedes contactarnos de las siguiente manera
                        </p>
                        <div class="footer-contacts">
                           <p><span>Teléfono:</span>+(503) 7841-1184</p>
                           <p><span>Email:</span>info.ventas@martineztraveltours.com</p>

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
                        <p>
                           Ubicación: 2a Avenida Sur, Barrio el Centro #4D San Vicente, El Salvador
                        </p>
                        <div class="footer-contacts">

                           <p><span>Lunes a Viernes</span> (8:00 am a 5:30 pm)</p>
                           <p><span>Sábados</span> (8:00 am a 12:30 pm)</p>
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
   <script src="assets/js/slider.js"></script>
   <script src="assets/js/main.js"></script>
   <script src="assets/js/controladores/firebase/firestore-config.js"></script>
   <script src="assets/js/controladores/firebase/main.js"></script>
   <script src="assets/vendor/moment/moment.min.js"></script>

   <script src="assets/js/controladores/vuelos/disponibilidad-app.js"></script>

   <script src="assets/js/controladores/client/closeSesion.js"></script>

</body>

</html>