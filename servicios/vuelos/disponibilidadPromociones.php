<?php session_start(); ?>
<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link rel="stylesheet" href="../../assets/vendor/galery/disponibilidad.css">
<?php include_once('../../layaut/plantilla/menu.php'); ?>
<style type="text/css" media="all">
h3,
h6 {
   display: inline;
}

.centrar {

   text-align: center;
}
</style>
<main id="main" style="padding-top: 55px;">

   <!-- ======= Blog Page ======= -->
   <div class="blog-page area-padding">
      <br>
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
               <h2>Promociones</h2>
            </div>
         </div>
      </div>
      <br>

      <div class="container">
         <section class="content">
            <form id="imagenPromociones" name="imagenPromociones" role="form" onsubmit="return false">
               <div class="container">
                  <div class="row" id="contenedorPromociones">
                     <!-- Hover-Fall Efecto-->

                  </div>
               </div>
            </form>
         </section>
      </div>
   </div><!-- End Blog Page -->

</main><!-- End #main -->

<form id="miFormulario" name="miFormulario" role="form" onsubmit="return false">
   <!-- Modal EDITAR-->
   <div class="modal fade" id="modal-editar">
      <div class="modal-dialog modal-lg modal-dialog-centered">
         <div class="modal-content">

            <section class="content">

               <!-- Default box -->
               <div class="card card-solid">
                  <div class="card-body">
                     <div class="row">
                        <div class="col-12 col-sm-6">
                           <div id="imagenGrande" class="col-12">
                           </div>
                           <div id="imagenesPequenas" class="col-12 product-image-thumbs">

                              <div class="product-image-thumb" id="0">

                              </div>
                              <div class="product-image-thumb" id="1">

                              </div>
                              <div class="product-image-thumb" id="2">

                              </div>
                              <div class="product-image-thumb" id="3">

                              </div>
                              <div class="product-image-thumb" id="4">

                              </div>
                              <div class="product-image-thumb" id="5">

                              </div>
                              <div class="product-image-thumb" id="6">

                              </div>
                              <div class="product-image-thumb" id="7">

                              </div>
                              <div class="product-image-thumb" id="8">

                              </div>
                              <div class="product-image-thumb" id="9">

                              </div>
                           </div>
                        </div>
                        <div class="col-12 col-sm-6">

                           <br>
                           <h6>Promoción disponible hasta: </h6>
                           <label name="fechaR" id="fechaR" data-date="" data-date-format="DD MMMM YYYY"></label>
                           <hr>


                           <div class="bg-primary py-2 px-3 mt-4">
                              <div class="centrar">
                                 <h6 style="color:#FFFFFF">Precio por persona: $</h6>
                                 <h6 class="mb-0" name="precioP" id="precioP" style="text-align:center; color:#FFFFFF">
                                 </h6>
                              </div>
                           </div>

                           <div class="card">
                              <div class="card-header">
                                 <h3 class="card-title">Descripción:</h3>

                                 <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                          class="fas fa-minus"></i>
                                    </button>
                                 </div>
                              </div>
                              <div class="card-body p-0">
                                 <ul class="nav nav-pills flex-column">

                                    <li class="nav-item">
                                       <a href="#" class="nav-link">
                                          <i class="fas fa-plane-departure"></i> Saliendo de
                                          <span class="badge bg-warning float-right">
                                             <h7 name="saliendo" id="saliendo"></h7>
                                          </span>

                                       </a>
                                    </li>

                                    <li class="nav-item active">
                                       <a href="#" class="nav-link">
                                          <i class="fas fa-plane-arrival"></i> País
                                          <span class="badge bg-primary float-right">
                                             <h7 name="pais" id="pais"></h7>
                                          </span>
                                       </a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="#" class="nav-link">
                                          <i class="fas fa-map-marked-alt"></i> Lugar de Destino
                                          <span class="badge bg-secondary float-right">
                                             <h7 name="lugard" id="lugard"></h7>
                                          </span>
                                       </a>
                                    </li>

                                    <li class="nav-item">
                                       <a href="#" class="nav-link">
                                          <i class="fas fa-plane"></i> Aerolinea
                                          <span class="badge bg-success float-right">
                                             <h7 name="aerolineav" id="aerolineav"></h7>
                                          </span>

                                       </a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="#" class="nav-link">
                                          <i class="fas fa-suitcase-rolling"></i> Tipo de Clase
                                          <span class="badge bg-danger float-right">
                                             <h7 name="tipoClase" id="tipoClase"></h7>
                                          </span>

                                       </a>
                                    </li>
                                 </ul>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
            </section>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- End Modal EDITAR-->
</form>



<?php include_once('../../layaut/plantilla/footer.php'); ?>
<!-- COLOCAR JS ADICIONALES ACA ABAJO -->
<script src="../../assets/vendor/moment/moment.min.js"></script>
<script src="../../assets/js/controladores/vuelos/disponibilidad-app.js"></script>
<?php include_once('../../layaut/plantilla/cierre.php'); ?>