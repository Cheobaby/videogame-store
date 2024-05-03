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

  <!-- Replace "test" with your own sandbox Business account app client ID -->
  <script src="https://www.paypal.com/sdk/js?client-id=AfEnx4YSylmHH5r63xrGz9jiPzp-DDZ0d66w8HKAlS6G7hv8Lu38_tilLM8q6jTkwl-B1ZCXviydd8_R&currency=MXN"></script>
  <title>Extreme Games jugadores</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/templatemo-cyborg-gaming.css">
  <link rel="stylesheet" href="assets/css/owl.css">
  <link rel="stylesheet" href="assets/css/animate.css">
  <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
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
      box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
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
      background-color: #041BF6;
      /* Cambia el color de fondo del botón */
      color: white;
      /* Cambia el color del texto del botón */
      padding: 12px 16px;
      border: none;
      cursor: pointer;
      border-radius: 5px;
    }

    .dropdown .dropbtn img {
      margin-left: 5px;
      /* Ajusta el margen izquierdo de la imagen si es necesario */
    }

    @media (min-width: 1025px) {
      .h-custom {
        height: 100vh !important;
      }
    }

    .card-registration .select-input.form-control[readonly]:not([disabled]) {
      font-size: 1rem;
      line-height: 2.15;
      padding-left: .75em;
      padding-right: .75em;
    }

    .card-registration .select-arrow {
      top: 13px;
    }

    .bg-grey {
      background-color: #eae8e8;
    }

    @media (min-width: 992px) {
      .card-registration-2 .bg-grey {
        border-top-right-radius: 16px;
        border-bottom-right-radius: 16px;
      }
    }

    @media (max-width: 991px) {
      .card-registration-2 .bg-grey {
        border-bottom-left-radius: 16px;
        border-bottom-right-radius: 16px;
      }
    }
  </style>
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



  <!-- ** Header Area End ** -->
  <div class="container-fluid">
    <div class="featured-games header-text">
      <div class="heading-section">
        <h4 class="text-center"><em>Carrito de</em> Compras</h4>
      </div>
      <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12">
            <div class="card card-registration card-registration-2" style="border-radius: 15px;">
              <div class="card-body p-0">
                <div class="row g-0">
                  <div class="col-lg-8">
                    <div class="p-5">
                      <div class="d-flex justify-content-between align-items-center mb-5">
                        <h1 class="fw-bold mb-0 text-black">Productos añadidos</h1>
                        
                      </div>
                      <hr class="my-4">

                      <?php
                        include("./dashboard/src/html/conexion_database.php");
                        $usuario = $_SESSION['id_Usuario'];
                        $sql = "SELECT * FROM tdet_ven JOIN tproductos ON tdet_ven.id_prod = tproductos.id_prod WHERE usuario = '$usuario'";
                        $resultado = $conexion->query($sql);
                        $valor = 0;
                        // Mostrar los productos
                        while ($fila = $resultado->fetch_assoc()) {
                            $_SESSION['id_ven']=$fila['id_ven'];
                            $idProducto = $fila['id_prod'];
                            $nombreProducto = $fila['nombre_Prod'];
                            $urlImagen = "assets/images/".$fila['foto'];
                            $precioProducto = $fila['total'];                                                        
                            $id_ven=$fila['id_ven'];
                            echo '<div class="row mb-4 d-flex justify-content-between align-items-center">';
                            echo '<div class="col-md-2 col-lg-2 col-xl-2">';
                            echo '<img src="' . $urlImagen . '" class="img-fluid rounded-3" width="100" height="100" alt="' . $nombreProducto . '">';
                            echo '</div>';
                            echo '<div class="col-md-3 col-lg-3 col-xl-3">';
                           
                            echo '<h6 class="text-black mb-0">' . $nombreProducto . '</h6>';
                            echo '</div>';
                            echo '<div class="col-md-3 col-lg-3 col-xl-2 d-flex">';
                            $cantidad = "SELECT cantidad_venta FROM tdet_ven WHERE id_prod='$idProducto' AND usuario='$usuario'";
                            $consulta = $conexion->query($cantidad);
                            $valor=0;
                            $row='';
                            if ($consulta->num_rows > 0) {
                              $row = $consulta->fetch_assoc();
                              $valor = $row['cantidad_venta'];
                            } 
                            echo '<button class="btn btn-link px-0" onclick="window.location.href=\'restar_producto.php?id_ven=' . $id_ven . '&valor=' . $valor . '\'">';
                            echo '<i class="fas fa-minus"></i>';
                            echo '</button>';                                                        
                            echo '<input id="form' . $idProducto . '" min="0" max="6" name="quantity" value="' . $valor . '" type="number" class="form-control form-control-sm" />';
                            echo '<button class="btn btn-link px-0" onclick="window.location.href=\'sumar_producto.php?id_ven=' . $id_ven . '&valor=' . $valor .'&prod='.$idProducto. '\'">';
                            echo '<i class="fas fa-plus"></i>';
                            echo '</button>'; 
                            echo '</div>';
                            echo '<div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">';
                            echo '<h6 class="mb-0">MX ' . $precioProducto . '</h6>';
                            echo '</div>';

                            echo '<div class="col-md-1 col-lg-1 col-xl-1 text-end">';
                            echo '<button class="btn btn-danger" onclick="window.location.href=\'eliminar_carro.php?id_ven=' . $id_ven . '\'">X</button>';                            
                            echo '</div>';
                            echo '</div>';
                            echo '<hr class="my-4">';
                        }

                        // Cerrar la conexión a la base de datos
                        $conexion->close();
                        ?>                      

                      <div class="pt-5">
                        <h6 class="mb-0"><a href="catalogo01.php" class="text-body"><i
                              class="fas fa-long-arrow-alt-left me-2"></i>Seguir Comprando</a></h6>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-4 bg-grey">
                    <div class="p-5">
                      <h3 class="fw-bold mb-5 mt-2 pt-1" style="color: black;">Resumen</h3>
                      <hr class="my-4">
                      <?php include("./dashboard/src/html/conexion_database.php");
                        $usu=$_SESSION['id_Usuario'];
                        $consulta = "SELECT SUM(cantidad_venta) AS total FROM tdet_ven WHERE usuario='$usu'";
                        $resultado = $conexion->query($consulta);     
                          if($resultado->num_rows>0){
                            $fila=$resultado->fetch_assoc(); 
                            $cant = $fila['total'];                                           
                          }
                      ?>
                      <div class="d-flex justify-content-between mb-4">
                        <h5 class="text-uppercase" style="color: black;"><?php echo "$cant";?> Articulos Añadidos</h5>                        
                      </div>

                      <h5 class="text-uppercase mb-3" style="color: black;">Método de pago</h5>

                      <div class="mb-4 pb-2">
                        <select class="select">
                          <option value="1">Paypal</option>                          
                        </select>
                      </div>


                      <?php
                        // Establecer la conexión con la base de datos
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                          include("./dashboard/src/html/conexion_database.php");
                          // Obtener los valores del formulario
                          $nombre = $_POST['nombre'];
                          $apellidoMaterno = $_POST['apellido_mat'];
                          $apellidoPaterno = $_POST['apellido_pat'];
                          $rfc = $_POST['rfc'];
                          $email = $_POST['email'];
                          $telefono = $_POST['tel'];
                          $ciudad = $_POST['ciudad'];
                          $calle = $_POST['calle'];
                          $colonia = $_POST['colonia'];
                          $id_ven=$_SESSION['id_ven'];
                          // Insertar los valores en la base de datos
                          $sql = "INSERT INTO tfactura (nom_fact, appelido_mat, apellido_pat, rfc_fact, email_fact, telefono_fact, ciudad_fact, calle_fact, colonia_fact,id_ven)
                          VALUES ('$nombre', '$apellidoMaterno', '$apellidoPaterno', '$rfc', '$email', '$telefono', '$ciudad', '$calle', '$colonia',$id_ven)";
                          
                          if ($conexion->query($sql) === TRUE) {                            
                              echo "Información guardada correctamente";                                                         
                              echo '<br><br>';
                              echo '<a href="factura.php" id="descargarFactura"><button class="btn btn-success">Descargar Factura</button></a>';
                            } else {
                              echo "Error al guardar la información: " . $conexion->error;
                          }
                          $conexion->close();
                        }                      
                      ?>
                      

                      

                      <?php include("./dashboard/src/html/conexion_database.php");
                        $usu=$_SESSION['id_Usuario'];
                        $consulta = "SELECT ROUND(SUM(subtotal), 2) AS total FROM tdet_ven WHERE usuario='$usu'";
                        $resultado = $conexion->query($consulta);                                        
                          if($resultado->num_rows>0){
                            $fila=$resultado->fetch_assoc(); 
                            $subtotal = $fila['total'];                                           
                          }
                      ?>
                      <hr class="my-4">
                      <div class="d-flex justify-content-between mb-5">
                        <h5 class="text-uppercase" style="color: black;">Subtotal</h5>
                        <h5 style="color: black;"><?php echo "$subtotal";?> MX</h5>
                      </div>
                      <hr class="my-4">
                      <?php include("./dashboard/src/html/conexion_database.php");
                        $usu=$_SESSION['id_Usuario'];
                        $consulta = "SELECT ROUND(SUM(total), 2) AS total FROM tdet_ven WHERE usuario='$usu'";
                        $resultado = $conexion->query($consulta);                                        
                          if($resultado->num_rows>0){
                            $fila=$resultado->fetch_assoc(); 
                            $total = $fila['total'];                                           
                          }
                      ?>
                      <div class="d-flex justify-content-between mb-5">
                        <h5 class="text-uppercase" style="color: black;">IVA</h5>
                        <h5 style="color: black;"><?php echo $iva=$subtotal*0.16;?> MX</h5>
                      </div>
                      <hr class="my-4">

                      
                      <div class="d-flex justify-content-between mb-5">
                        <h5 class="text-uppercase" style="color: black;">Precio Total</h5>
                        <h5  style="color: black;"><?php echo "$total";?> MX</h5>
                      </div>

                      <!--<button type="button" class="btn btn-dark btn-block btn-lg"
                        data-mdb-ripple-color="dark">Pagar</button>-->
                      
                      <div id="paypal-button-container"></div>


                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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

  <script>
    // Obtén los elementos del DOM  

paypal.Buttons({
    style: {
      color: 'blue',
      shape: 'pill',
      label: 'pay'
    },
    createOrder: function(data, actions) {
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: <?php echo $total ?>
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      actions.order.capture().then(function(details) {
        // Redirigir al usuario a una página de confirmación o completado
        var cantidadProductos = document.querySelectorAll('input[name="quantity"]');
        var valores = [];
        cantidadProductos.forEach(function(input) {
          valores.push(input.value);
        });
        var url = "completado.php?paymentID=" + details.id + "&valores=" + encodeURIComponent(valores.join(','));
        window.location.href = url;
        console.log(data);
      });
    },
    onCancel: function(data) {
      alert("Pago Cancelado");
      console.log(data);
    }
  }).render('#paypal-button-container');
  </script>

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


