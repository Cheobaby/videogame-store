<?php
// Import PHPMailer classes into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'recursos/Exception.php';
require 'recursos/PHPMailer.php';
require 'recursos/SMTP.php';

// Create an instance; passing `true` enables exceptions
$mail = new PHPMailer(true);

try {
    // Obtener el correo electrónico ingresado por el usuario
    if (isset($_POST['email'])) {
        $email = $_POST['email'];

        include("./dashboard/src/html/conexion_database.php");

        // Paso 2: Realizar la consulta para verificar si el correo está registrado en la base de datos
        $sql = "SELECT * FROM tusuario WHERE correo_usu = '$email'";
        $result = $conn->query($sql);

        // Verificar si la consulta tuvo éxito
        if (!$result) {
            throw new Exception("Error en la consulta: " . $conn->error);
        }

        // Paso 3: Procesar el resultado
        if ($result->num_rows > 0) {
            // Si hay resultados, el correo electrónico existe en la base de datos

            // Configurar el envío del correo
            $mail->SMTPDebug = 0; // Enable verbose debug output
            $mail->isSMTP(); // Send using SMTP
            $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'eg1296948@gmail.com'; // SMTP username
            $mail->Password = 'myxvyukpmszrxamp'; // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; // Enable implicit TLS encryption
            $mail->Port = 465; // TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            // Recipients
            $mail->setFrom('eg1296948@gmail.com', 'EXTREME GAMES');
            $mail->addAddress($email); // Add a recipient

            // Content
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = 'Restablecimiento de contraseña';
            $mail->Body = '
    <html>
    <body>
        <h1>Estimado/a Usuario</h1>
        <p>Este correo electrónico es para informarle que hemos recibido una solicitud de restablecimiento de contraseña para su cuenta.</p>
        <p>Haga clic en el siguiente enlace para cambiar su contraseña:</p>
        <a href="http://localhost/games/recuperar_c/reset_password.php?email=' . $email . '">Cambiar Contraseña</a>
        <p>Si no solicitó restablecer su contraseña, puede ignorar este correo electrónico.</p>
        <p>Atentamente, EXTREME GAMES</p>
    </body>
    </html>';

            // Enviar el correo
            $mail->send();

            // Mostrar mensaje de éxito
            echo 'Mensaje enviado con éxito. Revise su correo electrónico para restablecer su contraseña.';
        } else {
            // Si no hay resultados, el correo electrónico no está registrado
            echo 'Usuario no registrado. Por favor, verifique el correo electrónico ingresado.';
        }

        $conn->close();
    } else {
        echo 'Correo electrónico no especificado';
    }
} catch (Exception $e) {
    echo "El mensaje no pudo enviarse.{$mail->ErrorInfo}";
}
?>
