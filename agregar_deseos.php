<?php
session_start();
include("./dashboard/src/html/conexion_database.php");

// Verificar si el usuario ha iniciado sesión y obtener el ID del usuario
if (isset($_SESSION['id_Usuario'])) {
  $id_Usuario = $_SESSION['id_Usuario'];

  // Obtener el ID del producto seleccionado desde la URL
  if (isset($_GET['id'])) {
    $id_prod = $_GET['id'];

    // Insertar los datos en la tabla de deseos
    $sql = "INSERT INTO TDeseos (id_Usuario, id_prod) VALUES ('$id_Usuario', '$id_prod')";
    if ($conexion->query($sql) === TRUE) {
      // Éxito al insertar en la tabla de deseos
      echo $mensaje = 'echo "<script>alert(\'Producto agregado a la lista de deseos\'); window.location.href = \'index.php\';</script>"';
    } else {
      // Error al insertar en la tabla de deseos
      echo "Ocurrió un error al agregar el producto a la lista de deseos: " . $conexion->error;
    }
  } else {
    // ID del producto no encontrado en la URL
    echo "ID del producto no válido.";
  }
} else {
  // El usuario no ha iniciado sesión
  echo "Debes iniciar sesión para agregar productos a la lista de deseos.";
}

$conexion->close();
?>
