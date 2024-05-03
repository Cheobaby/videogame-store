<?php
include("./dashboard/src/html/conexion_database.php");
// Obtener los valores del formulario
$nombre_usuario = $_POST['name'];
$contraseña_usuario = $_POST['password'];
$estatus_usu = $_POST['userType'];
$correo_usu = $_POST['email'];

// Insertar los valores en la base de datos
$sql = "INSERT INTO TUsuario (nombre_usuario, contraseña_usuario, estatus_usu, correo_usu,tipo_usu)
VALUES ('$nombre_usuario', '$contraseña_usuario', 'Activo', '$correo_usu','Cliente')";

if ($conexion->query($sql) === TRUE) {
    echo "<script type='text/javascript'>alert('Usuario registrado exitosamente!');</script>";
} else {
    echo "<script type='text/javascript'>alert('Error al registrar el usuario. Por favor, inténtalo de nuevo.');</script>";
    echo "Error: " . $sql . "<br>" . $conexion->error; // Imprimir información detallada del error
}

// Cerrar conexión
$conexion->close();
?>
