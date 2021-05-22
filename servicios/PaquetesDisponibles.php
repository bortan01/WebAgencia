<?php include_once('../layaut/cabecera.php');?>
<!-- PONER ESTILOS ADICIONALES ACA ABAJO-->
<link rel="stylesheet" href="../assets/vendor/galery/disponibilidad.css">
<?php  include_once('../layaut/menu.php');?>

<main id="main" style="padding-top: 40px;">

   <!-- ======= Blog Page ======= -->
   <div class="blog-page area-padding">
      <div class="container">
         <section class="content">
            <form id="flotaAutos" name="flotaAutos" role="form" onsubmit="return false">
               <div class="container">
                  <div class="row" id="contenedorAutos">
                     <!-- Hover-Fall Efecto-->

                  </div>
               </div>
            </form>
         </section>
      </div>
   </div><!-- End Blog Page -->

</main><!-- End #main -->

<?php include_once('../layaut/footer.php'); ?>
<!-- COLOCAR JS ADICIONALES ACA ABAJO -->
<script src="../assets/js/controladores/paquete/seleccionar-paquete.js"></script>
<script>
$('#loadingReservaTur').hide();
</script>
<?php include_once('../layaut/cierre.php'); ?>