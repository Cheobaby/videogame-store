<?php
session_start();
include("./dashboard/src/html/conexion_database.php");
if (isset($_SESSION['id_Usuario'])) {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $id_prod = $_POST['id_prod'];
        $usuario = $_POST['usuario'];
        $cantidad_venta = $_POST['cantidad_venta'];
        $estatus = 'PR_1';
        $mensaje = "";
        $sucursal = $_SESSION['sucursal'];

        $check_query = "SELECT 1 FROM tdet_ven WHERE id_prod = '$id_prod' AND usuario='$usuario'";
        $check_result = $conexion->query($check_query);

        $consulta = "SELECT * FROM tinvenario WHERE id_suc='$sucursal' AND id_prod='$id_prod'";
        $r = $conexion->query($consulta);
        $totInventario = $r->fetch_assoc();

        if ($check_result->num_rows > 0) {
            // El 'id_prod' ya existe, hacemos una actualización
            if ($totInventario['stock_inv'] < $cantidad_venta) {
                echo "Stock insuficiente";
            } else {
                $query = "UPDATE tdet_ven SET cantidad_venta = cantidad_venta + 1 WHERE id_prod = '$id_prod' AND usuario='$usuario'";
            }

        } else {
            // El 'id_prod' NO existe, hacemos una inserción
            if ($totInventario['stock_inv'] < $cantidad_venta) {
                echo "Stock insuficiente";
            } else {
                $query = "INSERT INTO tdet_ven (id_prod, usuario, cantidad_venta, estatus)
                VALUES ('$id_prod', '$usuario', '$cantidad_venta', '$estatus')";
            }
        }

        if (isset($query)) {
            if ($conexion->query($query) === TRUE) {
                $mensaje = "Producto agregado al carrito con éxito";
                $status = "success";
            } else {
                $mensaje = "Error al agregar el producto al carrito: " . $conexion->error;
                $status = "error";
            }
        } else {
            $mensaje = "No se realizó ninguna acción debido a la falta de stock";
            $status = "error";
        }

        $response = array(
            'status' => $status,
            'message' => $mensaje
        );
        echo json_encode($response);

        $conexion->close();
    }
}

?>
