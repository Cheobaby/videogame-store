<?php
    session_start();
    $sucursal=$_SESSION['sucursal'];
    if (isset($_GET['valor'])&&isset($_GET['id_ven'])) {
        include("./dashboard/src/html/conexion_database.php");
        $cantidad=$_GET['valor'];
        $id_ven=$_GET['id_ven']; 
        $id_prod=$_GET['prod'];
        $usu=$_SESSION['id_Usuario'];
        $consulta = "SELECT * FROM tinventario WHERE  id_prod='$id_prod' AND estatus_inv!='PR_0' AND id_suc='$sucursal'";
        $resultado = $conexion->query($consulta);  
        $cant='';           
        $fila=$resultado->fetch_assoc(); 
        $cant = $fila['stock_inv'];                                                   
        if($cantidad==$cant){            
            echo '<script>alert("Stock insuficiente"); window.location.href = "carro.php";</script>';
        }
        else if($cantidad==6){
            header('location: carro.php');
        }
        
        else if($cantidad<$cant){
                $cantidad+=1;
                $sql="UPDATE tdet_ven SET cantidad_venta='$cantidad' WHERE id_ven='$id_ven'";
                $conexion->query($sql);
                header('location: carro.php');
        }
        
    }
?>
