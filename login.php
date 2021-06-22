<?php
session_start();
if (!isset($_SESSION["activo"])) {
   echo ("NO LOGUEADO");
} else {
  header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
   <meta charset="utf-8" />
   <meta content="width=device-width, initial-scale=1.0" name="viewport" />
   <title>Martínez Travels y Tours</title>
   <meta content="" name="description" />
   <meta content="" name="keywords" />
   <!-- Favicons -->
   <!-- Font Awesome -->

   <link rel="stylesheet" href="assets/vendor/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="assets/css/adminlte.css">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
   <!-- CONFIGURACION DE CHAT -->
   <link href="assets/vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.css" rel="stylesheet" type="text/css" />
</head>

<body class="hold-transition login-page">
   <div class="login-box">
      <div class="login-logo">
         <a href=""><br>Martínez Travels y Tours</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
         <div class="card-body login-card-body">
            <p class="login-box-msg">Identificate para iniciar sesión</p>
            <form id="login-form">
               <div class="input-group mb-3">
                  <input name="username" id="username" type="email" class="form-control"
                     placeholder="Correo electrónico" autocomplete="false">
                  <div class=" input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-user"></span>
                     </div>
                  </div>
               </div>
               <div class="input-group mb-3">
                  <input type="password" id="password" name="password" class="form-control" placeholder="Password">
                  <div class="input-group-append">
                     <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                     </div>
                  </div>
               </div>
            </form>
            <div class="social-auth-links text-center mb-3">

               <button id="login-btn" href="home" class="btn btn-block btn-primary">
                  <i class="fab fa-dot-circle-o mr-2"></i> Ingresar
               </button>

            </div>
            <!-- /.social-auth-links -->

            <p class="mb-1" style="text-align: center;">
               <a href="./reset_password.php">Olvide mi contraseña</a>
            </p>

         </div>
         <!-- /.login-card-body -->
      </div>
   </div>
   <!-- /.login-box -->

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
   <!-- Firebase App is always required and must be first -->
   <script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-app.js"></script>
   <!-- Add additional services that you want to use -->
   <script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-auth.js"></script>
   <script src="https://www.gstatic.com/firebasejs/5.7.0/firebase-firestore.js"></script>
   <!-- jQuery -->
   <script src="assets/vendor/jquery/jquery.min.js"></script>
   <!-- Bootstrap 4 -->
   <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- AdminLTE App -->
   <script src="assets/vendor/sweetalert2/sweetalert2.js"></script>
   <script src="assets/vendor/jquery-validation/jquery.validate.min.js"></script>
   <script src="assets/vendor/jquery-validation/additional-methods.min.js"></script>
   <script src="assets/js/controladores/firebase/firestore-config.js"></script>
   <script src="assets/js/conf.js"></script>
   <script src="assets/js/controladores/firebase/main.js"></script>
</body>


</html>