<?php
include("conexion_database.php");
$id_inv = $_POST["idInv"]; // Cambia "idProducto" por "idInv" para obtener el id_inv enviado desde JavaScript

// Realiza la consulta para eliminar el producto con el id_inv especificado
$sql = "UPDATE TInventario SET estatus_inv = 'PR_0' WHERE id_inv='$id_inv'";
$conexion->query($sql);

$conexion->close();
?>
