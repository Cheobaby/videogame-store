<?php
    session_start();
if(isset($_GET['sucursal'])) {
  $sucursalSeleccionada = $_GET['sucursal'];
  $_SESSION['sucursal']= $sucursalSeleccionada;
  header('location: index.php');
  // Aquí puedes realizar cualquier acción basada en la sucursal seleccionada
}
?>
