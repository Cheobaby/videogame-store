<?php
    include("conexion_database.php");
    $id_suc = $_POST["idSucursal"];
    $id_ESta='SU_0';
    // Realiza la consulta para eliminar el usuario con el id especificado
    
    $sql = "UPDATE TSucursal SET id_ESta='$id_ESta' WHERE id_suc='$id_suc'";


    if ($conexion->query($sql) === TRUE) {
    // La eliminación se realizó correctamente, puedes enviar una respuesta de éxito si es necesario
    echo "Usuario eliminado exitosamente";
    } else {
    // Ocurrió un error al eliminar el usuario, puedes enviar una respuesta de error si es necesario
    echo "Error al eliminar el usuario: " . $conexion->error;
    }

    $conexion->close();
?>