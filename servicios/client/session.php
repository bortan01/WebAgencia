<?php
session_start();

switch ($_POST['action']) {
   case 'start':
      $_SESSION["activo"] = true;
      $_SESSION["id_cliente"] = $_POST["id_cliente"];
      $_SESSION["nombre"] = $_POST["nombre"];
      $_SESSION["correo"] = $_POST["correo"];
      $_SESSION["nivel"] = $_POST["nivel"];
      $_SESSION["celular"] = $_POST["celular"];
      $_SESSION["dui"] = $_POST["dui"];
      $_SESSION["foto"] = $_POST["foto"];
      $_SESSION["user_uuid"] = $_POST["user_uuid"];
      break;
   default:
      break;
}