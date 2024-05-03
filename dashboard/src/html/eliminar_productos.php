<?php
    include("conexion_database.php");
    $id_prod = $_POST["idProducto"];    
        
    // Realiza la consulta para eliminar el usuario con el id especificado
    $sql="CALL baja_productos('$id_prod')";
    $conexion->query($sql);
    $conexion->close();
?>
