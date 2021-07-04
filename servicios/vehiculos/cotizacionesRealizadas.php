<?php include_once "../../layaut/plantilla/session.php";?>

<?php include_once('../../layaut/plantilla/cabecera.php'); ?>

<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="../../assets/css/imprimir.css" all rel="stylesheet" type="text/css" />

<link href="../../assets/css/reportes.css" all rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
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
                                        <h3 class="card-title">Cotizaciones de Vehiculos Realizadas</h3>
                                    </div>
                                    <!-- /.card-header -->
                                    <div class="card-body">
                                        <div id="" class="dataTables_wrapper dt-bootstrap4">
                                            <div class="row">
                                                <div class="table-responsive">
                                                    <div class="col-sm-12">
                                                        <table id="tabla_cotizaciones"
                                                            class="table table-bordered table-striped">
                                                            <thead style="text-align: center;">
                                                                <tr>
                                                                    <th>Vehiculo</th>
                                                                    <th>Año</th>
                                                                    <th>Precio ($)</th>
                                                                    <th>Fecha Recogida</th>
                                                                    <th>Fecha Devolución</th>
                                                                    <th>Respuesta</th>
                                                                    <th>Acciones</th>
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
    <!-- Modal Cotizacion Reporte-->
    <div class="modal fade" id="modal-cotizacion">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content">

                <div class="overlay-wrapper">

                    <div class="modal-header">
                        <h4 class="modal-title">Cotización:</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <section class="content">

                                <div class="container-fluid" id="printDiv">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div id="page_pdf">
                                                <table id="factura_head">
                                                    <tr>
                                                        <td class="logo_factura">
                                                            <div>
                                                                <img src="../../assets/img/logo-min.jpg" all
                                                                    rel="stylesheet" type="text/css">
                                                            </div>
                                                        </td>
                                                        <td class="info_empresa">
                                                            <div>
                                                                <span class="h2">Agencia de Viajes Martínez Travels &
                                                                    Tours</span>
                                                                <p>Segunda Avenida Sur, Barrio El Centro, #4D a 150mts
                                                                    del Parquecito Infantil<br>Teléfono: +(503) 2319
                                                                    2338<br>info.ventas@martineztraveltours.com</p>

                                                            </div>
                                                        </td>

                                                    </tr>
                                                </table>
                                                <table id="factura_cliente">
                                                    <tr>
                                                        <td class="info_cliente">
                                                            <div class="round">
                                                                <span class="h3">Datos Generales del Cliente</span>
                                                                <table class="datos_cliente">
                                                                    <thead>
                                                                        <tr>
                                                                            <td>
                                                                                <p> </p>
                                                                                <label>Cliente:</label>
                                                                                <p name="nombreC" id="nombreC">
                                                                                </p>

                                                                            </td>
                                                                            <td><label>DUI:</label>
                                                                                <p name="dui-cliente" id="dui-cliente">
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td>
                                                                                <p> </p>
                                                                                <label>Teléfono:</label>
                                                                                <p name="telefonoC" id="telefonoC"></p>
                                                                            </td>
                                                                            <td><label>Email:</label>
                                                                                <p name="emailC" id="emailC"></p>
                                                                            </td>
                                                                        </tr>
                                                                    </thead>
                                                                </table>
                                                            </div>
                                                        </td>

                                                    </tr>
                                                </table>

                                                <table id="factura_detalle">
                                                    <thead>
                                                        <tr>
                                                            <th class="textcenter">Vehiculo</th>
                                                            <th class="textcenter">Año</th>
                                                            <th class="textcenter">Caracteristicas</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="detalle_productos">

                                                        <tr>
                                                            <td class="textcenter"><label name="nombreVehiculoC"
                                                                    id="nombreVehiculoC"
                                                                    style="font-weight: normal;"></label></td>
                                                            <td class="textcenter"><label name="anioC" id="anioC"
                                                                    style="font-weight: normal;"></label></td>
                                                            <td class="textcenter"><label name="caracteristicasC"
                                                                    id="caracteristicasC"
                                                                    style="font-weight: normal;"></label></td>

                                                        </tr>

                                                    </tbody>

                                                </table>

                                                <table id="factura_detalle">
                                                    <thead>
                                                        <tr>
                                                            <th class="textcenter">Dirección de Recogida</th>
                                                            <th class="textcenter">Fecha</th>
                                                            <th class="textcenter">Hora</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="detalle_productos">

                                                        <tr>
                                                            <td class="textcenter"><label name="direccion_recogidaC"
                                                                    id="direccion_recogidaC"
                                                                    style="font-weight: normal;"></label></td>
                                                            <td class="textcenter"><label name="fechaRecogidaC"
                                                                    id="fechaRecogidaC"
                                                                    style="font-weight: normal;"></label></label></td>
                                                            <td class="textcenter"><label name="HoraRecogidaC"
                                                                    id="HoraRecogidaC"
                                                                    style="font-weight: normal;"></label></label></td>
                                                        </tr>
                                                    </tbody>
                                                </table>

                                                <table id="factura_detalle">
                                                    <thead>
                                                        <tr>
                                                            <th class="textcenter">Dirección de Devolución</th>
                                                            <th class="textcenter">Fecha</th>
                                                            <th class="textcenter">Hora</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody id="detalle_productos">

                                                        <tr>
                                                            <td class="textcenter"><label name="direccion_devolucionC"
                                                                    id="direccion_devolucionC"
                                                                    style="font-weight: normal;"></label>
                                                            </td>
                                                            <td class="textcenter"><label name="fechaDevolucionC"
                                                                    id="fechaDevolucionC"
                                                                    style="font-weight: normal;"></label></td>
                                                            <td class="textcenter"><label name="HoraDevolucionC"
                                                                    id="HoraDevolucionC"
                                                                    style="font-weight: normal;"></label>
                                                            </td>


                                                        </tr>
                                                    </tbody>
                                                </table>



                                                <table id="factura_detalle">

                                                    <tfoot id="detalle_totales">

                                                        <tr>
                                                            <td colspan="3" class="textright"><label>DESCUENTOS
                                                                    (%)</label>
                                                            </td>
                                                            <td class="textcenter"><label name="descuent" id="descuent"
                                                                    style="font-weight: normal;"></label></td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="3" class="textright"><label>TOTAL ($)</label>
                                                            </td>
                                                            <td class="textcenter"><label name="tot" id="tot"
                                                                    style="font-weight: normal;"></label></td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>
                                            <div class="row no-print">
                                                <div class="col-md-12">

                                                    <button target="_blank" id="doPrint" type="button"
                                                        class="btn btn-default"><i class="fas fa-print"></i>
                                                        Imprimir</button>

                                                    <div id="editor"></div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal EDITAR-->
</form>

<?php include_once('../../layaut/plantilla/footer.php'); ?>

<script src="../../assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="../../assets/vendor/sweetalert2/sweetalert2.js"></script>
<!-- DataTables -->
<script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript" src="../../assets/js/imprimir.js"></script>

<script type="text/javascript" src="../../assets/js/controladores/vehiculos/cotizaciones.js"></script>



<?php include_once('../../layaut/plantilla/cierre.php'); ?>