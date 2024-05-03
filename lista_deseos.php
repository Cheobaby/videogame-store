<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Cyborg - Awesome HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/animate.css">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="assets/css/inicio.css">

<!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->
<style>
    .dropdown {
        position: relative;
        display: inline-block;
    }

    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        border-radius: 5px;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        transition: background-color 0.2s ease;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .dropdown .dropbtn {
        background-color: #041BF6; /* Cambia el color de fondo del botón */
        color: white; /* Cambia el color del texto del botón */
        padding: 12px 16px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }

    .dropdown .dropbtn img {
        margin-left: 5px; /* Ajusta el margen izquierdo de la imagen si es necesario */
    }

  </style>
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
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
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
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
  <!-- ***** Header Area End ***** -->

  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ***** Banner Start ***** -->
          <div class="row">
            <div class="col-lg-12">
              <div class="main-profile ">
                <div class="row">
                  <div class="col-lg-4 align-self-center">
                    <div class="main-info header-text">                      
                      <h4>Haciendo espacio para los deseos</h4>
                      <p>Llena esta lista con las consolas y experiencias que te esperan en el mundo gamer.</p>                     
                    </div>
                  </div>                  
                <div class="row">
                  <div class="col-lg-12">             
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->

          <!-- ***** Gaming Library Start ***** -->
          <div class="gaming-library profile-library">
            <div class="col-lg-12">
              <div class="heading-section">
                <h4><em>Tu lista de</em> Deseos</h4>
              </div>
              <?php
                include("./dashboard/src/html/conexion_database.php");

                // Realizar la consulta para obtener los juegos desde la base de datos
                //$sql = "SELECT * FROM TDeseos WHERE id_Usuario='$_SESSION['id_Usuario']'";
                //Aqui se realiza una consulta para saber los productos que mandaron a la lista de deseos por usuario
                $id_Usuario=$_SESSION['id_Usuario'];
                $consulta = "SELECT * FROM TProductos JOIN TDeseos ON TProductos.id_prod = TDeseos.id_prod WHERE id_Usuario = '$id_Usuario'";                
                $result = $conexion->query($consulta);

                if ($result->num_rows > 0) {
                  // output data of each row
                  while($row = $result->fetch_assoc()) {
                    $producto=$row['id_prod'];
                    $con="SELECT SUM(stock_inv) AS inv, COUNT(estatus_inv) AS dispo 
                    FROM tinventario 
                    WHERE id_prod = '$producto' AND estatus_inv = 'PR_1'";
                    $ress=$conexion->query($con);
                    $inventario=$ress->fetch_assoc();
                    echo '<div class="item">
                            <ul>
                              <li><img src="assets/images/'.$row["foto"].'" alt="" class="templatemo-item width="88" height="99""></li>
                              <li><h4>Nombre</h4><span>'.$row["nombre_Prod"].'</span></li>
                              <li><h4>Disponible</h4><span>'.($inventario['dispo']!='0' ? "Si" : "No").'</span></li>
                              <li><h4>Precio</h4><span>'.$row["precio_Uni"].'</span></li>
                              <li><h4>Stock</h4><span>'.$inventario["inv"].'</span></li>
                              <li><button class="btn btn-danger" data-id="'.$row["id_prod"].'">Eliminar</button></li>
                            </ul>
                          </div>';
                  }
                } else {
                  echo "0 Resultados";
                }
                $conexion->close();
                ?>

          <!-- ***** Gaming Library End ***** -->
        </div>
      </div>
    </div>
  </div>
  
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">Cyborg Gaming</a> Company. All rights reserved. 
          
          <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a>  Distributed By <a href="https://themewagon.com" target="_blank" >ThemeWagon</a></p>
        </div>
      </div>
    </div>
  </footer>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
  $(document).ready(function() {
    $('.btn-danger').click(function() {
      var button = $(this); // Almacena el botón en una variable antes de la solicitud AJAX
      var productId = button.data('id'); // Obtén el ID del producto desde el atributo 'data-id'
      $.ajax({
        url: 'eliminar_deseo.php', // Archivo PHP que manejará la eliminación del producto
        method: 'POST',
        data: { id: productId }, // Envía el ID del producto al archivo PHP
        success: function(response) {
          // Si la eliminación fue exitosa, elimina el elemento HTML del producto de la lista
          button.closest('.item').remove();
          location.reload(); // Actualiza la página
        },
        error: function(xhr, status, error) {
          console.log(xhr.responseText); // Muestra cualquier mensaje de error en la consola del navegador
        }
      });
    });
  });
</script>

</body>

</html>