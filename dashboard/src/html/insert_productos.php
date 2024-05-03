<?php
include("./conexion_database.php");

// Obtener los valores del formulario
$categoria = $_POST['categoria'];
$estatus = $_POST['estatus'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$idEmpleado = $_POST['idEmpleado'];
$sucursal=$_POST['sucursal'];
 
// Obtener el último id_prod de la base de datos
$sql = "SELECT MAX(id_prod) AS max_id FROM TProductos";
$result = $conexion->query($sql);
$row = $result->fetch_assoc();
$lastId = $row['max_id'];

if ($lastId === null) {
    // Si no hay registros en la tabla, asignar el primer número
    $newNumber = 1;
} else {
    // Extraer el número del último id_prod
    $lastNumber = (int)substr($lastId, 3);
    // Calcular el siguiente número
    $newNumber = $lastNumber + 1;
}

// Generar el nuevo id_prod concatenando "xv_" y el número siguiente
$newId = "xv_" . $newNumber;

// Insertar los datos en la base de datos
$sql = "INSERT INTO TProductos (id_prod, id_Cate, id_ESta, nombre_Prod, descripcion_Prod, precio_Uni, stock_Prod, id_Emp)
        VALUES ('$newId', '$categoria', '$estatus', '$nombre', '$descripcion', '$precio', '$cantidad', '$idEmpleado')";

if ($conexion->query($sql) === TRUE) {
    echo "Producto insertado correctamente.";
} else {
    echo "Error al insertar el producto: " . $conexion->error;
}

// Cerrar la conexión a la base de datos
$conexion->close();
?>
