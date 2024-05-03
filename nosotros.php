<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
      rel="stylesheet"
    />
    <link
      href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
      rel="stylesheet"
    />
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
    ></script>
    <script
      type="text/javascript"
      src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"
    ></script>
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
      rel="stylesheet"
    />

    <!-- Replace "test" with your own sandbox Business account app client ID -->
    <script src="https://www.paypal.com/sdk/js?client-id=AfEnx4YSylmHH5r63xrGz9jiPzp-DDZ0d66w8HKAlS6G7hv8Lu38_tilLM8q6jTkwl-B1ZCXviydd8_R&currency=MXN"></script>
    <title>Extreme Games jugadores</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css" />
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css" />
    <link rel="stylesheet" href="assets/css/owl.css" />
    <link rel="stylesheet" href="assets/css/animate.css" />
    <link rel="stylesheet" href="assets/css/inicio.css">

    <link
      rel="stylesheet"
      href="assets/css/animaciones_descripcion_producto.css"
    />
    <link rel="stylesheet" href="assets/css/animacion_barra_nav.css" />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@7/swiper-bundle.min.css"
    />
    <!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->
    <style>
      ::-webkit-scrollbar {
        width: 8px;
      }

      /* Track */
      ::-webkit-scrollbar-track {
        background: #f1f1f1;
      }

      /* Handle */
      ::-webkit-scrollbar-thumb {
        background: #888;
      }

      /* Handle on hover */
      ::-webkit-scrollbar-thumb:hover {
        background: #555;
      }

      /*body {
        font-family: "Montserrat", sans-serif;
        background: #ffffff;
        padding: 0;
        margin: 0;
      }*/

      .menu {
        width: 44px;
        position: relative;
        top: -10px;
        height: 3px;
        background: #00000054;
        box-shadow: 0px 11px #ff00006b, 1px 22px #66b78d;
      }

      nav {
        padding: 8px;
        height: 44px;
        color: #909090;
        font-weight: lighter;
        display: flex;
        justify-content: space-between;
        align-items: center;
      }

      h2 {
        font-weight: lighter;
      }

      header {
        width: 100%;
        height: auto;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.15);
      }

      .about {
        text-align: center;
        color: gray;
        padding: 40px;
      }

      .title {
        font-size: 22px;
        color: #2c2c2c;
      }

      .desc {
        color: #909090;
        font-weight: 300;
        font-size: 1.1em;
        line-height: 1.45em;
        margin-bottom: 15px;
        margin-top: 30px;
        width: 70%;
        margin: 0 auto;
      }

      @media (max-width: 630px) {
        .title {
          font-size: 18px;
        }
      }

      .row {
        width: 95%;
        display: flex;
        padding: 10px;
        justify-content: center;
      }

      @media (max-width: 494px) {
        .row {
          flex-direction: column;
        }
      }

      .card {
        display: flex;
        text-align: center;
        justify-content: center;
        flex-direction: column;
        align-items: center;
        margin: 10px;
      }

      .card_img {
        width: 100px;
        height: 100px;
        border-radius: 50%;
        box-shadow: 0 9px 30px -6px rgba(24, 206, 15, 0.3);
        position: relative;
        transition: transform 0.4s;
      }

      .fas,
      .fab {
        display: inline-block;
        position: absolute;
        color: #63b563;
        transform: translate(-52%, 75%);
        font-size: 40px;
      }

      .card_title {
        font-size: 20px;
        margin: 12px;
        font-weight: bold;
        color: #000000a8;
        transition: color 0.2s;
      }

      .card:hover .card_title {
        color: #4bd482;
      }

      .card:hover .card_img {
        transform: translate(0px, -10px);
      }

      .card_body {
        color: #8c9490;
        font-size: 16px;
        padding: 0 5px;
        line-height: 1.5;
        word-spacing: 4px;
      }
    </style>
  </head>

  <body className="snippet-body">
  <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css"
  integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <!-- ** Preloader Start ** -->
    <div id="js-preloader" class="js-preloader">
      <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
          <span></span>
          <span></span>
          <span></span>
        </div>
      </div>
    </div>
    <!-- ** Preloader End ** -->

    <!-- ** Header Area Start ** -->
    <header class="header-area header-sticky">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.php" class="logo">
              <img src="assets/images/logo07.png" alt="ControlIcon" height="66">
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Search End ***** -->
            <div class="search-input">
              <form id="search" action="buscador.php" method='POST'>
                <input type="text" placeholder="Buscar" id='searchText' name="searchKeyword" onkeypress="handle" />
                <i class="fa fa-search"></i>
              </form>              
            </div>


            <!-- ***** Search End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li><a href="index.php" class="text-primary">Inicio</a></li>
              <li><a href="catalogo01.php" class="text-primary">Catálogo</a></li>
              <li>
              <a href="nosotros.php" class="text-primary">Detalles</a>
              </li>


              <li><a href="carro.php">
                  <?php 
                          if(!empty($_SESSION["nombre_usuario"])){
                            echo '<span class="text-primary">Carrito</span>';
                          }?>
                </a></li>
              <li><a href="lista_deseos.php">
                  <?php 
                          if(!empty($_SESSION["nombre_usuario"])){
                            echo '<span class="text-primary">Deseos</span>';
                          }?>
                </a></li>
              <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">
                  <?php 
                          if(!empty($_SESSION["nombre_usuario"])){
                            echo '<span class="text-primary">'.$_SESSION["nombre_usuario"].'</span>';
                          }else echo "Iniciar Sesión";?> <img src="assets/images/profile-header.jpg" alt="">
                </a>
                <div class="dropdown-content">
                  <a href="login.php">Iniciar Sesión</a>
                  <a href="crearcuenta.html">Crear Cuenta</a>
                  <a href="cerrar_sesion.php">Cerrar Sesión</a>
                  <a href="mis_compras.php">Compras</a>
                </div>
              </li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>

            <!-- ***** Menu End ***** -->
          </nav>
          </div>
        </div>
      </div>
    </header>
    <br /><br /><br /><br /><br />

    <!-- ** Header Area End ** -->
    
      <div class="featured-games header-text">
        <div class="heading-section">
          <h4 class="text-center text-primary">
            
          </h4>
        </div>
        <main>
          <div class="about">
            <div class="title">
              <h1>Acerca de nosotros</h1>
            </div>
            <br>
            <div class="container-fluid">
              <p>
              ¡Bienvenido a CodeCraft! Somos un equipo apasionado de desarrolladores de software que se dedica a crear soluciones innovadoras para desafíos tecnológicos. Nuestra historia comienza con un grupo de amigos que compartían una visión común: utilizar la magia del código para dar vida a ideas revolucionarias.
En CodeCraft, creemos que el software es una forma de arte. Al igual que los artesanos, nos esforzamos por perfeccionar nuestras habilidades y crear productos de calidad excepcional. Cada línea de código que escribimos es cuidadosamente diseñada y probada para garantizar que nuestros productos sean robustos, seguros y eficientes.
              </p>
            </div>
          </div>
          <div class="row">
            <div class="card">
              <div class="card_img">
                <i class="fas fa-rocket"></i>
              </div>
              <div class="card_title">HTML</div>
              <div class="card_body">
                <p>En nuestra empresa, el manejo de HTML es fundamental para el desarrollo de nuestros servicios en línea. Conocer los conceptos de este lenguaje de marcado nos permite realizar cambios en nuestro sitio web sin necesidad de depender de terceros.</p>
              </div>
            </div>
            <div class="card">
              <div class="card_img">
                <i class="fab fa-cloudversify"></i>
              </div>
              <div class="card_title">CSS</div>
              <div class="card_body">
                <p>Como desarrolladores hemos adquirido habilidades sólidas en el manejo de CSS, lo que me ha permitido crear diseños atractivos y funcionales para sitios web. Con CSS, puedo aplicar reglas y estilos a los elementos de una página web, como fuentes, colores, tamaños y disposición, para lograr una presentación visualmente agradable y coherente.</p>
              </div>
            </div>
            <div class="card">
              <div class="card_img">
                <i class="fas fa-user-astronaut"></i>
              </div>
              <div class="card_title">JAVASCRIPT</div>
              <div class="card_body">
                <p>JavaScript es fundamental para el desarrollo de nuestros servicios. Conocer los conceptos básicos de este lenguaje de programación nos permite crear contenido dinámico e interactivo en nuestro sitio web.</p>
              </div>
            </div>
          </div>
        </main>
      </div>
    </div>

    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p>
              Copyright © 2036 <a href="#">Cyborg Gaming</a> Company. All rights
              reserved.

              <br />Design:
              <a
                href="https://templatemo.com"
                target="_blank"
                title="free CSS templates"
                >TemplateMo</a
              >
              Distributed By
              <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </p>
          </div>
        </div>
      </div>
    </footer>

    <script
      type="text/javascript"
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"
    ></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script
      type="text/javascript"
      src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.bundle.min.js"
    ></script>
    <script type="text/javascript" src="#"></script>
    <script type="text/javascript" src="#"></script>
    <script type="text/javascript" src="#"></script>
    <script type="text/javascript">      
    </script>
    <script type="text/javascript">
      var myLink = document.querySelector('a[href="#"]');
      myLink.addEventListener("click", function (e) {
        e.preventDefault();
      });
    </script>

    <!-- Scripts -->
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/popup.js"></script>
    <script src="assets/js/custom.js"></script>
  </body>
</html>
