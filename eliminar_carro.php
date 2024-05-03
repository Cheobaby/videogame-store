<?php    
    if ($_SERVER["REQUEST_METHOD"] === "GET") { 
        include("./dashboard/src/html/conexion_database.php");   
        $id_ven=$_GET['id_ven'];           
        $delete="DELETE FROM tdet_ven WHERE id_ven='$id_ven'";
        if($resultadoElim=$conexion->query($delete)){
            header("Location: carro.php");
        }                              
        $conexion->close();
    }    
?>

