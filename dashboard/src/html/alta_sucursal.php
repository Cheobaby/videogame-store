<?php
    include("conexion_database.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Obtener el último valor de id_Cate en la tabla TCategorias
        $lastIdQuery = "SELECT id_suc FROM TSucursal ORDER BY id_suc DESC LIMIT 1";
        $lastIdResult = $conexion->query($lastIdQuery);

        if ($lastIdResult->num_rows > 0) {
            $lastIdRow = $lastIdResult->fetch_assoc();
            $lastId = $lastIdRow['id_suc'];
            $prefix = substr($lastId, 0, 3); // Obtener el prefijo actual, como "ab_"
            $lastNumber = intval(substr($lastId, 3)); // Obtener el número actual, como "1"
            $nextNumber = $lastNumber + 1; // Incrementar el número
            $nextId = $prefix . $nextNumber; // Generar el nuevo id_Cate con el prefijo y el número incrementado
        } else {
            // Si no hay registros en la tabla, establece el primer valor
            $nextId = "EG_05";
        }

        // Obtener los datos del formulario
        $id_suc = $nextId;
        $id_ESta = 'SU_1';
        $nombre_Sucur = $_POST["nombreSucursalAlta"];
        $estado = $_POST["estadoSucursalAlta"];

        // Realiza la consulta para verificar si ya existe una categoría con el mismo id_Cate
        $existingIdQuery = "SELECT id_suc FROM TSucursal WHERE id_suc = '$id_suc'";
        $existingIdResult = $conexion->query($existingIdQuery);

        if ($existingIdResult->num_rows > 0) {
            // Ya existe una categoría con el mismo id_Cate, muestra un mensaje de error
            echo "Error: Ya existe una categoría con el mismo id.";
        } else {
            // Realiza la consulta para insertar la nueva categoría
            $sql = "INSERT INTO TSucursal (id_suc,id_ESta, nombre_Sucur, estado_su) VALUES ('$id_suc','$id_ESta', '$nombre_Sucur', '$estado')";

            if ($conexion->query($sql) === TRUE) {
                // La inserción se realizó correctamente, puedes enviar una respuesta de éxito si es necesario
                echo "<script type='text/javascript'>
                alert('Los cambios se han guardado exitosamente');
                window.location.href = 'sucursal.php'; // Redireccionar a la página index.php
            </script>";
            } else {
                // Ocurrió un error al insertar la categoría, puedes enviar una respuesta de error si es necesario
                echo "Error al crear la categoría: " . $conexion->error;
            }
        }
    }

    $conexion->close();
?>
