<?php
    include("conexion_database.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener los datos del formulario
        $nombre_usuario=$_POST['nombre'];
        $contraseña_usuario=$_POST['contraseña'];
        $estatus_usu = 'Activo';
        $correo_usu=$_POST['correo'];
        $tipo_usu=$_POST['tipo'];            
            // Realiza la consulta para insertar la nueva categoría
            $sql = "INSERT INTO TUsuario (nombre_usuario,contraseña_usuario,estatus_usu, correo_usu, tipo_usu) VALUES ('$nombre_usuario','$contraseña_usuario', '$estatus_usu', '$correo_usu','$tipo_usu')";

            if ($conexion->query($sql) === TRUE) {
                // La inserción se realizó correctamente, puedes enviar una respuesta de éxito si es necesario
                echo "<script type='text/javascript'>
                alert('Los cambios se han guardado exitosamente');
                window.location.href = 'index.php'; // Redireccionar a la página index.php
            </script>";
            } else {
                // Ocurrió un error al insertar la categoría, puedes enviar una respuesta de error si es necesario
                echo "Error al crear el usuario: " . $conexion->error;
            }
        }    

    $conexion->close();
?>
