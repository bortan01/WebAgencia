<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<?php include_once "../../layaut/plantilla/session.php"; ?>

<!-- ESTILOS ADICIONALES-->
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/select2/css/select2.min.css" rel="stylesheet">
<link href="../../assets/vendor/select2/css/miEstilo.css" rel="stylesheet">
<link rel="../../assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">

<link href="../../assets/css/mdtimepicker.css" rel="stylesheet" type="text/css"> <!-- reloj -->

<style>
#desborde {
   width: 100%;
   overflow: hidden;
   white-space: nowrap;
   text-overflow: ellipsis;
   word-wrap: break-word;
}
</style>

<?php include_once('../../layaut/plantilla/menu.php'); ?>
<main id="main" style="padding-top: 55px;">
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

                  <section class="content-header">
                     <div class="container-fluid">
                        <div class="row mb-2">
                           <div class="col-sm-6">
                              <h1>Cotización de Vehículo</h1>
                           </div>
                        </div>
                     </div><!-- /.container-fluid -->
                  </section>

                  <!-- Main content -->
                  <section class="content">
                     <form id="register-cotizarVehiculo" name="register-form" onsubmit="return false">
                        <div class="row">
                           <div class="col-md-12">
                              <div class="timeline">

                                 <div>
                                    <i class="fas fa-car bg-blue"></i>
                                    <div class="timeline-item">

                                       <h3 class="timeline-header"><a href="#">Datos Generales</a></h3>

                                       <div class="timeline-body">
                                          <div class="row">

                                             <div class="col-sm-7">
                                                <!-- text input -->
                                                <div class="form-group multiple-form-group input-group">
                                                   <label>Cliente</label>
                                                   <div class="input-group">
                                                      <input disabled="true" type="text" name="cliente" id="cliente"
                                                         class="form-control" autocomplete="off" placeholder="Cliente">
                                                   </div>
                                                </div>
                                             </div>


                                             <div class="col-sm-3">
                                                <!-- text input -->
                                                <div class="form-group multiple-form-group input-group">
                                                   <label>Modelo</label>
                                                   <div class="input-group">
                                                      <select name="id_modelo" id="id_modelo"
                                                         class="select2 select2-hidden-accessible form-control"
                                                         data-placeholder="Seleccione" style="width: 100%;">
                                                      </select>
                                                   </div>
                                                </div>
                                             </div>
                                             <div class="col-sm-2">
                                                <div class="form-group">
                                                   <label>Año</label>
                                                   <input type="number" class="form-control" min=2010
                                                      max=<?php echo date("Y"); ?> name="anio" id="anio"
                                                      autocomplete="off">
                                                </div>
                                             </div>

                                             <div class="col-sm-12">
                                                <div class="form-group">
                                                   <label>Características</label>
                                                   <textarea class="textarea" name="caracteristicas"
                                                      id="caracteristicas"
                                                      placeholder="Digite características del Vehículo"
                                                      style="width: 100%; height: 50px; font-size: 16px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>

                                                </div>
                                             </div>

                                             <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                   <label>Dirección de Recogida</label>
                                                   <input type="text" class="form-control" name="direccion_recogida"
                                                      id="direccion_recogida" placeholder="Digite dirección de recogida"
                                                      autocomplete="off">
                                                </div>
                                             </div>
                                             <div class="col-sm-3">
                                                <!-- text input -->
                                                <div class="form-group">
                                                   <label>Fecha de Recogida</label>
                                                   <input type="date" class="form-control" name="fechaRecogida"
                                                      id="fechaRecogida">
                                                </div>
                                             </div>
                                             <div class="col-sm-3">
                                                <label>Hora de Recogida</label>
                                                <div class="input-group clockpicker" data-autoclose="true">
                                                   <input type="text" id="timepicker" name="start" class="form-control"
                                                      value="08:00" />

                                                </div>

                                             </div>

                                             <div class="col-sm-6">
                                                <!-- text input -->
                                                <div class="form-group">
                                                   <label>Dirección de Devolución</label>
                                                   <input type="text" class="form-control" name="direccion_devolucion"
                                                      id="direccion_devolucion"
                                                      placeholder="Digite dirección de devolución" autocomplete="off">
                                                </div>
                                             </div>
                                             <div class="col-sm-3">
                                                <!-- text input -->
                                                <div class="form-group">
                                                   <label>Fecha de Devolución</label>
                                                   <input type="date" class="form-control" name="fechaDevolucion"
                                                      id="fechaDevolucion">
                                                </div>
                                             </div>
                                             <div class="col-sm-3">
                                                <label>Hora de Devolución</label>
                                                <div class="input-group clockpicker" data-autoclose="true">
                                                   <input type="text" id="timepicker2" name="start" class="form-control"
                                                      value="08:00" />
                                                </div>
                                             </div>

                                          </div>
                                          <div class="timeline-footer" style="text-align: right;">
                                             <button name="btnGuardarCotizacionV" id="btnGuardarCotizacionV"
                                                class="btn btn-info btn-sm" style="color: white">Guardar</button>
                                             <a class="btn btn-danger btn-sm" style="color: white">Cancelar</a>
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </form>
                  </section>
               </div><!-- /overlay-wrapper -->
            </div><!-- /.container-fluid -->
         </section>
      </div>
   </div><!-- End Blog Page -->
</main><!-- End #main -->

<?php include_once('../../layaut/plantilla/footer.php'); ?>


<!-- FIN DE SCRIPT PARA REGISTRO DE USUARIO -->
<script src="../../assets/vendor/sweetalert2/sweetalert2.js"></script>
<script src="../../assets/js/mdtimepicker.js"></script> <!-- reloj -->
<script src="../../assets/vendor/select2/js/select2.full.min.js"></script>


<script src="../../assets/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="../../assets/vendor/jquery-validation/additional-methods.min.js"></script>
<script src="../../assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>


<script type="text/javascript" src="../../assets/js/controladores/client/comboUsuario.js"></script>
<script type="text/javascript" src="../../assets/js/controladores/vehiculos/comboModelo.js"></script>

<script type="text/javascript" src="../../assets/js/controladores/vehiculos/insertarCotizacionAuto.js"></script>

<script>
$(function() {
   $('.select2').select2()

   //Initialize Select2 Elements
   $('.select2bs4').select2({
      theme: 'bootstrap4'
   })

   $('.my-colorpicker1').colorpicker()
   //color picker with addon

   $("input[data-bootstrap-switch]").each(function() {
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
   });

   $(document).ready(function() {
      $('#timepicker').mdtimepicker(); //Initializes the time picker
   });

   $(document).ready(function() {
      $('#timepicker2').mdtimepicker(); //Initializes the time picker
   });

})
</script>
<script>
$(function() {
   var hoy = new Date();
   var dd = hoy.getDate();
   var mm = hoy.getMonth() + 1;
   var yyyy = hoy.getFullYear();
   if (dd < 10) {
      dd = '0' + dd
   }
   if (mm < 10) {
      mm = '0' + mm
   }

   hoy = yyyy + '-' + mm + '-' + dd;
   document.getElementById("fechaRecogida").setAttribute("min", hoy);
   document.getElementById("fechaDevolucion").setAttribute("min", hoy);
});
</script>

<?php include_once('../../layaut/plantilla/cierre.php'); ?>