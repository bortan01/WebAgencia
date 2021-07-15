<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous" rel="stylesheet">
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/datatables-bs4/css/dataTables.bootstrap4.min.css" rel="stylesheet">
<link href="../../assets/vendor/select2/css/select2.min.css" rel="stylesheet">
<link href="../../assets/vendor/select2/css/miEstilo.css" rel="stylesheet">
<link href="../../assets/vendor/subir-foto/css/fileinput.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/css/avatar.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/themes/explorer-fas/theme.css" rel="stylesheet" type="text/css" />
<?php include_once('../../layaut/plantilla/menu.php'); ?>


<main id="main" style="padding-top: 55px;">
    <!-- ======= Blog Page ======= -->
    <div class="blog-page area-padding">
        <div class="container">
            <!-- Main content -->
            <section class="content">
                <form id="register-reserva" name="register-form" onsubmit="return false">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="timeline">
                                <!-- timeline time label -->
                                <div class="time-label">
                                    <span class="bg-red">Información</span>
                                </div>
                                <!-- /.timeline-label -->
                                <!-- timeline item -->
                                <div>
                                    <i class="fas fa-users bg-gradient-blue"></i>
                                    <div class="timeline-item">
                                        <!--<span class="time"><i class="fas fa-clock"></i> 12:05</span>-->
                                        <h3 class="timeline-header"><a href="#">Datos Generales:</a></h3>

                                        <div class="timeline-body">
                                            <div class="row">
                                                <div class="col-sm-11">
                                                    <div class="form-group multiple-form-group input-group">
                                                        <label>Seleccione Cliente</label>
                                                        <div class="input-group">
                                                            <select name="comboUsuario" id="comboUsuario" class="select2 select2-hidden-accessible form-control" data-placeholder="Seleccione" style="width: 100%;">
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-1">
                                                    <br>
                                                    <span class="input-group-btn">
                                                        <button type="button" class="btn btn-success btn-add" data-toggle="modal" data-target="#modalAgregarCliente" style="margin-top: 10px; width: 100%;">+</button>
                                                    </span>
                                                </div>

                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <!-- END timeline item -->

                                <!-- timeline item -->
                                <div id="formulario">
                                    <i class="fas fa-calendar-alt bg-green"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><a href="#">Opciones Adicionales</a></h3>

                                        <div class="timeline-body">
                                            <form id="datosGenerales-form" name="register-form" onsubmit="return false">
                                                <div class="row">

                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="cars">Dirección de Recogida</label>
                                                            <input name="direccionR" id="direccionR" type="text" class="form-control" placeholder="Digite la dirección de recogida">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group">
                                                            <label for="cars">Dirección de Devolución</label>
                                                            <input name="direccionD" id="direccionD" type="text" class="form-control" placeholder="Digite la dirección de devolución">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="form-group">
                                                            <label for="cars">Fecha y Hora</label>
                                                            <div class="input-group">
                                                                <input class=" form-control" name="fecha_hora" id="fecha_hora">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="form-group multiple-form-group input-group">
                                                            <label>Seleccione los Servicios Adicionales</label>
                                                            <div class="input-group">
                                                                <select name="comboServicio" id="comboServicio" class="select2 select2-hidden-accessible form-control" data-placeholder="Seleccione" style="width: 100%;">
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="cars">Costo($)</label>
                                                            <input name="costo" id="costo" type="text" class="form-control" placeholder="Costo" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-3">
                                                        <div class="form-group">
                                                            <label for="cars">Cantidad</label>
                                                            <input name="cantidad" id="cantidad" type="number" min="1" value="1" class="form-control" placeholder="Cantidad">
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
                                <div id="tabla-servicios">
                                    <i class="fas fa-clipboard-list bg-red"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header no-border"><a href="#">Agregando Información</a></h3>
                                        <div class="timeline-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div id="adicionados"></div>
                                                    <table id="add-tablaR" class="table table-bordered table-hover">
                                                        <thead>
                                                            <tr style="text-align: center;">
                                                                <th>Servicio</th>
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
                                                    <label class="text-primary "> Alquiler de Vehiculo: </label>
                                                </div>
                                                <div class="col-md-3  ">
                                                    <label id="totalVehiculo" class="text-primary "> $0</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1 col-md-offset-1"> </div>
                                                <div class="col-md-3  ">
                                                    <label class="text-success "> Otros Servicios: </label>
                                                </div>
                                                <div class="col-md-3  ">
                                                    <label id="totalServicios" class="text-success "> $0</label>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-1 col-md-offset-1"> </div>
                                                <div class="col-md-3  ">
                                                    <label class="text-danger "> Total de cliente: </label>
                                                </div>
                                                <div class="col-md-3  ">
                                                    <label id="totalCliente" class="text-danger "> $0</label>
                                                    <input type="hidden" id="emergencia">
                                                </div>
                                            </div>
                                        </div>
                                        <br> <br>
                                        <div class="timeline-footer" style="text-align: right;">
                                            <button name="btnGuardar" id="btnGuardar" class="btn btn-info btn-sm" style="color: white">Guardar</button>
                                            <button class="btn btn-danger btn-sm" style="color: white">Cancelar</button>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <!-- END timeline item -->
                        </div>
                    </div>
                </form>
            </section>
        </div>
    </div><!-- End Blog Page -->
</main><!-- End #main -->


<?php
include '../paquetes/modalCliente.php';
?>


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
<script src="../../assets/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="../../assets/vendor/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../assets/vendor/select2/js/select2.full.min.js"></script>

<script src="../../assets/js/controladores/client/comboUsuario.js"></script>
<script src="../../assets/js/controladores/vehiculos/comboServicio.js"></script>
<script src="../../assets/js/controladores/vehiculos/reservaVehiculo.js"></script>

<script src="./registro-cliente.js" type="text/javascript"></script>
<?php include_once('../../layaut/plantilla/cierre.php'); ?>