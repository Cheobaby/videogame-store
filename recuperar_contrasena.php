<!DOCTYPE html>
<html>
<head>
  <title>Iniciar Sesión</title>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
  <style>
    .background-radial-gradient {
      background-color: hsl(218, 41%, 15%);
      background-image: radial-gradient(650px circle at 0% 0%,
          hsl(218, 41%, 35%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%),
        radial-gradient(1250px circle at 100% 100%,
          hsl(218, 41%, 45%) 15%,
          hsl(218, 41%, 30%) 35%,
          hsl(218, 41%, 20%) 75%,
          hsl(218, 41%, 19%) 80%,
          transparent 100%);
    }

    #radius-shape-1 {
      height: 220px;
      width: 220px;
      top: -60px;
      left: -130px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    #radius-shape-2 {
      border-radius: 38% 62% 63% 37% / 70% 33% 67% 30%;
      bottom: -60px;
      right: -110px;
      width: 300px;
      height: 300px;
      background: radial-gradient(#44006b, #ad1fff);
      overflow: hidden;
    }

    .bg-glass {
      background-color: hsla(0, 0%, 100%, 0.9) !important;
      backdrop-filter: saturate(200%) blur(25px);
    }
  </style>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
    <!-- Section: Design Block -->
    <section class="background-radial-gradient overflow-hidden">
        <div class="container px-4 py-5 px-md-5 text-center text-lg-start my-5">
            <div class="row gx-lg-5 align-items-center mb-5">
                <div class="col-lg-6 mb-5 mb-lg-0" style="z-index: 10">
                    <h3 class="my-5 display-5 fw-bold ls-tight" style="color: hsl(218, 81%, 95%)">
                        Vive una experiencia única en el mundo virtual junto a<br />
                        <span style="color: hsl(218, 81%, 75%)">Extreme Games</span>
                    </h3>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 position-relative">
                    <div id="radius-shape-1" class="position-absolute rounded-circle shadow-5-strong"></div>
                    <div id="radius-shape-2" class="position-absolute shadow-5-strong"></div>
                    <div class="card bg-glass">
                        <div class="card-body px-4 py-5 px-md-5">
                            <form method="post" action="recuperar_contrasena.php">
                                <div class="row">
                                    <h2 class="text-center">Recuperar contraseña</h2>                                       
                                    <br><br><br>
                                    <div class="col-md-12 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="email">Correo Electrónico</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Ingresa tu correo electrónico" required/>
                                        </div>
                                    </div>
                                </div>

                                                              
                                <br><br><br><br>                                
                                    <input type="submit" name="btnIngresar" value="Enviar al correo" class="btn btn-primary btn-block mx-auto d-block mb-4">                                                                     
                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-facebook-f"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-google"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-twitter"></i>
                                    </button>

                                    <button type="button" class="btn btn-link btn-floating mx-1">
                                        <i class="fab fa-github"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>                                 
    </section>
    <?php
        include("./dashboard/src/html/conexion_database.php");
        require 'phpmailer/PHPMailer.php';
        require 'phpmailer/SMTP.php';
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $correo = $_POST["email"];

            // Paso 1: Verificar si el correo existe en la base de datos
            // Aquí debes realizar una consulta a la base de datos para verificar si el correo ingresado existe en la tabla de tusuario.
            // Asegúrate de usar consultas preparadas para evitar inyecciones SQL.

            // Supongamos que ya tienes una conexión a la base de datos llamada $conexion
            $consulta = "SELECT * FROM tusuario WHERE correo_usu = ?";
            $stmt = $conexion->prepare($consulta);
            $stmt->bind_param("s", $correo);
            $stmt->execute();
            $resultado = $stmt->get_result();
            $usuario = $resultado->fetch_assoc();

            if (!$usuario) {
                // El correo no existe en la base de datos
                echo "El correo ingresado no está registrado en nuestro sistema.";
            } else {
                // El correo existe en la base de datos

            // Paso 2: Generar un token único y almacenarlo en la base de datos junto con la información de recuperación
            // Puedes utilizar la función random_bytes() para generar un token seguro.
            $token = bin2hex(random_bytes(32));

            // Almacena el token y otra información relevante en la tabla de tusuario o en una tabla separada para recuperación de contraseñas.
            // Aquí suponemos que tienes una columna "token_recuperacion" en la tabla de tusuario.
            $consulta = "UPDATE tusuario SET token = ?, fecha = DATE_ADD(NOW(), INTERVAL 1 HOUR) WHERE correo_usu = ?";
            $stmt = $conexion->prepare($consulta);
            $stmt->bind_param("ss", $token, $correo);
            $stmt->execute();



            try {
                // Crea una instancia de PHPMailer
                $mail = new PHPMailer();

                // Configuración del servidor SMTP (cambiar las opciones según tu proveedor de correo)
                $mail->isSMTP();
                $mail->Host       = 'smtp.tudominio.com'; // Cambiar por el servidor SMTP de tu proveedor de correo
                $mail->SMTPAuth   = true;
                $mail->Username   = 'tu_correo@tudominio.com'; // Cambiar por tu dirección de correo
                $mail->Password   = 'tu_contraseña'; // Cambiar por tu contraseña de correo
                $mail->SMTPSecure = 'tls';
                $mail->Port       = 587;

                // Configuración del remitente y destinatario
                $mail->setFrom('noreply@localhost.com', 'Tu Sitio Web');
                $mail->addAddress($correo, $usuario['nombre_usuario']);

                // Configuración del contenido del correo
                $mail->isHTML(true);
                $mail->Subject = 'Recuperación de contraseña';
                $mensaje = "Hola " . $usuario['nombre_usuario'] . ",\n\n";
                $mensaje .= "Has solicitado recuperar tu contraseña. Haz clic en el siguiente enlace para restablecerla:\n";
                $mensaje .= "http://localhost/restablecer_contrasena.php?token=" . urlencode($token) . "\n\n";
                $mensaje .= "Si no has solicitado esta recuperación, ignora este correo.\n";
                $mensaje .= "Este enlace expirará en una hora.\n\n";
                $mensaje .= "Gracias,\n";
                $mensaje .= "El equipo de tu sitio web";
                $mail->Body    = $mensaje;

                // Envía el correo electrónico
                if ($mail->send()) {
                    echo "Se ha enviado un correo con instrucciones para restablecer tu contraseña.";
                } else {
                    echo "Hubo un error al enviar el correo. Por favor, inténtalo de nuevo más tarde.";
                }
            } catch (Exception $e) {
                echo "Hubo un error al enviar el correo. Detalles del error: " . $mail->ErrorInfo;
            }

            $conexion->close();
        }
    ?>

</body>
</html>
