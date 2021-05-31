<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="../../assets/vendor/select2/css/select2.min.css" rel="stylesheet">
<link href="../../assets/vendor/select2/css/miEstilo.css" rel="stylesheet">
<link href="../../assets/vendor/subir-foto/css/fileinput.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/css/avatar.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/themes/explorer-fas/theme.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link rel='stylesheet' type='text/css'
   href='http://localhost/Plantillas/SistemaAgencia/plugins/a/css/fullcalendar.css' />

<?php include_once('../../layaut/plantilla/menu.php'); ?>

<main id="main" style="padding-top: 40px;">
   <!-- ======= Blog Page ======= -->
   <div class="blog-page area-padding">
      <div class="container">
         <section class="content">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-md-1">
                  </div>
                  <!-- /.col -->
                  <div class="col-md-10">
                     <div class="card card-primary">
                        <div class="card-body p-0">
                           <!-- THE CALENDAR -->
                           <div id="calendar"></div>
                        </div>
                        <!-- /.card-body -->
                     </div>
                     <!-- /.card -->
                  </div>
                  <!-- /.col -->
                  <div class="col-md-1">
                  </div>
               </div>
               <!-- /.row -->
            </div><!-- /.container-fluid -->
         </section>

      </div>
   </div><!-- End Blog Page -->
</main><!-- End #main -->

<?php include_once('./modal_eventos.php')?>
<?php include_once('../../layaut/plantilla/footer.php'); ?>
<!-- COLOCAR JS ADICIONALES ACA ABAJO -->
<script src="../../assets/vendor/sweetalert2/sweetalert2.js"></script>
<script src="../../assets/vendor/select2/js/select2.full.min.js"></script>
<script src="../../assets/vendor/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
<script src="../../assets/vendor/jquery-validation/additional-methods.min.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/js/plugins/piexif.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/js/plugins/sortable.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/js/fileinput.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/js/locales/es.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/themes/fas/theme.js" type="text/javascript"></script>
<script src='../../assets/vendor/oldCalendar/js/moment.min.js'></script>
<script src='../../assets/vendor/oldCalendar/js/fullcalendar.min.js'></script>
<script src='../../assets/vendor/oldCalendar/js/locale/es.js'></script>
<script src="../../assets/js/controladores/client/comboUsuario.js"></script>
<script src="../../assets/js/controladores/asesorias/combobox.js"></script>
<script src="../../assets/js/controladores/asesorias/ramas_automaticas.js"></script>
<script src="../../assets/js/controladores/asesorias/preguntas_automaticas.js"></script>
<script src="../../assets/js/controladores/asesorias/insertar-app.js"></script>
<script src="../../assets/js/controladores/asesorias/update-app.js"></script>
<script src="../../assets/js/controladores/asesorias/calendario-app.js"></script>
<script src="../../assets/js/controladores/asesorias/input.js"></script>
<script src="../../assets/js/controladores/asesorias/validar-exist.js"></script>
<script src="../../assets/js/controladores/asesorias/operaciones.js"></script>
<?php include_once('../../layaut/plantilla/cierre.php'); ?>