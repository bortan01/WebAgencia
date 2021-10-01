<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<?php include_once "../../layaut/plantilla/session.php"; ?>s
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />

<link href="../../assets/vendor/subir-foto/css/fileinput.css" media="all" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/css/avatar.css" media="all" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<!-- DataTables -->
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="../../assets/vendor/select2/css/select2.min.css" rel="stylesheet">
<link href="../../assets/vendor/select2/css/miEstilo.css" rel="stylesheet">
<!-- Theme style -->
<?php include_once('../../layaut/plantilla/menu.php'); ?>
<main id="main" style="padding-top: 55px;">
    <!-- ======= Blog Page ======= -->
    <div class="blog-page area-padding">
        <div class="container">
            <!-- Main content -->
            <section class="content">
                <div class="container-fluid">
                    <div class="overlay-wrapper">

                        <!--AQUI COLOCARE MI DISEÑO-->
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1>Cálculo de Encomienda</h1>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>

                        <!-- Main content -->
                        <section class="content">
                            <div class="row">
                                <div class="col-md-12">
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
                                                                    <label>Cliente</label>
                                                                    <div class="input-group">
                                                                        <input disabled="true" type="text" name="cliente" id="cliente" class="form-control" autocomplete="off" placeholder="Cliente">
                                                                        <input type="hidden" name="estado" id="estado" value="Enviado">
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <label>Teléfono</label>
                                                                <div class="input-group">
                                                                    <input disabled="true" type="text" name="telefono" id="telefono" class="form-control" autocomplete="off" placeholder="(503)7232-2345">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Ciudad</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="ciudad" id="ciudad" placeholder="Digite la ciudad de origen">
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Código</label>
                                                                    <input name="codigo" id="codigo" type="text" class="form-control" placeholder="Introduzca el Código postal de origen">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <input name="fecha" id="fecha" type="hidden" class="form-control" placeholder="Introduzca el punto de referencia">
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
                                                                    <label>Nombre Completo</label>
                                                                    <div class="input-group">
                                                                        <input class="form-control" type="text" name="cliente_des" id="cliente_des" placeholder="Digite el nombre">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <label>Teléfono</label>
                                                                <div class="input-group">
                                                                    <input type="text" name="telefono_des" id="telefono_des" class="form-control" autocomplete="off" placeholder="(+___)____-____">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Ciudad</label>
                                                                    <div class="input-group">
                                                                        <input type="text" class="form-control" name="ciudad_des" id="ciudad_des" placeholder="Digite la ciudad de destino">
                                                                    </div>

                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Código</label>
                                                                    <input name="codigo_des" id="codigo_des" type="text" class="form-control" placeholder="Introduzca el Código postal de destino">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Dirección</label>
                                                                    <input name="direccion" id="direccion" type="text" class="form-control" placeholder="Introduzca la Dirección">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-6">
                                                                <div class="form-group">
                                                                    <label>Dirección alterna</label>
                                                                    <input name="direccion_alterna" id="direccion_alterna" type="text" class="form-control" placeholder="Ej: Correo El Salvador ó 2da, av sur, numero 34, barrio centro">
                                                                </div>
                                                            </div>
                                                        </div>

                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- END timeline item -->
                                        <div>
                                            <i class="fas fa-box-open bg-green"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header"><a href="#">Productos</a></h3>

                                                <div class="timeline-body">
                                                    <form id="encomienda-form" name="register-form" onsubmit="return false">
                                                        <div class="row">

                                                            <div class="col-sm-6">
                                                                <div class="form-group multiple-form-group input-group">
                                                                    <label>Producto</label>
                                                                    <div class="input-group">
                                                                        <select name="producto" id="id_producto" class="select2 select2-hidden-accessible form-control" data-placeholder="Seleccione Producto" style="width: 100%;">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label for="cars">Costo($)</label>
                                                                    <input name="costo" id="costo" type="text" disabled class="form-control" placeholder="Costo">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-3">
                                                                <div class="form-group" id="mostrar">

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="timeline-footer" style="text-align: right;">
                                                            <a class="btn btn-info btn-sm" id="agregarTabla" style="color: white">Agregar</a>

                                                        </div>
                                                    </form>
                                                </div>
                                            </div>

                                        </div>
                                        <!-- END timeline item -->
                                        <!-- timeline item -->
                                        <div id="tabla">
                                            <i class="fas fa-user bg-green"></i>
                                            <div class="timeline-item">
                                                <h3 class="timeline-header no-border"><a href="#">Agregando Información</a></h3>
                                                <div class="timeline-body">
                                                    <div class="row">
                                                        <div class="col-sm-12">
                                                            <div class="row">
                                                                <div class="col-sm-3">
                                                                    <div class="form-group">
                                                                        <label>Comision de Agencia (%)</label>
                                                                        <div class="input-group">
                                                                            <input id="porcenaje" type="number" min="1" value="1" class="form-control" id="porcenaje">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <table id="add-tabla" class="table table-bordered table-hover">
                                                                <thead>
                                                                    <tr style="text-align: center;">
                                                                        <th>Producto</th>
                                                                        <th>Costo</th>
                                                                        <th>Cantidad</th>
                                                                        <th>Sub Total</th>
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
                                                    <div class="row">
                                                        <div class="col-md-1 col-md-offset-1"> </div>
                                                        <div class="col-md-3  ">
                                                            <label class="text-primary "> Total de Encomienda: </label>
                                                        </div>
                                                        <div class="col-md-3  ">
                                                            <label id="total" class="text-primary "> $0</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-1 col-md-offset-1"> </div>
                                                        <div class="col-md-3  ">
                                                            <label class="text-success "> Comisión de Agencia: </label>
                                                        </div>
                                                        <div class="col-md-3  ">
                                                            <label id="comision" class="text-success "> $0</label>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-1 col-md-offset-1"> </div>
                                                        <div class="col-md-3  ">
                                                            <label class="text-danger "> Total de cliente: </label>
                                                        </div>
                                                        <div class="col-md-3  ">
                                                            <label id="totalCliente" class="text-danger "> $0</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <br> <br>
                                                <!--****************botones***********-->
                                                <div class="timeline-footer" style="text-align: right;">
                                                    <button class="btn btn-danger btn-sm" style="color: white">Cancelar</button>
                                                </div>
                                                <!--**************fin de los botones*********-->
                                            </div>

                                        </div>
                                        <!-- END timeline item -->
                                        <!-- /.timeline-label -->
                                    </div>
                                    <!-- END timeline item -->
                                </div>
                            </div>
                        </section>

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
<script src="../../assets/vendor/inputmask/jquery.inputmask.js"></script>
<!-- DataTables -->
<script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/vendor/select2/js/select2.full.min.js"></script>

<script type="text/javascript" src="../../assets/js/controladores/encomiendas/producto.js"></script>
<script type="text/javascript" src="../../assets/js/controladores/encomiendas/calculo.js"></script>
<script>
//para la mascara del celular
$(":input").inputmask();
$("#telefono_des").inputmask({
    "mask": "(+999) 9999-9999"
});
</script>

<?php include_once('../../layaut/plantilla/cierre.php'); ?>