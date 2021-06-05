<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<?php include_once "../../layaut/plantilla/session.php";?>s
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />

<link href="../../assets/vendor/subir-foto/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/css/avatar.css" media="all" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/themes/explorer-fas/theme.css" media="all" rel="stylesheet"
   type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<!-- DataTables -->
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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

                  <!--AQUI COLOCARE MI DISEÑO-->
                  <div class="row">
                     <div class="col-12">


                        <div class="card">
                           <div class="card-header">
                              <h3 class="card-title">Datos de la Encomienda</h3>
                           </div>
                           <!-- /.card-header -->
                           <div class="card-body">
                              <div id="" class="dataTables_wrapper dt-bootstrap4">
                                 <div class="row">
                                    <div class="col-sm-12">
                                       <table id="tabla_actu-envio" class="table table-bordered table-striped">
                                          <thead style="text-align: center;">
                                             <tr>
                                                <th>Ciudad de origen</th>
                                                <th>Código postal</th>
                                                <th>Fecha</th>
                                                <th>Acciones</th>
                                                <th>estado</th>
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
                                          <!-- /.fin de loading -->

                                       </table>
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


<?php include_once('../../layaut/plantilla/footer.php'); ?>
<!-- PONER SCRIPT ADICIONALES ACA -->
<script src="../../assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="../../assets/vendor/sweetalert2/sweetalert2.js"></script>
<!-- DataTables -->
<script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript" src="../../assets/js/controladores/encomiendas/actu-envio.js"></script>
<?php include_once('../../layaut/plantilla/cierre.php'); ?>