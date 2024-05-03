<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Pago</title>
</head>

<body>
<?php
$sucursal=$_SESSION['sucursal'];
if (isset($_GET['paymentID']) && isset($_GET['valores'])) {
  include("./dashboard/src/html/conexion_database.php");
  $usuario = $_SESSION['id_Usuario'];
  $valores = explode(',', $_GET['valores']);

  $usu = "SELECT nombre_usuario, contraseña_usuario FROM tusuario WHERE id_Usuario='$usuario'";
  $resultUsu = $conexion->query($usu);
  $resultadoUsu = $resultUsu->fetch_assoc();
  $nombre = $resultadoUsu['nombre_usuario'];
  $pass = $resultadoUsu['contraseña_usuario'];
  $cliente = "SELECT id_cli FROM tcliente WHERE nombre_clie='$nombre' AND pass_cli='$pass'";
  $resultCliente = $conexion->query($cliente);
  $dataCliente = $resultCliente->fetch_assoc();
  $id_cliente = $dataCliente['id_cli'];

  $paymentID = $_GET['paymentID'];
  $sql = "SELECT * FROM tdet_ven 
          JOIN tproductos ON tdet_ven.id_prod = tproductos.id_prod 
          WHERE usuario = '$usuario'";

  $result = $conexion->query($sql);

  // Verificar si hay resultados
  if ($result->num_rows > 0) {
    // Recorrer los resultados y realizar la inserción en la tabla tventas
    $i = 0;
    while ($row = $result->fetch_assoc()) {
      $id_ESta = 'VE_1'; // Aquí debes poner el valor deseado para id_ESta
      $id_prod = $row['id_prod'];
      $id_pag = 'p_2'; // Aquí debes poner el valor deseado para id_pag
      //$id_Emp = 1; // Aquí debes poner el valor deseado para id_Emp
      $cant_prod = $valores[$i]; // Obtener el valor de cantidad de productos correspondiente
      //$sub_tot = $row['subtotal']; // Reemplaza 'subtotal' por el nombre correcto del campo en tdet_ven
      $impuesto = 16; // Reemplaza 'impuesto' por el nombre correcto del campo en tdet_ven
      $date_comp = date('Y-m-d'); // Puedes usar la fecha actual o la que corresponda
      $date_entrega = date('Y-m-d'); // Puedes usar la fecha de entrega o la que corresponda
      //$tot_ven = $row['total']; // Reemplaza 'total' por el nombre correcto del campo en tdet_ven
      $id_cli = $id_cliente; // Reemplaza 'id_cli' por el nombre correcto del campo en tdet_ven
      //$id_mem = $row['id_mem']; // Reemplaza 'id_mem' por el nombre correcto del campo en tdet_ven

      // Consulta SQL para insertar en la tabla tventas
      $insert_sql = "INSERT INTO tventas(id_ESta, id_prod, id_pag,id_suc, cant_prod, impuesto, date_comp, date_entrega, id_cli, id_mem,usuario_ven)
                    VALUES ('$id_ESta', '$id_prod', '$id_pag','$sucursal', '$cant_prod', '$impuesto', '$date_comp', '$date_entrega', '$id_cli', 'EGG_1','$usuario')";
      //$actualizar_invenatrio="UPDATE tinventario SET stock_inv = stock_inv - $cant_prod WHERE id_prod = '$id_prod' AND id_suc = '$sucursal'";
      // Ejecutar la inserción
      $conexion->query($insert_sql);
      //$conexion->query($actualizar_invenatrio);
      $i++;
    }
  } else {
    echo "No se encontraron filas para el usuario $usuario.\n";
  }

  // Cerrar la conexión
  $conexion->close();
  echo '<div class="container-fluid d-flex align-items-center justify-content-center" style="min-height: 50vh;">';
echo '    <div class="card text-center">';
echo '        <div class="card-body">';
echo '            <h2 class="card-title">Gracias por su pago</h2>';
echo '        </div>';
echo '    </div>';
echo '</div>';
echo '<div class="container text-center">';
echo '    <a href="formulario_fact.php" class="btn btn-primary">Generar factura</a>';
echo '    <a href="catalogo01.php" class="btn btn-secondary">Seguir comprando</a>';
echo '</div>';
  //header("Location: completado.php");
  exit();
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script> 
</body>

</html>