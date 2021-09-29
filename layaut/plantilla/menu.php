</head>

<body data-spy="scroll" data-target="#navbar-example">
   <!-- ======= Header ======= -->
   <header id="header" class="fixed-top">
      <div class="container d-flex" style="max-width: 1000px;">
         <div class="logo mr-auto">
            <h1 class="text-light">
               <a href="../../index.php"><span>Martínez</span>Travels & Tours</a>
            </h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
         </div>
         <nav class="nav-menu d-none d-lg-block">
            <ul>
               <li class=""><a href="../../index.php">Inicio</a></li>
               <li><a href="../../nosotros.php">¿Quiénes somos?</a></li>
               <li class="drop-down">
                  <a href="#">Servicios</a>
                  <ul>
                     <li>
                        <a href="../../servicios/asesoria/cita.php">Asesoría Migratora</a>
                     </li>
                     <li>
                        <a href="../../servicios/paquetes/disponibles.php">Paquetes</a>
                     </li>
                     <li>
                        <a href="../../servicios/tours/disponibles.php">Tours</a>
                     </li>
                     <li>
                        <a href="../../servicios/vehiculos/disponibilidad.php">Renta de Vehículos</a>
                     </li>

                     <li>
                        <a href="../../servicios/vuelos/cotizarVuelo.php">Cotización de Vuelos</a>
                     </li>
                     <li>
                        <a href="../../servicios/paquetes/cotizar.php">Cotización de Paquetes</a>
                     </li>
                     <li>
                        <a href="../../servicios/vuelos/disponibilidadPromociones.php">Promociones de Vuelos</a>
                     </li>
                     <li>
                        <a href="../../servicios/encomienda/cotizador.php">Encomienda</a>
                     </li>
                  </ul>
               </li>
               <li><a href="../../servicios/chat/messenger.php">Contacto</a></li>

               <li class="drop-down"><a href="#">Mi Cuenta</a>
                  <ul>
                     <?php if (!isset($_SESSION["activo"])) : ?>
                     <li><a href="../../createAccount.php">Registrarse</a></li>
                     <li><a href="../../login.php">Identificate</a></li>
                     <?php else : ?>
                     <li><a href="../../servicios/client/updateInfo.php">Actualizar Datos </a></li>
                     <li><a href="../../servicios/client/updateDocumentos.php">Documentos Personales</a></li>
                     <li class="drop-down"><a href="#">Servicios Adquiridos</a>
                        <ul>
                           <li><a href="../../servicios/paquetes/adquiridos.php">Tours/Paquetes</a></li>
                           <li><a href="../../servicios/vehiculos/vehiculosAlquilados.php">Vehículos</a></li>
                           <li><a href="../../servicios/encomienda/verEncomiendas.php">Encomiendas</a></li>
                        </ul>
                     </li>
                     <li class="drop-down"><a href="#">Cotizaciones</a>
                        <ul>
                           <li><a href="../../servicios/paquetes/solicitudes.php">Paquetes</a></li>
                           <li><a href="../../servicios/vehiculos/cotizacionesRealizadas.php">Vehículos</a></li>
                           <li><a href="../../servicios/vuelos/cotizacionesRealizadasV.php">Vuelos</a></li>
                        </ul>
                     </li>
                     <li><a name="logout" id="logout" href="#">Cerrar Sesión</a></li>
                     <?php endif; ?>
                  </ul>
               </li>

            </ul>
         </nav>
         <!-- .nav-menu -->
      </div>
   </header>
   <!-- End Header -->