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
                            <form method="post" action="">
                                <div class="row">
                                    <h2 class="text-center">Iniciar Sesión</h2>                                       
                                    <?php                                        
                                        include('./controlador_login.php');
                                        if(!empty($mensajeError)){
                                            echo $mensajeError;
                                        }
                                    ?>
                                    <br><br>
                                    <div class="col-md-12 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="email">Correo Electrónico</label>
                                            <input type="email" id="email" name="email" class="form-control" placeholder="Ingresa tu correo electrónico" required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12 mb-4">
                                        <div class="form-outline">
                                            <label class="form-label" for="password">Contraseña</label>
                                            <input type="password" id="password" name="password" class="form-control" placeholder="Ingresa tu contraseña"  required/>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-check d-flex justify-content-start mb-4">
                                    <input class="form-check-input me-2" type="checkbox" value="" id="form2Example33"/>
                                    <label class="form-check-label" for="form2Example33">
                                        Recordarme
                                    </label>
                                </div>

                                    <input type="submit" name="btnIngresar" value="Iniciar Sesión" class="btn btn-primary btn-block mx-auto d-block mb-4">                                

                                <div class="text-center">
                                    <p>¿No tienes cuenta? <a href="crearcuenta.html">Crear una cuenta</a></p>
                                    <p><a href="recuperar_pass.html">¿Olvidaste tu contraseña? </a></p>
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
    <!-- Section: Design Block -->
</body>
</html>
</html>