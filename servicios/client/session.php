<?php
session_start();

switch ($_POST['action']) {
   case 'start':
      $_SESSION["activo"] = true;
      // $_SESSION["id_cliente"] = $_POST["id_cliente"];
      // $_SESSION["nombre"] = $_POST["nombre"];
      // $_SESSION["correo"] = $_POST["correo"];
      // $_SESSION["nivel"] = $_POST["nivel"];
      // $_SESSION["celular"] = $_POST["celular"];
      // $_SESSION["dui"] = $_POST["dui"];
      // $_SESSION["foto"] = $_POST["foto"];
      // $_SESSION["user_uuid"] = $_POST["user_uuid"];
      break;

   case 'getActivo':
      echo json_encode($_SESSION["activo"]);
      break;
   case 'GetId':
      echo json_encode($_SESSION["id_cliente"]);
      break;
   case 'getNombre':
      echo json_encode($_SESSION["nombre"]);
      break;
   case 'getCorreo':
      echo json_encode($_SESSION["correo"]);
      break;
   case 'getNivel':
      echo json_encode($_SESSION["nivel"]);
      break;
   case 'getCelular':
      echo json_encode($_SESSION["celular"]);
      break;
   case 'getDui':
      echo json_encode($_SESSION["dui"]);
      break;
   case 'getFoto':
      echo json_encode($_SESSION["foto"]);
      break;
   case 'getUid':
      echo json_encode($_SESSION["user_uuid"]);
      break;
   case 'logout':
      session_destroy();
      break;
   default:
      break;
}