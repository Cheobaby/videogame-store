<?php
    session_start();
    if (isset($_GET['valor'])&&isset($_GET['id_ven'])) {
        include("./dashboard/src/html/conexion_database.php");
        $cantidad=$_GET['valor'];
        $id_ven=$_GET['id_ven'];        
        if($cantidad==1||$cantidad==6){
            header('location: carro.php');
        }else{
            $cantidad-=1;
            $sql="UPDATE tdet_ven SET cantidad_venta='$cantidad' WHERE id_ven='$id_ven'";
            $conexion->query($sql);
            header('location: carro.php');
        }
    }
?>
