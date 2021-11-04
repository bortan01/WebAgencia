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
      <div class="row">
         <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="section-headline services-head text-center">
               <h2>Flota disponible</h2>
            </div>
         </div>
      </div>
      <br>
      <div class="container">
         <section class="content">
            <form id="flotaAutos" name="flotaAutos" role="form" onsubmit="return false">
               <div class="container">
                  <div class="row" id="contenedorAutos">
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
               <div class="card-solid">
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
                           <h3 name="marca" id="marca"></h3>
                           <h3 class="my-3" name="mode1" id="mode1"></h3>
                           <h3 name="anio" id="anio"></h3>
                           <br>
                           <h6>Categoria del Vehiculo: </h6>
                           <h6 name="categoria" id="categoria"></h6>
                           <hr>
                           <button class="btn btn-primary btn-block mb-3">
                              <h1 style="color:#FFFFFF" name="placa" id="placa"></h1>
                           </button>

                           <div class="card">
                              <div class="card-header">
                                 <h3 class="card-title">Características:</h3>

                                 <div class="card-tools">
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i
                                          class="fas fa-minus"></i>
                                    </button>
                                 </div>
                              </div>
                              <div class="card-body p-0">
                                 <ul class="nav nav-pills flex-column">

                                    <li class="nav-item active">
                                       <a href="#" class="nav-link">
                                          <i class="fas fa-inbox"></i> Puertas
                                          <span class="badge bg-primary float-right">
                                             <h7 name="puerta" id="puerta"></h7>
                                          </span>
                                       </a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="#" class="nav-link">
                                          <i class="fas fa-user-friends"></i> Pasajeros
                                          <span class="badge bg-secondary float-right">
                                             <h7 name="pasajero" id="pasajero"></h7>
                                          </span>
                                       </a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="#" class="nav-link">
                                          <i class="fas fa-tachometer-alt"></i> Kilometraje
                                          <span class="badge bg-warning float-right">
                                             <h7 name="kilometraje" id="kilometraje"></h7>
                                          </span>

                                       </a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="#" class="nav-link">
                                          <i class="fas fa-gas-pump"></i> Tipo de Combustible
                                          <span class="badge bg-info float-right">
                                             <h7 name="combustible" id="combustible"></h7>
                                          </span>
                                       </a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="#" class="nav-link">
                                          <i class="fas fa-car"></i> Transmisión
                                          <span class="badge bg-success float-right">
                                             <h7 name="transmision" id="transmision"></h7>
                                          </span>
                                       </a>
                                    </li>

                                 </ul>
                              </div>
                           </div>
                           <div class="bg-gray py-2 px-3 mt-4">
                              <div class="centrar">
                                 <h3 style="color:#FFFFFF">Precio: $</h3>
                                 <h3 class="mb-0" name="precio" id="precio" style="text-align:center; color:#FFFFFF">
                                 </h3>
                              </div>
                           </div>
                           <div class="mt-4">
                              <button class="btn btn-block btn-success btn-flat"
                                 onclick="location.href='cotizarVehiculo.php'">
                                 <i class="fas fa-cart-plus fa-lg"></i>
                                 Cotizar Vehículo
                              </button>
                           </div>
                        </div>
                     </div>
                     <div class="row mt-4">
                        <nav class="w-100">
                           <div class="nav nav-tabs" id="product-tab" role="tablist">
                              <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab"
                                 href="#product-desc" role="tab" aria-controls="product-desc"
                                 aria-selected="true">Detalles</a>
                              <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab"
                                 href="#product-comments" role="tab" aria-controls="product-comments"
                                 aria-selected="false">Descripción</a>
                              <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab"
                                 href="#product-rating" role="tab" aria-controls="product-rating"
                                 aria-selected="false">Opciones Avanzadas</a>

                           </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                           <div class="tab-pane fade show active" id="product-desc" role="tabpanel"
                              aria-labelledby="product-desc-tab">
                              <p name="detalles" id="detalles"></p>
                           </div>
                           <div class="tab-pane fade" id="product-comments" role="tabpanel"
                              aria-labelledby="product-comments-tab">
                              <p name="descripcion" id="descripcion"></p>
                           </div>
                           <div class="tab-pane fade" id="product-rating" role="tabpanel"
                              aria-labelledby="product-rating-tab">
                              <p name="opcA" id="opcA"></p>
                           </div>

                        </div>

                     </div>
                  </div>

                  <!-- /.card-body -->
               </div>
               <!-- /.card -->
               <div class="modal-footer justify-content-center">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
               </div>

            </section>
         </div>
         <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
   </div>
   <!-- End Modal EDITAR-->
</form>

<script>
let id = localStorage.getItem('id_cliente');
console.log(id);
</script>

<?php include_once('../../layaut/plantilla/footer.php'); ?>
<!-- COLOCAR JS ADICIONALES ACA ABAJO -->
<script src="../../assets/vendor/moment/moment.min.js"></script>
<script src="../../assets/js/controladores/vehiculos/flota-app.js"></script>
<?php include_once('../../layaut/plantilla/cierre.php'); ?>