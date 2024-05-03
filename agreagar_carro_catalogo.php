<?php
session_start();
include("./dashboard/src/html/conexion_database.php");
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        $id_prod = $_GET['id_prod'];
        $usuario = $_GET['id_usu'];                   
        $estatus = 'PR_1';  
        $sucursal = $_SESSION['sucursal'];

        /*$consulta = "SELECT * FROM tinvenario WHERE id_suc='$sucursal' AND id_prod='$id_prod'";
        $r = $conexion->query($consulta);
        $totInventario='';   
        $total='';
        if (!$r) {
            echo "Error en la consulta: " . $conexion->error;
        } else {
            $totInventario = $r->fetch_assoc();
            $total=$totInventario['stock_inv'];
        }  */              

        //unset($mensaje);       
        $check_query = "SELECT 1 FROM tdet_ven WHERE id_prod = '$id_prod' AND usuario='$usuario'";
        $check_result = $conexion->query($check_query);
    
        if ($check_result->num_rows > 0) {
            if ($check_result == 1) {
                echo $mensaje = 'echo "<script>alert(\'El producto ya esta agregado\'); window.location.href = \'catalogo01.php\';</script>"';
            }else{
                // El 'id_prod' ya existe, hacemos una actualización
                $query = "UPDATE tdet_ven SET cantidad_venta = 1 WHERE id_prod = '$id_prod' AND usuario='$usuario'";
            }

        } else {
            // El 'id_prod' NO existe, hacemos una inserción
            $cantidad_venta=1;
            $query = "INSERT INTO tdet_ven (id_prod, usuario, cantidad_venta, estatus)
            VALUES ('$id_prod', '$usuario', '$cantidad_venta', '$estatus')";           
        }
        if ($conexion->query($query) === TRUE ) {   
            echo $mensaje = 'echo "<script>alert(\'Producto agregado al carrito de compras\'); window.location.href = \'catalogo01.php\';</script>"';                                            
        }    
        else{
            unset($mensaje);
        }   
        //header('location: index.php');          
        $conexion->close();
    }
?>
