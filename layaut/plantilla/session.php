<?php
session_start();
if (isset($_SESSION["activo"])) {
   echo ("LOGUEADO");
} else {
  header('Location: ../../login.php');
}