<?php include_once "../../layaut/plantilla/session.php";?>
<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous" rel="stylesheet">
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="../../assets/vendor/select2/css/select2.min.css" rel="stylesheet">
<link href="../../assets/vendor/select2/css/miEstilo.css" rel="stylesheet">
<link href="../../assets/vendor/asiento-bus/css/jquery.seat-charts.css" rel=" stylesheet" type="text/css">
<link href="../../assets/vendor/asiento-bus/css/reserva.css" rel=" stylesheet" type="text/css">
<link href="../../assets/vendor/subir-foto/themes/explorer-fas/theme.css" rel="stylesheet" type="text/css" />
<?php include_once('../../layaut/plantilla/menu.php'); ?>

<main id="main" style="padding-top: 40px;">
   <!-- ======= Blog Page ======= -->
   <div class="blog-page area-padding">
      <div class="container">
         <section class="content">
            <form id="miFormulario" name="miFormulario">
               <div class="row">
                  <div class="col-md-12">
                     <div class="overlay-wrapper">
                        <div id="loading" class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                           <div class="text-bold pt-2">Cargando...
                           </div>
                        </div>
                        <div class="timeline">
                           <!-- timeline time label -->
                           <div class="time-label">
                              <span class="bg-red">Realizar Cotización</span>
                           </div>
                           <!-- /.timeline-label -->
                           <!-- timeline item -->
                           <div>
                              <i class="fas fa-umbrella-beach bg-green"></i>
                              <div class="timeline-item">
                                 <!--<span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>-->
                                 <h3 class="timeline-header no-border"><a href="#">Cotización de Paquete</a></h3>
                                 <div class="timeline-body">
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <div class="form-group multiple-form-group input-group">
                                             <label>Describa su paquete ideal</label>
                                             <div class="input-group">
                                                <textarea name="peticion" id="peticion" rows="8"
                                                   style="width: 100%;"></textarea>
                                             </div>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="timeline-footer" style="text-align: right;">
                                    <button name="btnguardar" id="btnguardar" class="btn btn-info btn-sm"
                                       style="color: white">Guardar</button>
                                    <button class="btn btn-danger btn-sm" style="color: white">Cancelar</button>
                                 </div>
                              </div>
                           </div>
                           <!-- END timeline item -->
                        </div>
                     </div>
                  </div>
               </div>
            </form>
         </section>
      </div>
   </div><!-- End Blog Page -->
</main><!-- End #main -->

<?php
include './modalCliente.php';
?>

<?php include_once('../../layaut/plantilla/footer.php'); ?>
<!-- COLOCAR JS ADICIONALES ACA ABAJO -->
<script src="../../assets/vendor/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
<script src="../../assets/vendor/jquery-validation/additional-methods.min.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/js/plugins/piexif.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/js/plugins/sortable.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/js/fileinput.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/js/locales/es.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/themes/fas/theme.js" type="text/javascript"></script>
<script src="../../assets/vendor/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="../../assets/vendor/sweetalert2/sweetalert2.js"></script>
<script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/vendor/select2/js/select2.full.min.js"></script>
<script src="../../assets/vendor/asiento-bus/js/jquery.seat-charts.js"></script>
<script src="../../assets/js/controladores/paquete/cotizar.js"></script>
<?php include_once('../../layaut/plantilla/cierre.php'); ?>