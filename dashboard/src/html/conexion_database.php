<?php
    $servername = "localhost";
    $username = "root";
    $password = "307735";
    $dbname = "EG01";

    $conexion=new mysqli($servername,$username,$password,$dbname);

    if ($conexion->connect_error) {
        die("La conexión a la base de datos falló: " . $conexion->connect_error);
    }
?>
