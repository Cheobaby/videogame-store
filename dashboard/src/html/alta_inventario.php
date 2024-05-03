<?php
include("conexion_database.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener el último valor de id_prod en la tabla TCategorias
    $lastIdQuery = "SELECT id_prod FROM TProductos ORDER BY id_prod DESC LIMIT 1";
    $lastIdResult = $conexion->query($lastIdQuery);

    if ($lastIdResult->num_rows > 0) {
        $lastIdRow = $lastIdResult->fetch_assoc();
        $lastId = $lastIdRow['id_prod'];
        $prefix = substr($lastId, 0, 3); // Obtener el prefijo actual, como "ab_"
        $lastNumber = intval(substr($lastId, 3)); // Obtener el número actual, como "1"
        $nextNumber = $lastNumber + 1; // Incrementar el número
        $nextId = $prefix . $nextNumber; // Generar el nuevo id_prod con el prefijo y el número incrementado
    } else {
        // Si no hay registros en la tabla, establece el primer valor
        $nextId = "xv_0";
    }

    $carpeta_destino = "C:/xampp/htdocs/games/assets/images/"; // Ruta de la carpeta donde deseas guardar las imágenes
    $nombre_archivo = "";
    if (isset($_FILES["imagenSucursalAlta"]["name"])) {
        $nombre_archivo = $_FILES["imagenSucursalAlta"]["name"];
        $ruta_archivo = $carpeta_destino . $nombre_archivo;

        if (move_uploaded_file($_FILES["imagenSucursalAlta"]["tmp_name"], $ruta_archivo)) {
            // Aquí puedes escribir la lógica adicional, como insertar el nombre del archivo en una tabla de la base de datos
        } else {
            echo "Error al subir la imagen.";
        }
    }

    // Obtener los datos del formulario
    $id_prod = $nextId;
    $id_Cate = $_POST["claveCategoriasAlta"];
    $id_ESta = 'PR_1';
    $nombre_Prod = $_POST["nombreProductoAlta"];
    $descripcion_Prod = $_POST["descripcionProducto"];
    $precio_Uni = $_POST["costoProducto"];
    $stock_Prod = $_POST["cantidadSucursalAlta"];
    $id_Emp = $_POST["claveEmpleadoAlta"];
    $foto = $nombre_archivo;
    $id_suc=$_POST["claveSucursalAlta"];
    

    $sql = "INSERT INTO TProductos (id_prod, id_Cate, id_ESta, nombre_Prod, descripcion_Prod, precio_Uni, stock_Prod, id_Emp, foto) 
    VALUES ('$id_prod', '$id_Cate', '$id_ESta', '$nombre_Prod', '$descripcion_Prod', '$precio_Uni', '0', '$id_Emp', '$foto')";

    if ($conexion->query($sql) === TRUE) {
        // La inserción se realizó correctamente, puedes enviar una respuesta de éxito si es necesario
        echo "<script type='text/javascript'>
                alert('Los cambios se han guardado exitosamente');
                window.location.href = 'inventario.php'; // Redireccionar a la página index.php
            </script>";
    } else {
        // Ocurrió un error al insertar el producto, puedes enviar una respuesta de error si es necesario
        echo "Error al crear el producto: " . $conexion->error;
    }
} else {
    // La categoría no existe, muestra un mensaje de error
    echo "Error: La categoría seleccionada no existe.";
}
$conexion->close();
?>



