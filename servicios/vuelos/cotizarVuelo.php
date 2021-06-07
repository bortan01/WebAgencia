<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<?php include_once "../../layaut/plantilla/session.php";?>s
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />

<link rel="../../assets/vendor/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" crossorigin="anonymous">
<link href="../../assets/css/mdtimepicker.css" rel="stylesheet" type="text/css"> <!-- reloj -->

<link rel="stylesheet" href="../../assets/vendor/icheck-bootstrap/icheck-bootstrap.min.css">

<link href="../../assets/vendor/select2/css/select2.min.css" rel="stylesheet">
<link href="../../assets/vendor/select2/css/miEstilo.css" rel="stylesheet">



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
                        <section class="content-header">
                            <div class="container-fluid">
                                <div class="row mb-2">
                                    <div class="col-sm-6">
                                        <h1>Cotizar Vuelo</h1>
                                    </div>
                                </div>
                            </div><!-- /.container-fluid -->
                        </section>

                        <!-- Main content -->
                        <section class="content">
                            <form id="register-cotizarv" name="register-form" onsubmit="return false">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="timeline">

                                            <div>
                                                <i class="fas fa-plane bg-blue"></i>
                                                <div class="timeline-item">

                                                    <h3 class="timeline-header"><a href="#">Datos Generales</a></h3>

                                                    <div class="timeline-body">
                                                        <div class="row">

                                                            <div class="col-sm-12">
                                                                <!-- text input -->
                                                                <div class="form-group multiple-form-group input-group">
                                                                    <label>Cliente</label>
                                                                    <div class="input-group">
                                                                        <select name="id_usuario" id="comboUsuario"
                                                                            class="select2 select2-hidden-accessible form-control"
                                                                            data-placeholder="Seleccione"
                                                                            style="width: 100%;">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-6">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Punto de Partida</label>
                                                                    <input type="text" class="form-control"
                                                                        name="ciudad_partida" id="ciudad_partida"
                                                                        placeholder="Digite nombre del Lugar">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Fecha</label>
                                                                    <input type="date" class="form-control"
                                                                        name="fechaPartida" id="fechaPartida">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Hora de Llegada</label>
                                                                <div class="input-group clockpicker"
                                                                    data-autoclose="true">
                                                                    <input type="text" id="timepicker" name="start"
                                                                        class="form-control" value="08:00" />

                                                                </div>

                                                            </div>

                                                            <div class="col-sm-6">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Punto de Llegada</label>
                                                                    <input type="text" class="form-control"
                                                                        name="ciudad_llegada" id="ciudad_llegada"
                                                                        placeholder="Digite nombre del Lugar">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Fecha</label>
                                                                    <input type="date" class="form-control"
                                                                        name="fechaLlegada" id="fechaLlegada">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <label>Hora de Llegada</label>
                                                                <div class="input-group clockpicker"
                                                                    data-autoclose="true">
                                                                    <input type="text" id="timepicker2" name="start"
                                                                        class="form-control" value="08:00" />

                                                                </div>

                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label>Adultos (+12 años)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                        max="100" name="adultos" id="adultos">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label>Niños (5 a 11 años)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                        max="10" name="ninos" id="ninos">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label>Bebés (0 a 4 años)</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                        max="3" name="bebes" id="bebes">
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-3">
                                                                <div class="form-group">
                                                                    <label>Cantidad de Maletas</label>
                                                                    <input type="number" class="form-control" min="0"
                                                                        max="3" name="maletas" id="maletas">
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-12">
                                                                <div class="form-group">
                                                                    <label>*En caso que el bebe viaje solo, favor
                                                                        detallarlo</label>
                                                                    <textarea class="textarea" name="detalleBebe"
                                                                        id="detalleBebe"
                                                                        placeholder="Ejemplo: La bebe Casey Henriquez de 10 meses viaja sola, encargada responsable: Aeromoza Beatriz Ponce"
                                                                        style="width: 100%; height: 50px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->

                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-user bg-green"></i>
                                                <div class="timeline-item">

                                                    <h3 class="timeline-header no-border"><a href="#">Opciones
                                                            Avanzadas</a></h3>
                                                    <div class="timeline-body">
                                                        <div class="row">


                                                            <div class="col-sm-4">
                                                                <!-- select -->
                                                                <div class="form-group multiple-form-group input-group">
                                                                    <label>Aerolinea</label>
                                                                    <div class="input-group">
                                                                        <select name="idaerolinea" id="idaerolinea"
                                                                            class="select2 select2-hidden-accessible form-control"
                                                                            data-placeholder="Seleccione"
                                                                            style="width: 100%;">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <!-- select -->
                                                                <div class="form-group multiple-form-group input-group">
                                                                    <label>Clase</label>
                                                                    <div class="input-group">
                                                                        <select name="idclase" id="idclase"
                                                                            class="select2 select2-hidden-accessible form-control"
                                                                            data-placeholder="Seleccione"
                                                                            style="width: 100%;">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                            <div class="col-sm-4">
                                                                <!-- select -->
                                                                <div class="form-group multiple-form-group input-group">
                                                                    <label>Tipo de Viaje</label>
                                                                    <div class="input-group">
                                                                        <select name="idtipo_viaje" id="idtipo_viaje"
                                                                            class="select2 select2-hidden-accessible form-control"
                                                                            data-placeholder="Seleccione"
                                                                            style="width: 100%;">
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            <div class="col-sm-7">
                                                                <div class="form-group">
                                                                    <label>Opciones Avanzadas</label>
                                                                    <div class="select2-danger">
                                                                        <select class="select2" multiple="multiple"
                                                                            name="opc_avanzadas" id="opc_avanzadas"
                                                                            data-placeholder="Seleccione"
                                                                            data-dropdown-css-class="select2-danger"
                                                                            style="width: 100%;">
                                                                            <option>Vuelo sin Escalas</option>
                                                                            <option>Misma Aerolinea</option>
                                                                            <option>Equipaje Extra</option>

                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-sm-4">
                                                                <!-- text input -->
                                                                <div class="form-group">
                                                                    <label>Nuevo Opción</label>
                                                                    <input type="text" class="form-control"
                                                                        name="insertarOpcion" id="insertarOpcion"
                                                                        placeholder="Insertar Nueva Opcion"
                                                                        autocomplete="off">
                                                                </div>

                                                            </div>
                                                            <div class="col-sm-1">
                                                                <br>
                                                                <span class="input-group-btn">
                                                                    <button type="button"
                                                                        class="btn btn-success btn-add"
                                                                        name="agregarOpcion" id="agregarOpcion"
                                                                        style="margin-top: 10px; width: 100%;"
                                                                        onclick="OpcAvanzada()">+</button>
                                                                </span>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END timeline item -->
                                            <!-- timeline item -->
                                            <div>
                                                <i class="fas fa-comments bg-yellow"></i>
                                                <div class="timeline-item">

                                                    <h3 class="timeline-header"><a href="#">Condiciones</a></h3>
                                                    <div class="timeline-body">
                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group" id="desborde">
                                                                    <p>
                                                                        <!-- <pre> --><label name="condiciones"
                                                                            id="condiciones"></label>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="timeline-footer" style="text-align: right;">
                                                        <button name="btnGuardarCotizacion" id="btnGuardarCotizacion"
                                                            class="btn btn-info btn-sm"
                                                            style="color: white">Guardar</button>
                                                        <a class="btn btn-danger btn-sm"
                                                            style="color: white">Cancelar</a>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </section>

                        <!--AQUI COLOCARE MI DISEÑO FIN-->

                    </div><!-- /overlay-wrapper -->
                </div><!-- /.container-fluid -->
            </section>
        </div>
    </div><!-- End Blog Page -->
</main><!-- End #main -->

<script>
$(function() {
    $('.select2').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
        theme: 'bootstrap4'
    })

    $('.my-colorpicker1').colorpicker()
    //color picker with addon

    $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });

    $(document).ready(function() {
        $('#timepicker').mdtimepicker(); //Initializes the time picker
    });

    $(document).ready(function() {
        $('#timepicker2').mdtimepicker(); //Initializes the time picker
    });

})
</script>

<script>
function OpcAvanzada() {
    let x = $("#insertarOpcion").val();
    let seleccion = $("<option></option>").val(x).text(x);
    $("#opc_avanzadas").append(seleccion).trigger('change');
}
</script>

<!-- jquery-validation -->




<?php include_once('../../layaut/plantilla/footer.php'); ?>
<!-- PONER SCRIPT ADICIONALES ACA -->

<script src="../../assets/vendor/sweetalert2/sweetalert2.js"></script>
<script src="../../assets/js/mdtimepicker.js"></script> <!-- reloj -->
<script src="../../assets/vendor/select2/js/select2.full.min.js"></script>

<script src="../../assets/vendor/jquery-validation/jquery.validate.min.js"></script>
<script src="../../assets/vendor/jquery-validation/additional-methods.min.js"></script>
<script src="../../assets/vendor/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>

<script type="text/javascript" src="../../assets/js/controladores/client/comboUsuario.js"></script>
<script type="text/javascript" src="../../assets/js/controladores/vuelos/comboAerolinea.js"></script>
<script type="text/javascript" src="../../assets/js/controladores/vuelos/comboClase.js"></script>
<script type="text/javascript" src="../../assets/js/controladores/vuelos/comboViaje.js"></script>
<script type="text/javascript" src="../../assets/js/controladores/vuelos/mostrarCondiciones.js"></script>
<script type="text/javascript" src="../../assets/js/controladores/vuelos/insertarCotizacion.js"></script>

<?php include_once('../../layaut/plantilla/cierre.php'); ?>