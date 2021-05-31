<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />

<link href="../../assets/vendor/subir-foto/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/css/avatar.css" media="all" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/themes/explorer-fas/theme.css" media="all" rel="stylesheet"
    type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">

<!-- Theme style -->
<?php include_once('../../layaut/plantilla/menu.php'); ?>
<main id="main" style="padding-top: 40px;">
   <!-- ======= Blog Page ======= -->
   <div class="blog-page area-padding">
      <div class="container">
         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">
               <div class="overlay-wrapper">
                  
               </div><!-- /overlay-wrapper -->
            </div><!-- /.container-fluid -->
         </section>
      </div>
   </div><!-- End Blog Page -->
</main><!-- End #main -->

<?php
include './modalCliente.php';
?>

<?php include_once('../../layaut/plantilla/footer.php'); ?>
<!-- PONER SCRIPT ADICIONALES ACA -->
<script src="../../assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="../../assets/vendor/sweetalert2/sweetalert2.js"></script>
<script src="../../assets/vendor/moment/moment.min.js"></script>
<script src="../../assets/vendor/fullcalendar/main.min.js"></script>
<script src="../../assets/vendor/fullcalendar-daygrid/main.min.js"></script>
<script src="../../assets/vendor/fullcalendar-timegrid/main.min.js"></script>
<script src="../../assets/vendor/fullcalendar-interaction/main.min.js"></script>
<script src="../../assets/vendor/fullcalendar-bootstrap/main.min.js"></script>
<script src='../../assets/vendor/fullcalendar/locales/es.js'></script>
<script src="../../assets/js/controladores/paquete/itinerario.js"></script>
<?php include_once('../../layaut/plantilla/cierre.php'); ?>