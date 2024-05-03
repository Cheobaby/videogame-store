<?php
// Función para verificar si se ha enviado el formulario
function isFormSubmitted() {
    return isset($_POST['new_password']) && isset($_POST['confirm_password']);
}

// Función para cambiar la contraseña
function changePassword($email, $newPassword) {
    include("./dashboard/src/html/conexion_database.php");

    // Hash de la nueva contraseña antes de almacenarla en la base de datos
    $hashedPassword = $newPassword;

    // Actualizar la contraseña en la base de datos
    $sql = "UPDATE tusuario SET contraseña_usuario = '$hashedPassword' WHERE correo_usu = '$email'";

    if ($conn->query($sql) === TRUE) {
        echo 'Contraseña actualizada con éxito.';
    } else {
        echo 'Error al actualizar la contraseña en la base de datos: ' . $conn->error;
    }

    $conn->close();
}

// Verificar si el formulario ha sido enviado y realizar el cambio de contraseña
if (isset($_GET['email'])) {
    $email = $_GET['email'];

    if (isFormSubmitted()) {
        $newPassword = $_POST['new_password'];
        $confirmPassword = $_POST['confirm_password'];

        // Verificar que las contraseñas coincidan
        if ($newPassword !== $confirmPassword) {
            echo 'Las contraseñas no coinciden.';
        } else {
            changePassword($email, $newPassword);
        }
    }
} else {
    echo 'Correo electrónico no especificado';
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cambiar Contraseña - Extreme Games</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e1edea;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333;
            padding: 20px 0;
            margin: 0;
            background-color: #00ffb3;
        }
        .container {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
            color: #555;
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #00ffb3;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #cc5500;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Cambiar Contraseña</h1>
        <form action="" method="post">
            <input type="hidden" name="email" value="<?php echo $email; ?>">
            <label for="new_password">Nueva contraseña:</label>
            <input type="password" name="new_password" id="new_password" required><br>
            <label for="confirm_password">Confirmar contraseña:</label>
            <input type="password" name="confirm_password" id="confirm_password" required><br>
            <input type="submit" value="Cambiar Contraseña">
        </form>
    </div>
</body>
</html>
