<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<!-- DataTables -->
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="../../assets/css/reportes.css" all rel="stylesheet" type="text/css" />
<link href="../../assets/css/imprimir.css" all rel="stylesheet" type="text/css" />

<?php include_once('../../layaut/plantilla/session.php'); ?>
<?php include_once('../../layaut/plantilla/menu.php'); ?>

<main id="main" style="padding-top: 55px;">
    <!-- ======= Blog Page ======= -->
    <div class="blog-page area-padding">
        <div class="container">
            <!-- Main content -->
            <section class="content">

                <div class="container-fluid" id="printDiv">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="page_pdf">
                                <table id="factura_head">
                                    <tr>
                                        <td class="logo_factura">
                                            <div>
                                                <img src="../../assets/img/logo-min.jpg" all rel="stylesheet"
                                                    type="text/css">
                                            </div>
                                        </td>
                                        <td class="info_empresa">
                                            <div>
                                                <span class="h2" name="nombre_a" id="nombre_a"></span>
                                                <p>
                                                <p style="margin: 1px;display:inline;" name="direccion_a"
                                                    id="direccion_a"></p>
                                                <p style="margin: 1px;display:inline:float:right" name="telefono_a"
                                                    id="telefono_a">
                                                </p>
                                                <p name="email_a" id="email_a"></p>
                                                </p>
                                            </div>
                                        </td>
                                    </tr>
                                </table>
                                <table id="factura_cliente">
                                    <tr>
                                        <td class="info_cliente">
                                            <div class="round">
                                                <span class="h3">Datos Generales:</span>
                                                <table class="datos_cliente">
                                                    <thead>
                                                        <tr style="vertical-align: top;">
                                                            <td style="text-align: center;">
                                                                <label style="width: 100%; padding-left: 10px;">Nombre
                                                                    del
                                                                    Tour/Paquete:</label>
                                                                <p name="nombre" id="nombre"></p>
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
                                            <th class="textcenter">Evento</th>
                                            <th class="textcenter">Desde</th>
                                            <th class="textcenter">Hasta</th>
                                        </tr>
                                    </thead>
                                    <tbody id="detalle_productos">
                                    </tbody>
                                </table>
                            </div>
                            <div class="row no-print">
                                <div class="col-md-12">

                                    <button target="_blank" id="doPrint" type="button" class="btn btn-default"><i
                                            class="fas fa-print"></i>
                                        Imprimir</button>

                                    <div id="editor"></div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div><!-- End Blog Page -->
</main><!-- End #main -->
<?php include_once('../../layaut/plantilla/footer.php'); ?>
<!-- COLOCAR JS ADICIONALES ACA ABAJO -->
<script src="../../assets/vendor/jquery-ui/jquery-ui.min.js"></script>
<script src="../../assets/vendor/sweetalert2/sweetalert2.js"></script>

<!-- DataTables -->
<script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/js/controladores/paquete/itinerario.js"></script>
<script src="../../assets/js/controladores/agencia/mostrarInfo.js"></script>
<script src="../../assets/js/imprimir.js"></script>
<?php include_once('../../layaut/plantilla/cierre.php'); ?>