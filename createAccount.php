<?php
session_start();
if (!isset($_SESSION["activo"])) {
   // echo ("NO LOGUEADO");
} else {
   header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="utf-8" />
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />

   <title>Martínez Travels y Tours</title>
   <meta content="" name="description" />
   <meta content="" name="keywords" />

   <!-- Favicons -->
   <link href="assets/img/favicon.png" rel="icon" />
   <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

   <!-- Google Fonts -->
   <link
      href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,600,700|Raleway:300,400,400i,500,500i,700,800,900"
      rel="stylesheet" />

   <!-- Font Awesome -->
   <link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">

   <!-- Vendor CSS Files -->
   <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
   <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet" />
   <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet" />
   <link href="assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" />
   <link href="assets/vendor/nivo-slider/css/nivo-slider.css" rel="stylesheet" />
   <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet" />
   <link href="assets/vendor/venobox/venobox.css" rel="stylesheet" />
   <link href="assets/css/adminlte.css" rel="stylesheet" />

   <!-- Template Main CSS File -->
   <link href="assets/css/style.css" rel="stylesheet" />
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
   <!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
   <link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous" rel="stylesheet">
   <link href="assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
   <link href="assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
   <link href="assets/vendor/select2/css/select2.min.css" rel="stylesheet">
   <link href="assets/vendor/select2/css/miEstilo.css" rel="stylesheet">
   <link href="assets/vendor/asiento-bus/css/jquery.seat-charts.css" rel=" stylesheet" type="text/css">
   <link href="assets/vendor/asiento-bus/css/reserva.css" rel=" stylesheet" type="text/css">
   <link href="assets/vendor/subir-foto/css/fileinput.css" rel="stylesheet" type="text/css" />
   <link href="assets/vendor/subir-foto/css/avatar.css" rel="stylesheet" type="text/css" />
   <link href="assets/vendor/subir-foto/themes/explorer-fas/theme.css" rel="stylesheet" type="text/css" />
</head>

<body data-spy="scroll" data-target="#navbar-example">
   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top">
      <div class="container d-flex">
         <div class="logo mr-auto">
            <h1 class="text-light">
               <a href="index.php"><span>Martínez</span>Travels & Tours</a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
         </div>
         <nav class="nav-menu d-none d-lg-block">
            <ul>
               <li class=""><a href="index.php">Inicio</a></li>
               <li><a href="#about">¿Quienes somos?</a></li>
               <li class="drop-down">
                  <a href="#services">Servicios</a>
                  <ul>
                     <li>
                        <a href="servicios/asesoria/cita.php">Asesoria Migratora</a>
                     </li>
                     <li>
                        <a href="servicios/paquetes/disponibles.php">Paquetes</a>
                     </li>
                     <li>
                        <a href="servicios/tours/disponibles.php">Tours</a>
                     </li>
                     <li>
                        <a href="servicios/vehiculos/disponibilidad.php">Renta de Vehiculos</a>
                     </li>

                     <li>
                        <a href="servicios/vuelos/cotizarVuelo.php">Cotización de Vuelos</a>
                     </li>
                     <li>
                        <a href="servicios/paquetes/cotizar.php">Cotización de Paquetes</a>
                     </li>
                     <li>
                        <a href="servicios/vuelos/disponibilidadPromociones.php">Promociones de Vuelos</a>
                     </li>
                     <li>
                        <a href="servicios/encomienda/cotizador.php">Encomienda</a>
                     </li>
                  </ul>
               </li>
               <li><a href="#contact">Contacto</a></li>
               <li class="drop-down"><a href="#">Mi Cuenta</a>
                  <ul>
                     <?php if (!isset($_SESSION["activo"])) : ?>
                     <li><a href="createAccount.php">Registrate</a></li>
                     <li><a href="login.php">Identificate</a></li>
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
   <main id="main" style="padding-top: 55px;">
      <!-- ======= Blog Page ======= -->
      <div class="blog-page area-padding">
         <div class="container">
            <section class="content">
               <form id="miFormularioCliente" enctype="multipart/form-data" name="miFormularioCliente" role="form">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="overlay-wrapper">
                           <div id="loadingCliente" class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                              <div class="text-bold pt-2">Cargando...
                              </div>
                           </div>
                           <!-- START timeline item -->
                           <div class="timeline">
                              <!-- timeline item -->
                              <div>
                                 <i class="fas fa-users bg-blue"></i>
                                 <div class="timeline-item">
                                    <h3 class="timeline-header"><a href="#">Datos Personales</a></h3>
                                    <div class="timeline-body">
                                       <div class="row">
                                          <div class="col-sm-9">
                                             <div class="row">
                                                <div class="col-sm-6">
                                                   <div class="form-group">
                                                      <label>Nombre de Cliente</label>
                                                      <div class="input-group">
                                                         <input type="text" class="form-control" name="nombreCliente"
                                                            placeholder="Digite Nombre" id="nombreCliente">
                                                      </div>
                                                      <!-- /.input group -->
                                                   </div>
                                                </div>
                                                <div class="col-sm-6">
                                                   <div class="form-group">
                                                      <label>Correo Electronico</label>
                                                      <div class="input-group">
                                                         <input placeholder="Digite Correo Electronico" type="text"
                                                            class="form-control" name="correo" id="correo">
                                                      </div>
                                                      <!-- /.input group -->
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-sm-6">
                                                   <div class="form-group">
                                                      <label>Contraseña</label>
                                                      <div class="input-group">
                                                         <input placeholder="Digite Contraseña" type="password"
                                                            class="form-control" name="password1" id="password1">
                                                      </div>
                                                      <!-- /.input group -->
                                                   </div>
                                                </div>
                                                <div class="col-sm-6">
                                                   <div class="form-group">
                                                      <label>Repetir Contraseña</label>
                                                      <div class="input-group">
                                                         <input type="password" placeholder="Repita Contraseña"
                                                            class="form-control" name="password2" id="password2">
                                                      </div>
                                                      <!-- /.input group -->
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="row">
                                                <div class="col-sm-6">
                                                   <div class="form-group">
                                                      <label>Dui (opcional)</label>
                                                      <div class="input-group">
                                                         <input placeholder="12345678-9" type="text"
                                                            class="form-control" id="dui" name="dui">
                                                      </div>
                                                      <!-- /.input group -->
                                                   </div>
                                                </div>
                                                <div class="col-sm-6">
                                                   <div class="form-group">
                                                      <label>Célular (opcional)</label>
                                                      <div class="input-group">
                                                         <input placeholder="(+503)8765-4321" type="text"
                                                            class="form-control" id="celular" name="celular">
                                                      </div>
                                                      <!-- /.input group -->
                                                   </div>
                                                </div>
                                             </div>
                                          </div>
                                          <div class="col-sm-3">
                                             <div class="form-group">
                                                <div class="kv-avatar">
                                                   <label>Foto de Perfil (opcional)</label>
                                                   <div class="file-loading">
                                                      <input id="fotoCliente" name="fotoCliente" type="file">
                                                   </div>
                                                </div>
                                                <!-- /.input group -->
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <!-- END timeline item -->
                              <!-- timeline item -->
                              <div>
                                 <i class="fas fa-image bg-green"></i>
                                 <div class="timeline-item">
                                    <h3 class="timeline-header no-border">
                                       <a href="#">Documentos Personales</a>
                                    </h3>
                                    <div class="timeline-body">
                                       <div class="row">
                                          <div class="col-sm-12">
                                             <label>Subir imagenes del Dui</label>
                                             <div class="file-loading">
                                                <input type="file" multiple name="fotosDocumentos[]"
                                                   id="fotosDocumentos">
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                    <br> <br>
                                    <div class="timeline-footer" style="text-align: right;">
                                       <button name="btnguardarCliente" id="btnguardarCliente"
                                          class="btn btn-info btn-sm" style="color: white">Guardar</button>
                                       <button class="btn btn-danger btn-sm" style="color: white">Cancelar</button>
                                    </div>
                                 </div>
                              </div>
                              <!-- END timeline item -->
                           </div>
                           <!-- END timeline item -->
                        </div>
                     </div>
                  </div>
               </form>
            </section>
         </div>
      </div><!-- End Blog Page -->
   </main><!-- End #main -->

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

                        <p>Siguenos en todas nuestras redes sociales para estar al tanto de todas nuestras promociones y
                           productos</p>
                        <div class="footer-icons">
                           <ul>
                              <li>
                                 <a href="#"><i class="fa fa-facebook"></i></a>
                              </li>
                              <li>
                                 <a href="#"><i class="fa fa-twitter"></i></a>
                              </li>
                              <li>
                                 <a href="#"><i class="fa fa-google"></i></a>
                              </li>
                              <li>
                                 <a href="#"><i class="fa fa-pinterest"></i></a>
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
                           Tambien puedes contactarnos de las siguiente manera
                        </p>
                        <div class="footer-contacts">
                           <p><span>Tel:</span>+(503) 7841-1184</p>
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

                           <p><span>Lunes-Viernes</span> (8am-5:30pm)</p>
                           <p><span>Sábados</span> (8am-12:30pm)</p>
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
   <!-- preloader -->
   <div id=""></div>

   <!-- Vendor JS Files -->
   <script src="assets/vendor/jquery/jquery.min.js"></script>
   <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
   <script src="assets/vendor/php-email-form/validate.js"></script>
   <script src="assets/vendor/appear/jquery.appear.js"></script>
   <script src="assets/vendor/knob/jquery.knob.js"></script>
   <script src="assets/vendor/parallax/parallax.js"></script>
   <script src="assets/vendor/wow/wow.min.js"></script>
   <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
   <script src="assets/vendor/nivo-slider/js/jquery.nivo.slider.js"></script>
   <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
   <script src="assets/vendor/venobox/venobox.min.js"></script>

   <!-- Template Main JS File -->
   <script src="assets/js/main.js"></script>
   <script src="assets/js/conf.js"></script><!-- COLOCAR JS ADICIONALES ACA ABAJO -->
   <script src="assets/vendor/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
   <script src="assets/vendor/jquery-validation/additional-methods.min.js" type="text/javascript"></script>
   <script src="assets/vendor/subir-foto/js/plugins/piexif.js" type="text/javascript"></script>
   <script src="assets/vendor/subir-foto/js/plugins/sortable.js" type="text/javascript"></script>
   <script src="assets/vendor/subir-foto/js/fileinput.js" type="text/javascript"></script>
   <script src="assets/vendor/subir-foto/js/locales/es.js" type="text/javascript"></script>
   <script src="assets/vendor/subir-foto/themes/fas/theme.js" type="text/javascript"></script>
   <script src="assets/vendor/inputmask/min/jquery.inputmask.bundle.min.js"></script>
   <script src="assets/vendor/sweetalert2/sweetalert2.js"></script>
   <script src="assets/vendor/datatables/jquery.dataTables.min.js"></script>
   <script src="assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
   <script src="assets/vendor/select2/js/select2.full.min.js"></script>
   <script src="assets/vendor/asiento-bus/js/jquery.seat-charts.js"></script>
   <script src="assets/js/controladores/client/registro-cliente.js"></script>

</body>

</html>