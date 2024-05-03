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

  <title>Extreme Games jugadores</title>

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
  <br><br><br><br><br>
  <div class="container-fluid">
    <div class="row mt-4">
      <div id="carouselExampleCaptions" class="carousel slide w-100" data-bs-ride="carousel">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
            aria-current="true" aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
            aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2"
            aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="assets/images/carrusel4.jpg" class="d-block w-100" alt="..." height="500">
            <div class="carousel-caption d-none d-md-block">
              <h5>Xbox Series X</h5>
              <p class="text-white">"La Xbox Series X: la consola más ambiciosa de Microsoft, diseñada para ponérselo difícil a la competencia"..</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/play6.jpg" class="d-block w-100" alt="..." height="500">
            <div class="carousel-caption d-none d-md-block">
              <h5>PlayStation 5 Digital Edition</h5>
              <p class="text-white">"La consola que redefine lo que una consola PlayStation puede hacer, con una potencia y velocidad impresionantes para una experiencia de juego sin precedentes".</p>
            </div>
          </div>
          <div class="carousel-item">
            <img src="assets/images/carruselswitch.png" class="d-block w-100" alt="..." height="500">
            <div class="carousel-caption d-none d-md-block">
              <h5>Nintendo Switch</h5>
              <p class="text-white">"La Nintendo Switch: la consola que te permite jugar en cualquier lugar, en cualquier momento, con una experiencia de juego única y personalizada"..</p>
            </div>
          </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
          data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Siguiente</span>
        </button>
      </div>
    </div>
  </div>
  <br><br><br>                        
  <div class="container">
  <h3>
    "¿Buscas la mejor experiencia de juego? Descubre nuestra selección de consolas de videojuegos y lleva tu juego al siguiente nivel"
  </h3>
</div>
  <!-- ** Header Area End ** -->
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <div class="page-content">

          <!-- ** Featured Games Start ** -->
          <!-- ** Featured Games Start ** -->
          <?php
              $sucursal=$_SESSION['sucursal'];
              include("./dashboard/src/html/conexion_database.php");
  
              $sql = "SELECT DISTINCT tinventario.id_prod,nombre_Prod,id_Cate,
              estatus_inv,descripcion_Prod,precio_Uni,foto,id_suc,stock_inv
              FROM tinventario
              JOIN tproductos ON tproductos.id_prod=tinventario.id_prod
              WHERE id_Cate='x_1' AND estatus_inv!='PR_0' AND id_suc='$sucursal'";
              $result = $conexion->query($sql);
            ?>

            <div class="row">
              <div class="col-lg-12">
                <div class="featured-games header-text">
                  <div class="heading-section">
                    <h4><em>Categoría</em> Xbox</h4>
                  </div>
                  <div class="owl-features owl-carousel">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="item">
                      <div class="thumb">
                        <?php $rutaImagen = "assets/images/" . $row['foto']; ?>
                        <img src="<?php echo $rutaImagen; ?>" alt="" width="150" height='270' onclick="redireccionar('<?php echo $row['id_prod']; ?>')">
                        <div class="hover-effect">
                        <?php 
                          if (!empty($_SESSION['id_Usuario'])){
                            if($row['stock_inv']<1){
                              echo '<button class="btn btn-secondary">Agotado</button>';
                            }
                            else{                              
                              echo '<button class="btn btn-primary agregar-carrito" data-id="' . $row['id_prod'] . '" data-usuario="' . $_SESSION['id_Usuario'] . '">Agregar al carrito</button>';
                            }                                                            
                          }
                          else {
                            echo '<button class="btn btn-primary">Agregar al carrito</button>';
                          }                         
                        ?>                          
                      </div>
                      </div>
                      <h4>
                        <?php echo $row['nombre_Prod']; ?><br><span>
                          <?php echo $row['precio_Uni']; ?> MX
                        </span>
                      </h4>
                      <div class="row">
                        <ul style="margin-top: 1; padding-top: 1;">
                          <li style="text-align: left;"><a
                              href="agregar_deseos.php?id=<?php echo $row['id_prod']; ?>">Agregar a lista de deseos
                              <i class="fa fa-heart"></i></a></li>
                          <li style="text-align: left;">
                            <?php echo "Disponibles: " . $row['stock_inv'] . " "; ?><i class="fa fa-cubes"></i>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <?php } ?>
                    <?php $conexion->close(); ?>
                  </div>
                </div>
              </div>
            </div>      
            <br>

          <!-- ** Featured Games End ** -->

          <!-- ** Featured Games Start ** -->
          <?php
              $sucursal=$_SESSION['sucursal'];
              include("./dashboard/src/html/conexion_database.php");
  
              $sql = "SELECT DISTINCT tinventario.id_prod,nombre_Prod,id_Cate,
              estatus_inv,descripcion_Prod,precio_Uni,foto,id_suc,stock_inv
              FROM tinventario
              JOIN tproductos ON tproductos.id_prod=tinventario.id_prod
              WHERE id_Cate='pl_1' AND estatus_inv!='PR_0' AND id_suc='$sucursal'";
              $result = $conexion->query($sql);
            ?>

            <div class="row">
              <div class="col-lg-12">
                <div class="featured-games header-text">
                  <div class="heading-section">
                    <h4><em>Categoría</em> PLAY STATIONx</h4>
                  </div>
                  <div class="owl-features owl-carousel">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="item">
                      <div class="thumb">
                        <?php $rutaImagen = "assets/images/" . $row['foto']; ?>
                        <img src="<?php echo $rutaImagen; ?>" alt="" width="150" height='270' onclick="redireccionar('<?php echo $row['id_prod']; ?>')">
                        <div class="hover-effect">
                        <?php 
                          if (!empty($_SESSION['id_Usuario'])){
                            if($row['stock_inv']<1){
                              echo '<button class="btn btn-secondary">Agotado</button>';
                            }
                            else{                              
                              echo '<button class="btn btn-primary agregar-carrito" data-id="' . $row['id_prod'] . '" data-usuario="' . $_SESSION['id_Usuario'] . '">Agregar al carrito</button>';
                            }                                                            
                          }
                          else {
                            echo '<button class="btn btn-primary">Agregar al carrito</button>';
                          }                         
                        ?>                          
                      </div>
                      </div>
                      <h4>
                        <?php echo $row['nombre_Prod']; ?><br><span>
                          <?php echo $row['precio_Uni']; ?> MX
                        </span>
                      </h4>
                      <div class="row">
                        <ul style="margin-top: 1; padding-top: 1;">
                          <li style="text-align: left;"><a
                              href="agregar_deseos.php?id=<?php echo $row['id_prod']; ?>">Agregar a lista de deseos
                              <i class="fa fa-heart"></i></a></li>
                          <li style="text-align: left;">
                            <?php echo "Disponibles: " . $row['stock_inv'] . " "; ?><i class="fa fa-cubes"></i>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <?php } ?>
                    <?php $conexion->close(); ?>
                  </div>
                </div>
              </div>
            </div>                        
            <br>
            <!-- ** Featured Games Start ** -->
            <!-- ** Featured Games Start ** -->
            <?php
              $sucursal=$_SESSION['sucursal'];
              include("./dashboard/src/html/conexion_database.php");
              $usu=$_SESSION['id_Usuario'];
              $sql = "SELECT DISTINCT tinventario.id_prod,nombre_Prod,id_Cate,
              estatus_inv,descripcion_Prod,precio_Uni,foto,id_suc,stock_inv
              FROM tinventario
              JOIN tproductos ON tproductos.id_prod=tinventario.id_prod
              WHERE id_Cate='sw_1' AND estatus_inv!='PR_0' AND id_suc='$sucursal'";
              $result = $conexion->query($sql);
            ?>

            <div class="row">
              <div class="col-lg-12">
                <div class="featured-games header-text">
                  <div class="heading-section">
                    <h4><em>Categoría</em> SWITCH</h4>
                  </div>
                  <div class="owl-features owl-carousel">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="item">
                      <div class="thumb">
                        <?php $rutaImagen = "assets/images/" . $row['foto']; ?>
                        <img src="<?php echo $rutaImagen; ?>" alt="" width="150" height='270' onclick="redireccionar('<?php echo $row['id_prod']; ?>')">
                        <div class="hover-effect">
                        <?php 
                          if (!empty($_SESSION['id_Usuario'])){
                            if($row['stock_inv']<1){
                              echo '<button class="btn btn-secondary">Agotado</button>';
                            }
                            else{                              
                              echo '<a href="agreagar_carro_catalogo.php?id_prod=' . $row['id_prod'] . '&id_usu=' . $usu . '" class="btn btn-primary ' . $row['id_prod'] . '" name="btnAgregar">Agregar al carrito</a>';
                            }                                                            
                          }
                          else {
                            echo '<button class="btn btn-primary">Agregar al carrito</button>';
                          }                         
                        ?>                          
                      </div>
                      </div>
                      <h4>
                        <?php echo $row['nombre_Prod']; ?><br><span>
                          <?php echo $row['precio_Uni']; ?> MX
                        </span>
                      </h4>
                      <div class="row">
                        <ul style="margin-top: 1; padding-top: 1;">
                          <li style="text-align: left;"><a
                              href="agregar_deseos.php?id=<?php echo $row['id_prod']; ?>">Agregar a lista de deseos
                              <i class="fa fa-heart"></i></a></li>
                          <li style="text-align: left;">
                            <?php echo "Disponibles: " . $row['stock_inv'] . " "; ?><i class="fa fa-cubes"></i>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <?php } ?>
                    <?php $conexion->close(); ?>
                  </div>
                </div>
              </div>
            </div>  
            <br>            
            <!-- ** Featured Games Start ** -->
            <?php
              $sucursal=$_SESSION['sucursal'];
              include("./dashboard/src/html/conexion_database.php");
  
              $sql = "SELECT DISTINCT tinventario.id_prod,nombre_Prod,id_Cate,
              estatus_inv,descripcion_Prod,precio_Uni,foto,id_suc,stock_inv
              FROM tinventario
              JOIN tproductos ON tproductos.id_prod=tinventario.id_prod
              WHERE id_Cate='gm_1' AND estatus_inv!='PR_0' AND id_suc='$sucursal'";
              $result = $conexion->query($sql);
            ?>

            <div class="row">
              <div class="col-lg-12">
                <div class="featured-games header-text">
                  <div class="heading-section">
                    <h4><em>Categoría</em> GAME BOY</h4>
                  </div>
                  <div class="owl-features owl-carousel">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="item">
                      <div class="thumb">
                        <?php $rutaImagen = "assets/images/" . $row['foto']; ?>
                        <img src="<?php echo $rutaImagen; ?>" alt="" width="150" height='270' onclick="redireccionar('<?php echo $row['id_prod']; ?>')">
                        <div class="hover-effect">
                        <?php 
                          if (!empty($_SESSION['id_Usuario'])){
                            if($row['stock_inv']<1){
                              echo '<button class="btn btn-secondary">Agotado</button>';
                            }
                            else{                              
                              echo '<button class="btn btn-primary agregar-carrito" data-id="' . $row['id_prod'] . '" data-usuario="' . $_SESSION['id_Usuario'] . '">Agregar al carrito</button>';
                            }                                                            
                          }
                          else {
                            echo '<button class="btn btn-primary">Agregar al carrito</button>';
                          }                         
                        ?>                          
                      </div>
                      </div>
                      <h4>
                        <?php echo $row['nombre_Prod']; ?><br><span>
                          <?php echo $row['precio_Uni']; ?> MX
                        </span>
                      </h4>
                      <div class="row">
                        <ul style="margin-top: 1; padding-top: 1;">
                          <li style="text-align: left;"><a
                              href="agregar_deseos.php?id=<?php echo $row['id_prod']; ?>">Agregar a lista de deseos
                              <i class="fa fa-heart"></i></a></li>
                          <li style="text-align: left;">
                            <?php echo "Disponibles: " . $row['stock_inv'] . " "; ?><i class="fa fa-cubes"></i>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <?php } ?>
                    <?php $conexion->close(); ?>
                  </div>
                </div>
              </div>
            </div>
            <br>
            <!-- ** Featured Games Start ** -->            
            <?php
              $sucursal=$_SESSION['sucursal'];
              include("./dashboard/src/html/conexion_database.php");
  
              $sql = "SELECT DISTINCT tinventario.id_prod,nombre_Prod,id_Cate,
              estatus_inv,descripcion_Prod,precio_Uni,foto,id_suc,stock_inv
              FROM tinventario
              JOIN tproductos ON tproductos.id_prod=tinventario.id_prod
              WHERE id_Cate='ac_1' AND estatus_inv!='PR_0' AND id_suc='$sucursal'";
              $result = $conexion->query($sql);
            ?>            
            <div class="row">
              <div class="col-lg-12">
                <div class="featured-games header-text">
                  <div class="heading-section">
                    <h4><em>Categoría</em> PERIFERICOS</h4>
                  </div>
                  <div class="owl-features owl-carousel">
                    <?php while ($row = $result->fetch_assoc()) { ?>
                    <div class="item">
                      <div class="thumb">
                        <?php $rutaImagen = "assets/images/" . $row['foto']; ?>
                        <img src="<?php echo $rutaImagen; ?>" alt="" width="150" height='270' onclick="redireccionar('<?php echo $row['id_prod']; ?>')">
                        <div class="hover-effect">
                        <?php 
                          if (!empty($_SESSION['id_Usuario'])){
                            if($row['stock_inv']<1){
                              echo '<button class="btn btn-secondary">Agotado</button>';
                            }
                            else{                              
                              echo '<button class="btn btn-primary agregar-carrito" data-id="' . $row['id_prod'] . '" data-usuario="' . $_SESSION['id_Usuario'] . '">Agregar al carrito</button>';
                            }                                                            
                          }
                          else {
                            echo '<button class="btn btn-primary">Agregar al carrito</button>';
                          }                         
                        ?>                          
                      </div>
                      </div>
                      <h4>
                        <?php echo $row['nombre_Prod']; ?><br><span>
                          <?php echo $row['precio_Uni']; ?> MX
                        </span>
                      </h4>
                      <div class="row">
                        <ul style="margin-top: 1; padding-top: 1;">
                          <li style="text-align: left;"><a
                              href="agregar_deseos.php?id=<?php echo $row['id_prod']; ?>">Agregar a lista de deseos
                              <i class="fa fa-heart"></i></a></li>
                          <li style="text-align: left;">
                            <?php echo "Disponibles: " . $row['stock_inv'] . " "; ?><i class="fa fa-cubes"></i>
                          </li>
                        </ul>
                      </div>
                    </div>
                    <?php } ?>
                    <?php $conexion->close(); ?>
                  </div>
                </div>
              </div>
            </div>

            
        
          



        </div>  
        </div>
        <!-- ** Featured Games Start ** -->




        <!-- ** Featured Games End ** -->
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


  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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