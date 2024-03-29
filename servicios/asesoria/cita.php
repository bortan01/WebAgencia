<?php include_once('../../layaut/plantilla/cabecera.php'); ?>
<?php include_once "../../layaut/plantilla/session.php"; ?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link href="../../assets/vendor/select2/css/select2.min.css" rel="stylesheet">
<link href="../../assets/vendor/select2/css/miEstilo.css" rel="stylesheet">
<link href="../../assets/vendor/subir-foto/css/fileinput.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/css/avatar.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/subir-foto/themes/explorer-fas/theme.css" rel="stylesheet" type="text/css" />
<link href="../../assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css" rel="stylesheet" type="text/css" />
<link rel='stylesheet' type='text/css' href='../../assets/css/fullcalendar.css' />
<link href="../../assets/css/mdtimepicker.css" rel="stylesheet" type="text/css">

<?php include_once('../../layaut/plantilla/menu.php'); ?>

<main id="main" style="padding-top: 55px;">
    <!-- ======= Blog Page ======= -->
    <div class="blog-page area-padding">
        <div class="container">
            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="section-headline services-head text-center">
                                <h2>Agendar Cita</h2>
                            </div>
                        </div>
                    </div>
                    
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="timeline">
                                <div>
                                    <i class="fas fa-calendar bg-blue"></i>
                                    <div class="timeline-item">
                                        <h3 class="timeline-header"><a href="#">Selecciona el día para agendar tu cita de Asesoría Migratoria</a></h3>
                                        <div class="timeline-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-md-10">
                                                            <!-- THE CALENDAR -->
                                                            <div id="calendar"></div>
                                                        </div>
                                                        <!-- /.col -->
                                                        <div class="col-md-1">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- /.row -->
                </div><!-- /.container-fluid -->
            </section>

        </div>
    </div><!-- End Blog Page -->
</main><!-- End #main -->

<?php include_once('./modal_eventos.php') ?>
<?php include_once('../../layaut/plantilla/footer.php'); ?>
<!-- COLOCAR JS ADICIONALES ACA ABAJO -->
<script src="../../assets/vendor/sweetalert2/sweetalert2.js"></script>
<script src="../../assets/vendor/select2/js/select2.full.min.js"></script>
<script src="../../assets/vendor/jquery-validation/jquery.validate.min.js" type="text/javascript"></script>
<script src="../../assets/vendor/jquery-validation/additional-methods.min.js" type="text/javascript"></script>

<script src='../../assets/vendor/oldCalendar/js/moment.min.js'></script>
<script src='../../assets/vendor/oldCalendar/js/fullcalendar.min.js'></script>
<script src='../../assets/vendor/oldCalendar/js/locale/es.js'></script>
<script src="../../assets/js/controladores/client/comboUsuario.js"></script>
<script src="../../assets/js/controladores/asesorias/combobox.js"></script>
<script src="../../assets/js/controladores/asesorias/ramas_automaticas.js"></script>
<script src="../../assets/js/controladores/asesorias/preguntas_automaticas.js"></script>
<script src="../../assets/js/controladores/asesorias/insertar-app.js"></script>
<script src="../../assets/js/controladores/asesorias/update-app.js"></script>
<script src="../../assets/js/controladores/asesorias/calendario-app.js"></script>
<script src="../../assets/js/controladores/asesorias/input.js"></script>
<script src="../../assets/js/controladores/asesorias/validar-exist.js"></script>
<script src="../../assets/js/controladores/asesorias/operaciones.js"></script>
<script src="../../assets/js/mdtimepicker.js"></script>
<script>
$(document).ready(function() {
    $('#timepicker').mdtimepicker(); //Initializes the time picker
});

$(document).ready(function() {
    $('#timepicker2').mdtimepicker(); //Initializes the time picker
});
$('#timepicker').select2();
$('#timepicker2').select2();

$('#loadingSave').hide();
$('#loadingActualizarEventos').hide();
</script>
<?php include_once('../../layaut/plantilla/cierre.php'); ?>