<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link rel="stylesheet" href="../../assets/vendor/galery/disponibilidad.css">
<link rel="stylesheet" href="../../assets/vendor/carrucel-bootstrap/style.css">
<?php include_once('../../layaut/plantilla/menu.php'); ?>

<!-- End Header -->
<main id="main" style="padding-top: 40px;">
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
                                       <div class="col-sm-12">
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
                                                   <label>Dui (opcional)</label>
                                                   <div class="input-group">
                                                      <input placeholder="12345678-9" type="text" class="form-control"
                                                         id="dui" name="dui">
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
                                       </div>
                                    </div>
                                 </div>
                                 <br> <br>
                                 <div class="timeline-footer" style="text-align: right;">
                                    <button name="btnguardarCliente" id="btnguardarCliente" class="btn btn-info btn-sm"
                                       style="color: white">Guardar</button>
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

<?php include_once('../../layaut/plantilla/footer.php'); ?>
<!-- COLOCAR JS ADICIONALES ACA ABAJO -->
<script src="../../assets/vendor/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
<script src="../../assets/vendor/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="../../assets/js/controladores/client/updateInfo.js"></script>
<?php include_once('../../layaut/plantilla/cierre.php'); ?>