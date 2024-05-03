<?php
include("conexion_database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_inv = $_POST["idInventario"];
    $id_prod = $_POST["idProducto"];
    $stock_inv = $_POST["stock_inv"];
    $id_suc = $_POST["sucursales"];
    $estatus_inv = $_POST["estatus"];
    $id_inv_entero = (int)$id_inv;
    echo var_dump($estatus_inv);
    if($estatus_inv=='Activo'){
        $estatus_inv='PR_1';
    }
    else{
        $estatus_inv='PR_0';
    }
    $sql = "UPDATE TInventario SET stock_inv='$stock_inv', estatus_inv='$estatus_inv' WHERE id_inv='$id_inv_entero'";        
   

        if ($conexion->query($sql) === TRUE) {
            // Los datos se actualizaron correctamente
            echo "<script type='text/javascript'>
                alert('Los cambios se han guardado exitosamente');
                window.location.href = 'inventario.php'; // Redireccionar a la página inventario.php
            </script>";
        } else {
            // Ocurrió un error al actualizar los datos
            echo "Error al guardar los cambios: " . $conexion->error;
        }

    $conexion->close();
}
?>

