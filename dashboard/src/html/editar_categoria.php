<?php
    include("conexion_database.php");
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        // Obtener los datos del formulario
        $id_Cate = $_POST["idCategoria"];
        $id_ESta = $_POST["estatus"];
        $nombre_Cate = $_POST["nombreCategoria"];
        // Preparar la consulta SQL para actualizar los datos del usuario
        if($id_ESta=="Activo"){
            $id_ESta='CA_1';
        }
        if($id_ESta=="Inactivo"){
            $id_ESta='CA_0';
        }
        $sql = "UPDATE TCategorias SET id_ESta='$id_ESta', nombre_Cate='$nombre_Cate' WHERE id_Cate='$id_Cate'";

    if ($conexion->query($sql) === TRUE) {
        // Los datos se actualizaron correctamente
        echo "<script type='text/javascript'>
        alert('Los cambios se han guardado exitosamente');
        window.location.href = 'categorias.php'; // Redireccionar a la página index.php
    </script>";
    } else {
        // Ocurrió un error al actualizar los datos
        echo "Error al guardar los cambios: " . $conexion->error;
    }

    $conexion->close();

    }
?>