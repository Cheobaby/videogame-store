<?php

include("./dashboard/src/html/conexion_database.php");
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id_prod = $_GET['id_prod'];
        $usuario = $_GET['id_usu'];                   
        $estatus = 'PR_1';        
        unset($mensaje);       
        $check_query = "SELECT 1 FROM tdet_ven WHERE id_prod = '$id_prod' AND usuario='$usuario'";
        $check_result = $conexion->query($check_query);
    
        if ($check_result->num_rows > 0) {
            // El 'id_prod' ya existe, hacemos una actualización
            $query = "UPDATE tdet_ven SET cantidad_venta = cantidad_venta + 1 WHERE id_prod = '$id_prod' AND usuario='$usuario'";
        } else {
            // El 'id_prod' NO existe, hacemos una inserción
            $cantidad_venta=1;
            $query = "INSERT INTO tdet_ven (id_prod, usuario, cantidad_venta, estatus)
            VALUES ('$id_prod', '$usuario', '$cantidad_venta', '$estatus')";           
        }
        if ($conexion->query($query) === TRUE ) {   
            echo $mensaje = 'echo "<script>alert(\'Producto agregado al carrito de compras\'); window.location.href = \'index.php\';</script>"';                                            
        }    
        else{
            unset($mensaje);
        }   
        //header('location: index.php');          
        $conexion->close();
    }
?>
