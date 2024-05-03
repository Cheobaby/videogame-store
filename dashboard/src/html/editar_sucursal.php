<?php
    include("conexion_database.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // Obtener los datos del formulario
        $id_suc = $_POST["idSucursal"];
        $id_ESta = $_POST["estatus"];
        $nombre_Sucur = $_POST["nombreSucursal"];
        $estado_su = $_POST["estado"];
        // Preparar la consulta SQL para actualizar los datos del usuario
        if($id_ESta=="Activo"){
            $id_ESta='SU_1';
        }
        if($id_ESta=="Inactivo"){
            $id_ESta='SU_0';
        }
        $sql = "UPDATE TSucursal SET id_ESta='$id_ESta', nombre_Sucur='$nombre_Sucur', estado_su='$estado_su' WHERE id_suc='$id_suc'";

    if ($conexion->query($sql) === TRUE) {
        // Los datos se actualizaron correctamente
        echo "<script type='text/javascript'>
        alert('Los cambios se han guardado exitosamente');
        window.location.href = 'sucursal.php'; // Redireccionar a la página index.php
    </script>";
    } else {
        // Ocurrió un error al actualizar los datos
        echo "Error al guardar los cambios: " . $conexion->error;
    }

    $conexion->close();

    }
?>