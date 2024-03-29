<?php include_once "../../layaut/plantilla/session.php"; ?>s
<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous" rel="stylesheet">
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="../../assets/vendor/select2/css/select2.min.css" rel="stylesheet">
<link href="../../assets/vendor/select2/css/miEstilo.css" rel="stylesheet">
<link href="../../assets/vendor/asiento-bus/css/jquery.seat-charts.css" rel=" stylesheet" type="text/css">
<link href="../../assets/vendor/asiento-bus/css/reserva.css" rel=" stylesheet" type="text/css">
<link href="../../assets/vendor/subir-foto/css/fileinput.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/css/avatar.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/themes/explorer-fas/theme.css" rel="stylesheet" type="text/css" />
<?php include_once('../../layaut/plantilla/menu.php'); ?>

<main id="main" style="padding-top: 55px;">
   <!-- ======= Blog Page ======= -->
   <div class="blog-page area-padding">
      <div class="container">
         <div class="row">
            <br>
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="section-headline services-head text-center">
                  <h2>Reservar Tour</h2>
               </div>
            </div>
            <br>
         </div>
         <section class="content">
            <div class="row">
               <div class="col-md-12">
                  <div class="overlay-wrapper">
                     <div id="loadingReservaTur" class="overlay"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                        <div class="text-bold pt-2">Cargando...
                        </div>
                     </div>
                     <div class="timeline">
                        <!-- timeline item -->
                        <div>
                           <i class="fas fa-shuttle-van bg-red"></i>
                           <div class="timeline-item">
                              <!--<span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>-->
                              <h3 class="timeline-header no-border"><a href="#">Opciones de Asientos</a></h3>
                              <div class="timeline-body">
                                 <div class="row">
                                    <div class="col-sm-4">
                                       <div class="form-group multiple-form-group input-group">
                                          <label>Seleccione su asiento</label>
                                          <div class="input-group">
                                             <select id="comboAsiento" name="comboAsiento"
                                                class="select2 select2-hidden-accessible form-control"
                                                data-placeholder="Seleccione su Asiento" style="width: 100%;">
                                             </select>
                                          </div>
                                       </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <div class="form-group">
                                          <label>Precio ($)</label>
                                          <div class="input-group">
                                             <input type="number" min="0" class=" form-control" disabled="true"
                                                name="costoPasaje" id="costoPasaje">
                                          </div>
                                          <!-- /.input group -->
                                       </div>
                                    </div>
                                    <div class="col-sm-4">
                                       <div class="form-group">
                                          <label>Cantidad</label>
                                          <div class="input-group">
                                             <input type="number" min="0" class=" form-control" value="1"
                                                name="cantidadAsientos" id="cantidadAsientos">
                                          </div>
                                          <!-- /.input group -->
                                       </div>
                                    </div>

                                 </div>

                              </div>
                              <div class="timeline-footer">
                                 <div class="row">
                                    <div class="col-md-1 col-md-offset-1"> </div>
                                    <div class="col-md-3  ">
                                       <label class="text-success ">Cupos Disponibles</label>
                                    </div>
                                    <div class="col-md-3  ">
                                       <label id="cupos" class="text-success "> 0</label>
                                    </div>
                                 </div>
                                 <div style="text-align: right;">
                                    <button id="btnAgregarAsiento" class="btn btn-info btn-sm"
                                       style="color: white">Agregar</button>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div>
                           <i class="fas fa-list bg-green"></i>
                           <div class="timeline-item">
                              <!--<span class="time"><i class="fas fa-clock"></i> 27 mins ago</span>-->
                              <h3 class="timeline-header"><a href="#">Detalle</a>
                              </h3>
                              <div class="timeline-body">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <table id="tablaAsientos" class="table table-bordered table-hover">

                                          <thead>
                                             <tr style="text-align: center;">
                                                <th>id</th>
                                                <th>Tipo de Asiento</th>
                                                <th>Costo ($)</th>
                                                <th>Cantidad</th>
                                                <th>SubTotal</th>
                                                <th>Eliminar</th>

                                             </tr>
                                          </thead>
                                          <tbody style="text-align: center;">

                                          </tbody>

                                       </table>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-1 col-md-offset-1"> </div>
                                    <div class="col-md-3  ">
                                       <label class="text-primary "> Total de Reserva: </label>
                                    </div>
                                    <div class="col-md-3  ">
                                       <label id="totalPago" class="text-primary "> $0</label>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-1 col-md-offset-1"> </div>
                                    <div class="col-md-3  ">
                                       <label class="text-danger "> Asientos a Reservar</label>
                                    </div>
                                    <div class="col-md-3  ">
                                       <label id="asientosAReservar" class="text-danger"> 0</label>
                                    </div>
                                 </div>

                              </div>
                           </div>
                        </div>
                        <!-- END timeline item -->
                        <!-- timeline item -->
                        <div id="item_asiento">
                           <i class="fas fa-chair bg-yellow"></i>
                           <div class="timeline-item">
                              <!--<span class="time"><i class="fas fa-clock"></i> 5 mins ago</span>-->
                              <h3 class="timeline-header no-border"><a href="#">Ubicación de Asientos</a></h3>
                              <div class="timeline-body">
                                 <div class="row" id="dibujoAsientos">
                                    <!-- <div class="offset-md-1"></div> -->
                                    <div class="col-sm-6">
                                       <div id="seat-map" class="float-right">
                                          <div class="front-indicator">Frontal</div>
                                       </div>
                                    </div>
                                    <div class="col-sm-4 flex flex-column-reverse flex-sm-column">
                                       <div id="legend"></div>
                                    </div>
                                 </div>
                              </div>
                              <div style="display: none;" class="col-sm-6">
                                 <!-- text input -->
                                 <div class="hidden">
                                    <label name="detalle" id="detalle">Reservo un Paquete Turístico</label>
                                 </div>
                              </div>
                              <div class="timeline-footer" style="text-align: right;">
                                 <button name="btnguardarReserva" id="btnguardarReserva" class="btn btn-info btn-sm"
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
         </section>
      </div>
   </div><!-- End Blog Page -->
</main><!-- End #main -->

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
<script src="../../assets/js/controladores/tour/reserva-tour.js"></script>
<?php include_once('../../layaut/plantilla/cierre.php'); ?>