<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<?php include_once "../../layaut/plantilla/session.php"; ?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/select2/css/select2.min.css" rel="stylesheet">
<link href="../../assets/vendor/select2/css/miEstilo.css" rel="stylesheet">
<link rel="../../assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link rel="stylesheet" href="../../assets/vendor/daterangepicker/daterangepicker.css">
<link href="../../assets/css/mdtimepicker.css" rel="stylesheet" type="text/css"> <!-- reloj -->
<link rel="stylesheet" href="../../assets/vendor/icheck-bootstrap/icheck-bootstrap.min.css">


<style>
#desborde {
   width: 100%;
   overflow: hidden;
   white-space: nowrap;
   text-overflow: ellipsis;
   word-wrap: break-word;
}

.add-margin {
   margin-right: 600px
}
</style>


<!-- Theme style -->
<?php include_once('../../layaut/plantilla/menu.php'); ?>
<main id="main" style="padding-top: 55px;">
   <!-- ======= Blog Page ======= -->
   <div class="blog-page area-padding">
      <div class="container">
         <!-- Main content -->
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1>Cotizar Hotel</h1>
                  </div>
               </div>
            </div><!-- /.container-fluid -->
         </section>

         <!-- Main content -->
         <section class="content">
            <div class="overlay-wrapper">
               <div id="loading" class="overlay" style="height: 130%;"><i class="fas fa-3x fa-sync-alt fa-spin"></i>
                  <div class="text-bold pt-2">Cargando...
                  </div>
               </div>
               <form id="register-cotizarv" name="register-form" onsubmit="return false">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="timeline">
                           <div>
                              <i class="fas fa-user bg-blue"></i>
                              <div class="timeline-item">
                                 <h3 class="timeline-header"><a href="#">Datos Generales</a></h3>
                                 <div class="timeline-body">
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <!-- text input -->
                                          <div class="form-group multiple-form-group input-group">
                                             <label>Cliente</label>
                                             <div class="input-group">
                                                <input disabled="true" type="text" name="cliente" id="cliente"
                                                   class="form-control" autocomplete="off" placeholder="Cliente">
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12">
                                          <!-- text input -->
                                          <div class="form-group multiple-form-group input-group">
                                             <label>Hotel</label>
                                             <div class="input-group">
                                                <select name="id_hotel" id="comboHotel"
                                                   class="select2 select2-hidden-accessible form-control"
                                                   data-placeholder="Seleccione" style="width: 100%;">
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-12">
                                          <div class="form-group">
                                             <label for="cars">Fecha de Entrada y Salida</label>
                                             <div class="input-group">
                                                <input class=" form-control" name="fecha_salida" id="fecha_salida">
                                             </div>
                                          </div>
                                       </div>

                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div>
                              <i class="fas fa-bed bg-green"></i>
                              <div class="timeline-item">
                                 <h3 class="timeline-header no-border"><a href="#">Habitaciones:</a></h3>
                                 <div class="timeline-body">
                                    <div class="row">

                                       <div class="col-sm-12">
                                          <div class="form-group">
                                             <label>Descripción de Habitaciones:</label>
                                             <textarea class="form-control" rows="4" id="descripcion_habitacion"
                                                name="descripcion_habitacion"
                                                placeholder="Digitar aqui como desea la organización de camas en las habitaciones que esta solicitando..."></textarea>
                                          </div>
                                       </div>
                                    </div>

                                 </div>
                              </div>
                           </div>
                           <div>
                              <i class="fas fa-comments bg-yellow"></i>
                              <div class="timeline-item">
                                 <h3 class="timeline-header"><a href="#">Servicios Adicionales</a></h3>
                                 <div class="timeline-body">
                                    <div class="row">
                                       <div class="col-sm-7">
                                          <div class="form-group">
                                             <label>Servicios Adicionales</label>
                                             <div class="select2-danger">
                                                <select class="select2" multiple="multiple" name="opc_avanzadas"
                                                   id="opc_avanzadas" data-placeholder="Seleccione"
                                                   data-dropdown-css-class="select2-danger" style="width: 100%;">
                                                   <option>Vista al Jardín</option>
                                                   <option>Aire acondicionado</option>
                                                   <option>Baño en suite</option>
                                                   <option>TV de pantalla plana</option>
                                                   <option>Wifi gratis</option>
                                                   <option>Artículos de tocador gratuitos</option>
                                                   <option>Baño en suite</option>
                                                   <option>Ducha</option>
                                                   <option>Caja fuerte</option>
                                                   <option>Enchufe cerca de la cama</option>
                                                   <option>Juegos de mesa/rompecabezas</option>
                                                </select>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="col-sm-4">
                                          <!-- text input -->
                                          <div class="form-group">
                                             <label>Nuevo Opción</label>
                                             <input type="text" class="form-control" name="insertarOpcion"
                                                id="insertarOpcion" placeholder="Insertar Nueva Opcion"
                                                autocomplete="off">
                                          </div>
                                       </div>
                                       <div class="col-sm-1">
                                          <br>
                                          <span class="input-group-btn">
                                             <button type="button" class="btn btn-success btn-add" name="agregarOpcion"
                                                id="agregarOpcion" style="margin-top: 10px; width: 100%;"
                                                onclick="OpcAvanzada()">+</button>
                                          </span>
                                       </div>
                                    </div>

                                 </div>

                                 <div class="timeline-footer" style="text-align: right;">
                                    <button name="btnGuardarCotizacion" id="btnGuardarCotizacion"
                                       class="btn btn-info btn-sm" style="color: white">Guardar</button>
                                    <a class="btn btn-danger btn-sm" style="color: white">Cancelar</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </form>
            </div>
         </section>
      </div>
   </div><!-- End Blog Page -->
</main><!-- End #main -->


<?php include_once('../../layaut/plantilla/footer.php'); ?>
<!-- PONER SCRIPT ADICIONALES ACA -->

<script src="../../assets/vendor/sweetalert2/sweetalert2.js"></script>
<script src="../../assets/js/mdtimepicker.js"></script> <!-- reloj -->
<script src="../../assets/vendor/select2/js/select2.full.min.js"></script>

<script src="../../assets/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="../../assets/vendor/jquery-validation/additional-methods.min.js"></script>
<script src="../../assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<script src="../../assets/vendor/moment/moment.min.js"></script>
<script src="../../assets/vendor/daterangepicker/daterangepicker.js">
</script>
<script src="../../assets/js/controladores/vuelos/insertarCotizacion.js"></script>


<script>
$(function() {
   $('.select2').select2()

   //Initialize Select2 Elements
   $('.select2bs4').select2({
      theme: 'bootstrap4'
   })


})
</script>

<script>
function OpcAvanzada() {
   let x = $("#insertarOpcion").val();
   let seleccion = $("<option></option>").val(x).text(x);
   $("#opc_avanzadas").append(seleccion).trigger('change');
}
</script>









<?php include_once('../../layaut/plantilla/cierre.php'); ?>