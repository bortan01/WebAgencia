<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous" rel="stylesheet">
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/css/fileinput.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/css/avatar.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/themes/explorer-fas/theme.css" rel="stylesheet" type="text/css" />
<?php include_once('../../layaut/plantilla/menu.php'); ?>

<main id="main" style="padding-top: 40px;">
   <!-- ======= Blog Page ======= -->
   <div class="blog-page area-padding">
      <div class="container">
         <section class="content">
            <form id="formulario_perfil" enctype="multipart/form-data" name="formulario_perfil" role="form">
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
                              <i class="fas fa-image bg-green"></i>
                              <div class="timeline-item">
                                 <h3 class="timeline-header no-border">
                                    <a href="#">Elimine y agrege nuevas imagenes de sus documentos</a>
                                 </h3>
                                 <div class="timeline-body">
                                    <div class="row">
                                       <div class="col-sm-12">
                                          <div class="file-loading">
                                             <input id="kv-explorer" name="foto" type="file" multiple>
                                          </div>
                                       </div>
                                    </div>
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
<script src="../../assets/vendor/jquery-validation/additional-methods.min.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/js/plugins/piexif.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/js/plugins/sortable.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/js/fileinput.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/js/locales/es.js" type="text/javascript"></script>
<script src="../../assets/vendor/subir-foto/themes/fas/theme.js" type="text/javascript"></script>
<script src="../../assets/vendor/inputmask/min/jquery.inputmask.bundle.min.js"></script>
<script src="../../assets/vendor/sweetalert2/sweetalert2.js"></script>
<script src="../../assets/js/controladores/client/updatePhoto.js"></script>
<?php include_once('../../layaut/plantilla/cierre.php'); ?>