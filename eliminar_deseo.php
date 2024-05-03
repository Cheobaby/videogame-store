
<?php
session_start();
include("./dashboard/src/html/conexion_database.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
  $productId = $_POST['id'];
  $id_Usuario=$_SESSION['id_Usuario'];
  // Realiza la consulta para eliminar el producto de la base de datos
  $eliminacion = "DELETE FROM TDeseos WHERE id_prod = '$productId' AND id_Usuario='$id_Usuario'";
  $resultado = $conexion->query($eliminacion);

  if ($resultado) {
    echo "El producto se eliminó correctamente";
  } else {
    echo "Error al eliminar el producto: " . $conexion->error;
  }
} else {
  echo "ID del producto no recibido";
}

$conexion->close();
?>
