<?php
// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $idUsuario = $_POST["idUsuario"];
    $nombre = $_POST["nombre"];
    $contraseña = $_POST["contraseña"];
    $estatus = $_POST["estatus"];
    $correo = $_POST["correo"];

    // Establecer la conexión a la base de datos
    include("./conexion_database.php");
    // Preparar la consulta SQL para actualizar los datos del usuario
    $sql = "UPDATE TUsuario SET nombre_usuario='$nombre', contraseña_usuario='$contraseña', estatus_usu='$estatus', correo_usu='$correo' WHERE id_Usuario='$idUsuario'";

    if ($conexion->query($sql) === TRUE) {
        // Los datos se actualizaron correctamente
        echo "<script type='text/javascript'>
            alert('Los cambios se han guardado exitosamente');
            window.location.href = 'index.php'; // Redireccionar a la página index.php
        </script>";
    } else {
        // Ocurrió un error al actualizar los datos
        echo "Error al guardar los cambios: " . $conexion->error;
    }

    $conexion->close();
}
?>