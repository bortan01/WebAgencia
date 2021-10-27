<?php include_once "../../layaut/plantilla/session.php"; ?>
<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<!-- DataTables -->
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<!-- PARA EL DIBUJO DEL BUS -->
<link href="../../assets/vendor/asiento-bus/css/jquery.seat-charts.css" rel=" stylesheet" type="text/css">
<link href="../../assets/vendor/asiento-bus/css/reserva.css" rel=" stylesheet" type="text/css">

<!-- Theme style -->
<?php include_once('../../layaut/plantilla/menu.php'); ?>


<style>
table.dataTable tbody td {
   vertical-align: inherit;
}
</style>

<main id="main" style="padding-top: 55px;">
   <!-- ======= Blog Page ======= -->
   <div class="blog-page area-padding">
      <div class="container">
         <div class="row">
            <br>
            
            <br>
         </div>
         <!-- Main content -->
         <section class="content">
            <div class="container-fluid">
               <div class="overlay-wrapper">

                  <!--AQUI COLOCARE MI DISEÑO-->
                  <div class="row">
                     <div class="col-12">


                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Solicitudes de Paquetes</h3>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div id="" class="dataTables_wrapper dt-bootstrap4">
                                 <div class="row">
                                    <div class="table-responsive">
                                       <div class="col-sm-12">
                                          <table id="tabla_historial" class="table table-bordered table-striped">
                                             <thead style="text-align: center;">
                                                <tr>
                                                   <th>Fecha de Petición</th>
                                                   <th>Peticiónn</th>
                                                   <th>Respuesta</th>
                                                </tr>
                                             </thead>
                                             <!-- /.inicio de loading -->
                                             <div class="overlay-wrapper">
                                                <div id="loading" class="overlay"><i
                                                      class="fas fa-3x fa-sync-alt fa-spin"></i>

                                                   <div class="text-bold pt-2">Cargando...
                                                   </div>
                                                </div>
                                                <tbody id="tableBody" style="text-align: center;">
                                                </tbody>
                                             </div>
                                             <!--/.fin de loading -->
                                          </table>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                     </div>
                     <!-- /.col -->
                  </div>
                  <!-- /.row -->

                  <!--AQUI COLOCARE MI DISEÑO FIN-->

               </div><!-- /overlay-wrapper -->
            </div><!-- /.container-fluid -->
         </section>
      </div>
   </div><!-- End Blog Page -->
</main><!-- End #main -->


<form id="miFormulario" name="miFormulario" role="form" onsubmit="return false">
   <!-- Modal EDITAR-->
   <div class="modal fade" id="modal-editar">
      <div class="modal-dialog modal-xl modal-dialog-centered">
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

                           <div class="py-2 px-3 mt-4" style="background-color: #0069d9; color:white">
                              <div class="centrar">
                                 <h3 style="color: white;text-align: center;" class="mb-0" name="titulo" id="titulo">
                                 </h3>
                              </div>
                           </div>
                           <div class="card">
                              <div class="card-header">
                                 <h3 class="card-title">Datos Basico:</h3>

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
                                          <i class="far fa-calendar-alt"></i> Fecha de viaje
                                          <span class="badge bg-primary float-right">
                                             <h7 name="fecha" id="fecha"></h7>
                                          </span>
                                       </a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="#" class="nav-link">
                                          <i class="fas fa-phone"></i> Teléfono Agencia
                                          <span class="badge bg-info float-right">
                                             <h7 name="combustible" id="combustible">2319-2338 /
                                                2312-0381</h7>
                                          </span>
                                       </a>
                                    </li>
                                    <li class="nav-item">
                                       <a href="#" class="nav-link">
                                          <i class="fab fa-whatsapp"></i> Whatsapp
                                          <span class="badge bg-red float-right">
                                             <h7 name="transmision" id="transmision">7841-1184 /
                                                7602-2242 </h7>
                                          </span>
                                       </a>
                                    </li>

                                 </ul>
                              </div>
                           </div>
                           <div class="mt-4">
                              <button class="btn btn-block btn-success btn-flat" id="btnReservar" name="btnReservar">
                                 <i class="nav-icon fas fa-map-marked-alt"></i>
                                 Ver Itinerario
                              </button>
                           </div>
                        </div>
                     </div>
                     <div class="row mt-4">
                        <nav class="w-100">
                           <div class="nav nav-tabs" role="tablist">
                              <a class="nav-item nav-link active" data-toggle="tab" href="#tab-descripcion" role="tab"
                                 aria-selected="true">Descripción</a>
                              <a class="nav-item nav-link" data-toggle="tab" href="#tab-incluye" role="tab"
                                 aria-selected="false">Incluye</a>
                              <a class="nav-item nav-link" data-toggle="tab" href="#tab-noIncluye" role="tab"
                                 aria-selected="false">No Incluye</a>
                              <a class="nav-item nav-link" data-toggle="tab" href="#tab-requisito" role="tab"
                                 aria-selected="false"> Requisitos</a>
                              <a class="nav-item nav-link" data-toggle="tab" href="#tab-promocion" role="tab"
                                 aria-selected="false"> Promociones</a>
                              <a class="nav-item nav-link" data-toggle="tab" href="#tab-salida" role="tab"
                                 aria-selected="false">Lugar de Salida</a>
                              <a class="nav-item nav-link" data-toggle="tab" href="#tab-asientos" role="tab"
                                 aria-selected="false">Asientos Seleccionados</a>
                              <a class="nav-item nav-link" data-toggle="tab" href="#tab-sitios" role="tab"
                                 aria-selected="false">Sitios Turísticos</a>
                              <a class="nav-item nav-link" data-toggle="tab" href="#tab-otros" role="tab"
                                 aria-selected="false">Otros Servicios</a>
                           </div>
                        </nav>
                        <div class="tab-content p-3" id="nav-tabContent">
                           <div class="tab-pane fade show active" id="tab-descripcion" role="tabpanel">
                              <p name="descripcion_tur" id="descripcion_tur"></p>
                           </div>
                           <div class="tab-pane fade" id="tab-incluye" role="tabpanel">
                              <div name="incluye" id="incluye"> </div>
                           </div>
                           <div class="tab-pane fade" id="tab-noIncluye" role="tabpanel">
                              <div name="no-incluye" id="no-incluye"> </div>
                           </div>
                           <div class="tab-pane fade" id="tab-asientos" role="tabpanel">
                              <p id="labelCantidad"></p>
                              <div id="seat-map" class="float-right seatCharts-container" tabindex="0"
                                 aria-activedescendant="1_5">
                                 <div class="front-indicator">Frontal</div>
                              </div>
                           </div>
                           <div class="tab-pane fade" id="tab-requisito" role="tabpanel">
                              <div name="requisito" id="requisito"> </div>
                           </div>
                           <div class="tab-pane fade" id="tab-promocion" role="tabpanel">
                              <div name="promocion" id="promocion"> </div>
                           </div>
                           <div class="tab-pane fade" id="tab-salida" role="tabpanel">
                              <div name="salida" id="salida"> </div>
                           </div>
                           <div class="tab-pane fade" id="tab-sitios" role="tabpanel">
                              <div name="sitios" id="sitios"> </div>
                           </div>
                           <div class="tab-pane fade" id="tab-otros" role="tabpanel">
                              <div name="otros" id="otros">

                              </div>
                           </div>
                        </div>

                     </div>
                  </div>

               </div>

         </div>
      </div>

      <!-- /.card-body -->
   </div>
   <!-- /.card -->
</form>

<?php include_once('../../layaut/plantilla/footer.php'); ?>
<!-- PONER SCRIPT ADICIONALES ACA -->
<script src="../../assets/vendor/moment/moment.min.js"></script>
<script src="../../assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="../../assets/vendor/sweetalert2/sweetalert2.js"></script>
<!-- DataTables -->
<script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<!-- BUS -->
<script src="../../assets/vendor/asiento-bus/js/jquery.seat-charts.js"></script>
<script src="../../assets/js/controladores/paquete/solicitudes.js"></script>
<?php include_once('../../layaut/plantilla/cierre.php'); ?>