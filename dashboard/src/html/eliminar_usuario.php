<?php
// Obtener el idUsuario enviado por la solicitud POST
$idUsuario = $_POST['idUsuario'];

// Realizar las operaciones necesarias para eliminar el usuario con el id especificado
// ...

// Aquí puedes agregar el código para eliminar el usuario de la base de datos
// Puedes utilizar consultas SQL o cualquier otro método que estés utilizando en tu aplicación

// Por ejemplo, supongamos que estás utilizando MySQLi para conectarte a la base de datos
include("./conexion_database.php");

// Realiza la consulta para eliminar el usuario con el id especificado
$sql = "UPDATE TUsuario SET estatus_usu='Inactivo'  WHERE id_Usuario = $idUsuario";

if ($conexion->query($sql) === TRUE) {
  // La eliminación se realizó correctamente, puedes enviar una respuesta de éxito si es necesario
  echo "Usuario eliminado exitosamente";
} else {
  // Ocurrió un error al eliminar el usuario, puedes enviar una respuesta de error si es necesario
  echo "Error al eliminar el usuario: " . $conexion->error;
}

$conexion->close();
?>
