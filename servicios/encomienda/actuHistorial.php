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
            <div class="col-md-4">
                <div class="timeline">
                    <!-- timeline item -->
                    <div id="titulo">
                        <i class="fas fa-box-open bg-green"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">Registro de información</a></h3>

                            <div class="timeline-body">
                                <form id="informacion-form" name="register-form" onsubmit="return false">
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group multiple-form-group input-group">
                                                <label>Título</label>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" name="titulo_actu"
                                                        id="titulo_actu" placeholder="Digite título">
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <label>Fecha</label>
                                            <div class="input-group">
                                                <input type="date" name="fecha_actu" id="fecha_actu"
                                                    class="form-control" disabled="true">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <label>Hora</label>
                                                <div class="input-group">
                                                    <div class="input-group clockpicker" data-autoclose="true">
                                                        <input type="text" id="hora_actu" name="hora_actu"
                                                            class="form-control" />
                                                    </div>


                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <div class="input-group">
                                                    <button name="btn-informacion" id="btn-informacion"
                                                        class="btn btn-info btn-sm"
                                                        style="color: white">Guardar</button>
                                                    <div id="entregar-div">
                                                        <button name="btn-entregar" id="btn-entregar"
                                                            class="btn btn-warning btn-sm"
                                                            style="color: white">Entregar</button>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>



                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- END timeline item -->

                    <!-- timeline item -->
                    <div id="titulo">
                        <i class="fas fas fa-box-open bg-green"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">Historial de información</a></h3>

                            <div class="timeline-body" id="historias">


                            </div>
                        </div>

                    </div>
                    <!-- END timeline item -->
                </div>

            </div>
            <div class="col-md-8">
                <div class="timeline">
                    <!-- timeline item -->
                    <div id="formulario">
                        <i class="fas fa-box-open bg-green"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">Datos de Origen</a></h3>

                            <div class="timeline-body">
                                <form id="datosOrigen-form" name="register-form" onsubmit="return false">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group multiple-form-group input-group">
                                                <label class="text-success">Cliente</label>
                                                <div class="input-group">
                                                    <label id="nombre_cliente"></label>
                                                </div>
                                                <div class="input-group">
                                                    <input type="hidden" class="form-control" name="cliente"
                                                        id="cliente" disabled="true">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="text-success">Teléfono</label>
                                            <div class="input-group">
                                                <label id="telefono"></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="text-success">Ciudad</label>
                                                <div class="input-group">
                                                    <label id="ciudad"></label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="text-success">Código postal</label>
                                                <div class="input-group">
                                                    <label id="codigo"></label>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                    <div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- END timeline item -->
                    <!-- timeline item -->
                    <div id="formulario">
                        <i class="fas fa-box-open bg-green"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header"><a href="#">Datos de Destino</a></h3>

                            <div class="timeline-body">
                                <form id="datosDestino-form" name="register-form" onsubmit="return false">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="form-group multiple-form-group input-group">
                                                <label class="text-success">Nombre Completo</label>
                                                <div class="input-group">
                                                    <label id="cliente_des"></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="text-success">Teléfono</label>
                                            <div class="input-group">
                                                <label id="telefono_des"></label>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="text-success">Ciudad</label>
                                                <div class="input-group">
                                                    <label id="ciudad_des"></label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="text-success">Código postal</label>
                                                <div class="input-group">
                                                    <label id="codigo_des"></label>
                                                </div>

                                            </div>
                                        </div>

                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="text-success">Dirección</label>
                                                <div class="input-group">
                                                    <label id="direccion"></label>
                                                </div>

                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="text-success">Dirección alterna</label>
                                                <div class="input-group">
                                                    <label id="direccion_alterna"></label>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                    </div>
                    <!-- END timeline item -->
                    <!--END timeline item-->
                    <!-- timeline item -->
                    <div id="tabla">
                        <i class="fas fa-user bg-green"></i>
                        <div class="timeline-item">
                            <h3 class="timeline-header no-border"><a href="#">Mostrando Información de productos</a>
                            </h3>
                            <div class="timeline-body">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-3">
                                                <div class="form-group">
                                                    <div class="input-group">
                                                        <input id="porcenaje" type="hidden" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <table id="add-tabla" class="table table-bordered table-hover">
                                            <thead>
                                                <tr style="text-align: center;">
                                                    <th>Producto</th>
                                                    <th>Costo($)</th>
                                                    <th>Cantidad</th>
                                                    <th>Sub Total($)</th>
                                                    <th>Acción</th>
                                                    <th>id</th>
                                                    <th>contador</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>

                                        </table>
                                    </div>



                                </div>
                            </div>
                            <br>
                        </div>

                    </div>
                    <!-- END timeline item -->
                    <!-- /.timeline-label -->
                </div>
                <!-- END timeline item -->
            </div>
        </div>

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