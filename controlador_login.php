<?php    
    session_start();
    include("./dashboard/src/html/conexion_database.php");

    $conexion=new mysqli($servername,$username,$password,$dbname);

    if ($conexion->connect_error) {
        die("La conexión a la base de datos falló: " . $conexion->connect_error);
    }
    if($_SERVER["REQUEST_METHOD"] == "POST"){        
        $email=$_POST["email"];
        $password=$_POST["password"];
        $sql=$conexion->query("SELECT * FROM TUsuario WHERE correo_usu = '$email' AND contraseña_usuario = '$password'");
        if($sql->num_rows>0){
            $row=$sql->fetch_assoc();
            $_SESSION["id_Usuario"]=$row["id_Usuario"];
            $_SESSION["nombre_usuario"]=$row["nombre_usuario"];
            $_SESSION["correo_usu"]=$row["correo_usu"];
            $_SESSION["tipo_usu"]=$row["tipo_usu"];
            $_SESSION["conexion"]=$conexion;

            $tipo=$row['tipo_usu'];
            if ($tipo == 'cliente' || $tipo == ''||$tipo=='CLIENTE'||$tipo=='Cliente') {
                header("Location: index.php");
            } else {
                header("Location: dashboard/src/html/index.php");
            }            
        }
        else{
            $mensajeError= '
            <div class="alert alert-danger alert-dismissible fade show">
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                <strong>¡Error!</strong> Credenciales Invalidas.
            </div>
            ';
        }
    }

?>

