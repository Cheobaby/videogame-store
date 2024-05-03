<?php
include("conexion_database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $id_prod = $_POST["idProducto"];
    $id_Cate = $_POST["categoria"];
    $id_ESta = $_POST["estatus"];
    $nombre_Prod = $_POST["nombreProducto"];
    $descripcion_Prod = $_POST["descripcion"];
    $precio_Uni = $_POST["precio"];
    //$stock_Prod = $_POST["cantidad"];
    $id_Emp = $_POST["idEmpleado"];    
    
    if($id_ESta=='Activo'){
        $id_ESta='PR_1';
    }
    else{
        $id_ESta='PR_0';        
    }
    //var_dump("$id_prod");
    $sql = "UPDATE TProductos SET id_ESta='$id_ESta', nombre_Prod='$nombre_Prod',descripcion_Prod='$descripcion_Prod'
    , precio_Uni='$precio_Uni',id_Emp='$id_Emp' WHERE id_prod='$id_prod'";

    //$updateInv="UPDATE tinventario SET estatus_inv='$id_ESta' WHERE id_prod='$id_prod'";

    if ($conexion->query($sql) === TRUE) {
        // Los datos se actualizaron correctamente
        echo "<script type='text/javascript'>
        alert('Los cambios se han guardado exitosamente');
        window.location.href = 'productos.php'; // Redireccionar a la página index.php
    </script>";
    } else {
        // Ocurrió un error al actualizar los datos
        echo "Error al guardar los cambios: " . $conexion->error;
    }

    $conexion->close();
}
?>
