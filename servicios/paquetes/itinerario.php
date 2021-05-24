<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="../../assets/vendor/fullcalendar/main.min.css">
<link rel="stylesheet" href="../../assets/vendor/fullcalendar-daygrid/main.min.css">
<link rel="stylesheet" href="../../assets/vendor/fullcalendar-timegrid/main.min.css">
<link rel="stylesheet" href="../../assets/vendor/fullcalendar-bootstrap/main.min.css">
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
                  <div id="loading" class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                     <div class="text-bold pt-2">Cargando...
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-md-3" style="position: sticky;">
                        <div class="sticky-top mb-3">

                           <!-- .card -->
                           <div class="card">
                              <div class="card-header">
                                 <h4 class="card-title">
                                    Actividades</h4>
                              </div>
                              <div class="card-body">
                                 <!-- the events -->
                                 <div id="external-events">

                                    <div class="checkbox">
                                       <label for="drop-remove">
                                          <input type="checkbox" id="drop-remove" checked="checked"
                                             style="display: none;">
                                          <!--remove external-eventsafter drop-->
                                       </label>
                                    </div>
                                 </div>
                              </div>
                              <!-- /.card-body -->
                           </div>
                           <!-- /.card -->
                           <div class="card">
                              <div class="card-header">
                                 <h3 class="card-title">Otras Actividades</h3>
                              </div>
                              <div class="card-body">
                                 <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                                    <ul class="fc-color-picker" id="color-chooser">
                                       <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a>
                                       </li>
                                       <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a>
                                       </li>
                                       <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a>
                                       </li>
                                    </ul>
                                 </div>
                                 <!-- /btn-group -->
                                 <div class="input-group">
                                    <input id="new-event" type="text" class="form-control"
                                       placeholder="Nombre de la actividad">

                                    <div class="input-group-append">
                                       <button id="add-new-event" type="button" class="btn btn-primary">Agregar</button>
                                    </div>
                                    <!-- /btn-group -->
                                 </div>
                                 <!-- /input-group -->
                                 <br>
                                 <div class="btn-group" style="width: 100%;">

                                    <button style="margin: 5px" type="submit"
                                       class="btn btn-danger float-right">Cancelar</button>
                                    <button style="margin: 5px" id="btnGuardar" type="submit"
                                       class="btn btn-info float-left">Guardar</button>


                                 </div>
                                 <!-- /btn-group -->
                              </div>
                           </div>
                           <!-- /.card -->

                        </div>
                     </div>
                     <!-- /.col -->
                     <div class="col-md-9">
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
                  </div>
                  <!-- /.row -->
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