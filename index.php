<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
    rel="stylesheet">

  <title>Extreme Games Catalogo</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="assets/css/inicio.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
  <!--

TemplateMo 579 Cyborg Gaming

https://templatemo.com/tm-579-cyborg-gaming

-->

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
          <div class="main-banner">
            <div class="row">
              <div class="col-lg-7">
                <div class="header-text">
                  <h6>Bienvenido a Extreme Games</h6>
                  <h4><em>!!</em>Elige tu sucursal<em>!!</em></h4>
                  <?php                    
                      include("./dashboard/src/html/conexion_database.php");
                      $sql="SELECT *FROM tsucursal";
                      $consulta = $conexion->query($sql);
                      if ($consulta->num_rows > 0){
                        echo '<div class="container mt-5">';
                        echo '<div class="btn-group">';
                        echo '<select id="sucursalSelector" class="form-select">';
                        $suc='';
                        echo '<option value="" selected>Selecciona una sucursal</option>';
                          while ($row = $consulta->fetch_assoc()){                              
                                echo '<option value="' . $row['id_suc'] . '">' . $row['nombre_Sucur'] . '</option>';                              
                              /*//echo "<option value='" . $row['id_Cate'] . "'>" . $row['nombre_Cate'] . "</option>";
                              echo '<input class="form-check-input" type="checkbox" name="sucursal[]" value="' . $row['id_suc'] . '">';
                              echo '<label class="form-check-label" for="sucursal1">' . $row['nombre_Sucur'] . '</label><br>'; */                            
                          }   
                                              
                          $sucursal=$_SESSION['sucursal'];
                          echo '</select>';
                          echo '</div>';
                          echo '</div>';
                      }
                      $conexion->close();                                   
                  ?>

                  <!--<div class="main-button">
                    <a href="catalogo01.php">Explorar Ahora</a>
                  </div>-->
                </div>
              </div>
            </div>
          </div>
          <!-- ***** Banner End ***** -->
              
          <!-- ***** Most Popular Start ***** -->
          <div class="most-popular">
            <div class="row">
              <div class="col-lg-12">
                <div class="heading-section">
                  <h4 class=text-primary><em>CONOCE NUESTROS</em> PRODUCTOS!!</h4>
                </div>
                <?php
                  include("./dashboard/src/html/conexion_database.php");                                                                      
                    $sucursal=$_SESSION['sucursal'];  
                    $sql = "SELECT *
                    FROM tinventario
                    JOIN tproductos ON tproductos.id_prod=tinventario.id_prod  
                    WHERE  id_suc='$sucursal'                
                    ORDER BY RAND()
                    LIMIT 8";
                    $result = $conexion->query($sql);                                                                    
                ?>

                <div class="row">
                  <?php
                  $usu=$_SESSION['id_Usuario'];
                  while ($row = $result->fetch_assoc()) {
                    echo '<div class="col-lg-3 col-sm-6">';
                    echo '<div class="item">';
                    $rutaImagen = "assets/images/" . $row['foto'];
                    echo '<img src="' . $rutaImagen . '" alt="" width="150" height="270" onclick="redireccionar(\'' . $row['id_prod'] . '\')">';
                    echo '<h4>' . $row['nombre_Prod'] . '<br><span>' . $row['precio_Uni'] . ' MX</span></h4>';
                    echo '<div class="row">';
                    echo '<ul style="margin-top: 1; padding-top: 1;">';
                    echo '<li style="text-align: left;"><a href="agregar_deseos.php?id=' . $row['id_prod'] . '">Agregar a lista de deseos <i class="fa fa-heart"></i></a></li>';
                    echo '<li style="text-align: left;">Disponibles: ' . $row['stock_inv'] . ' <i class="fa fa-cubes"></i></li>';
                    echo '</ul>';
                    echo '</div>';
                    if (!empty($_SESSION['id_Usuario'])) {
                      if($row['stock_inv']<1 || $row['estatus_inv']=='PR_0'){
                        echo '<button class="btn btn-secondary">Agotado</button>';
                      }
                      else{                              
                        echo '<a href="agregar_car.php?id_prod=' . $row['id_prod'] . '&id_usu=' . $usu . '" class="btn btn-primary ' . $row['id_prod'] . '" name="btnAgregar">Agregar al carrito</a>';
                      }                                                            
                    }
                    else {
                      echo '<button class="btn btn-primary">Agregar al carrito</button>';
                    }
                    echo '</div>';
                    echo '</div>';
                  }
                  ?>
                </div>               
              </div>
            </div>
          </div>
        </div>

        <!-- ***** Most Popular End ***** -->

        <!-- ***** Gaming Library Start ***** -->       
        <!-- ***** Gaming Library End ***** -->
      </div>
    </div>
  </div>  

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <p>Copyright © 2036 <a href="#">Extreme Games</a> Company. All rights reserved.

            <br>Design: <a href="https://templatemo.com" target="_blank" title="free CSS templates">TemplateMo</a>
            Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
          </p>
        </div>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script>
  $(document).ready(function() {
    $('.agregar-carrito').click(function() {
      var id_prod = $(this).data('id');
      var usuario = $(this).data('usuario');

      $.ajax({
        url: 'agregar_al_carrito.php',
        type: 'POST',
        data: {
          id_prod: id_prod,
          usuario: usuario,
          cantidad_venta: 1,
          estatus: 'pendiente'
        },
        dataType: 'json',
        success: function(response) {
          if (response.status === 'success') {
            alert(response.message);
          } else {
            alert('Error al agregar el producto al carrito');
          }
        },
        error: function() {
          alert('Error al comunicarse con el servidor');
        }
      });
    });
  });
</script>
  <script>
    function redireccionar(prod) {
      window.location.href = "http://localhost/games/descripcion_producto.php?prod=" + prod;
    }
  </script>

<script>
document.getElementById("sucursalSelector").addEventListener("change", function() {
  var selectedValue = this.value; // Obtiene el valor seleccionado

  // Redirige a la página deseada con el valor seleccionado como parámetro
  window.location.href = "guardar_sucursal.php?sucursal=" + encodeURIComponent(selectedValue);
});
</script>
  <!-- Bootstrap core JavaScript -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

  <script src="assets/js/isotope.min.js"></script>
  <script src="assets/js/owl-carousel.js"></script>
  <script src="assets/js/tabs.js"></script>
  <script src="assets/js/popup.js"></script>
  <script src="assets/js/custom.js"></script>


</body>

</html>