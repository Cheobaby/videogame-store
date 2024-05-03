<?php
    session_start();   
    if($_SESSION["tipo_usu"]=="Admin"||$_SESSION["tipo_usu"]=="Administrador"||$_SESSION["tipo_usu"]=="Empleado"||$_SESSION["tipo_usu"]=="empleado"){        
        header("location: login.php");
        session_destroy();
    }
    else{
        session_destroy();
        header("location: index.php");
    }        
?>