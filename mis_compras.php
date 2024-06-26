<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link href='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css' rel='stylesheet'>
  <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
  <script type='text/javascript' src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <!-- Replace "test" with your own sandbox Business account app client ID -->
  <script
    src="https://www.paypal.com/sdk/js?client-id=AfEnx4YSylmHH5r63xrGz9jiPzp-DDZ0d66w8HKAlS6G7hv8Lu38_tilLM8q6jTkwl-B1ZCXviydd8_R&currency=MXN"></script>
  <title>Extreme Games jugadores</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/animaciones_descripcion_producto.css">
  <link rel="stylesheet" href="assets/css/mis_compras.css">
  <link rel="stylesheet" href="assets/css/animacion_barra_nav.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->

</head>

<body className='snippet-body'>

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
            <!-- ** Logo Start ** -->
            <a href="index.html" class="logo">
              <img src="assets/images/logo07.png" alt="ControlIcon" height="66">
            </a>
            <!-- ** Logo End ** -->
            <!-- ** Search End ** -->
            <div class="search-input">
              <form id="search" action="#">
                <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword"
                  onkeypress="handle" />
                <i class="fa fa-search"></i>
              </form>
            </div>
            <!-- ** Search End ** -->
            <!-- ** Menu Start ** -->
            <ul class="nav">
              <li><a href="index.php" class="active">Inicio</a></li>
              <li><a href="catalogo01.php">Catálogo</a></li>
              <li><a href="details.php">Detalles</a></li>

              <li><a href="carro.php">
                  <?php 
                          if(!empty($_SESSION["nombre_usuario"])){
                            echo "Carrito";
                          }?>
                </a></li>
              <li><a href="lista_deseos.php">
                  <?php 
                          if(!empty($_SESSION["nombre_usuario"])){
                            echo "Deseos";
                          }?>
                </a></li>
              <li class="dropdown">
                <a href="javascript:void(0)" class="dropbtn">
                  <?php 
                          if(!empty($_SESSION["nombre_usuario"])){
                            echo $_SESSION["nombre_usuario"];
                          }else echo "Iniciar Sesión";?> <img src="assets/images/profile-header.jpg" alt="">
                </a>
                <div class="dropdown-content">
                  <a href="login.php">Iniciar Sesión</a>
                  <a href="crearcuenta.html">Crear Cuenta</a>
                  <a href="cerrar_sesion.php">Cerrar Sesión</a>
                </div>
              </li>
            </ul>
            <a class='menu-trigger'>
              <span>Menu</span>
            </a>
            <!-- ** Menu End ** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <br><br><br><br><br>

  <!-- ** Header Area End ** -->
  <div class="container-fluid">
    <div class="featured-games header-text">
      <div class="heading-section">
        <h4 class="text-center text-primary"><em>Mis</em> Compras</h4>
      </div>
      <div class="cart_container">
        <?php
          include("./dashboard/src/html/conexion_database.php");
          $usuario=$_SESSION['id_Usuario'];
          $sql = "SELECT *FROM tventas 
          JOIN tproductos ON tventas.id_prod=tproductos.id_prod
          WHERE tventas.usuario_ven='$usuario'";
          
          $result = $conexion->query($sql);
          
          // Verificar si se encontraron resultados
          if ($result->num_rows > 0) {
              // Iterar sobre los resultados y mostrar los productos
              while ($row = $result->fetch_assoc()) {
                $urlImagen = "assets/images/".$row['foto'];
                  $cartItem = '<div class="cart_container">
                  <div class="cart_items">
                    <ul class="cart_list">
                  <li class="cart_item clearfix">                        
                        <div class="cart_item_image"><img src="' . $urlImagen . '" alt="">
                        </div>
                        <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                          <div class="cart_item_name cart_info_col">
                            <div class="cart_item_title ">Nombre</div>
                            <div class="cart_item_text">' . $row["nombre_Prod"] . '</div>
                          </div>
                          <div class="cart_item_quantity cart_info_col">
                            <div class="cart_item_title">Cantidad</div>
                            <div class="cart_item_text text-center">' . $row["cant_prod"] . '</div>
                          </div>
                          <div class="cart_item_price cart_info_col">
                            <div class="cart_item_title">Fecha Compra</div>
                            <div class="cart_item_text text-center">' . $row["date_comp"] . '</div>
                          </div>
                          <div class="cart_item_price cart_info_col">
                            <div class="cart_item_title">Precio</div>
                            <div class="cart_item_text text-center">' . $row["precio_Uni"] . '</div>
                          </div>
                          <div class="cart_item_total cart_info_col">
                            <div class="cart_item_title">Total</div>
                            <div class="cart_item_text text-center">' . $row["tot_ven"] . '</div>
                          </div>
                        </div>
                      </li>
                      </div>
                      </div>';
          
                  echo $cartItem;
              }
          } 
          
          // Cerrar la conexión a la base de datos
          $conexion->close();
        ?>
      </div>
    </div>
  </div>


    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <p>Copyright © 2036 <a href="#">Cyborg Gaming</a> Company. All rights reserved.

              <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a>
              Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
            </p>
          </div>
        </div>
      </div>
    </footer>


    <script type='text/javascript'
      src='https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js'></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


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