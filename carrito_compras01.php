<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="assets/css/animaciones_personales.css">
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
                        <!-- ** Logo Start ** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/controllll.png" alt="">
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
                            <li><a href="details.html">Detalles</a></li>
                            <li><a href="catalogo01.html">Streams</a></li>
                            <li><a href="catalogo01.html">
                                    <?php 
                          if(!empty($_SESSION["nombre_usuario"])){
                            echo "Carrito";
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
                <h4 class="text-center"><em>Carrito de</em> Compras</h4>
                <div class="container d-lg-flex">
                    <div class="box-1 bg-light user">
                        <div class="d-flex align-items-center mb-3">
                            <img src="https://images.pexels.com/photos/4925916/pexels-photo-4925916.jpeg?auto=compress&cs=tinysrgb&dpr=2&w=500"
                                class="pic rounded-circle" alt="">
                            <p class="ps-2 name">
                                <?php echo $_SESSION['nombre_usuario']?>
                            </p>
                        </div>
                        <div class="box-inner-1 pb-3 mb-3 ">
                            <div class="d-flex justify-content-between mb-3 userdetails">
                                <p class="fw-bold">Producto Agregados</p>
                                <p class="fw-lighter"><span class="fas fa-dollar-sign"></span>33.00+</p>
                            </div>
                            <?php
                    include("./dashboard/src/html/conexion_database.php");
                    $usuario = $_SESSION['id_Usuario'];
                    $sql = "SELECT * FROM tdet_ven JOIN tproductos ON tdet_ven.id_prod = tproductos.id_prod WHERE usuario = '$usuario'";
                    $result = $conexion->query($sql);
                ?>

                            <div id="carouselMain" class="carousel slide carousel-fade img-details"
                                data-bs-ride="carousel" data-bs-interval="2000">
                                <div class="carousel-indicators">
                                    <?php
        $indicatorIndex = 0;
        while ($row = $result->fetch_assoc()) {
            ?>
                                    <button type="button" data-bs-target="#carouselMain"
                                        data-bs-slide-to="<?php echo $indicatorIndex; ?>"
                                        class="<?php echo ($indicatorIndex === 0 ? 'active' : ''); ?>"
                                        aria-current="<?php echo ($indicatorIndex === 0 ? 'true' : 'false'); ?>"
                                        aria-label="Slide <?php echo ($indicatorIndex + 1); ?>"></button>
                                    <?php
            $indicatorIndex++;
        }
        ?>
                                </div>

                                <div class="carousel-inner">
                                    <?php        
        $active = true;
        mysqli_data_seek($result, 0); // Reiniciar el puntero del resultado para volver a recorrer los datos.
        while ($row = $result->fetch_assoc()) {
            $ruta_imagen = "assets/images/" . $row['foto'];
            ?>
                                    <div class="carousel-item <?php echo ($active ? 'active' : ''); ?>">
                                        <img src="<?php echo $ruta_imagen; ?>" class="d-block w-100">
                                    </div>
                                    <?php
            $active = false; // Desactivar la clase 'active' para los siguientes elementos del carrusel.
        }
        ?>
                                </div>

                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselMain"
                                    data-bs-slide="prev">
                                    <div class="icon">
                                        <span class="fas fa-arrow-left"></span>
                                    </div>
                                    <span class="visually-hidden">Previous</span>
                                </button>

                                <button class="carousel-control-next" type="button" data-bs-target="#carouselMain"
                                    data-bs-slide="next">
                                    <div class="icon">
                                        <span class="fas fa-arrow-right"></span>
                                    </div>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>

                            <p class="dis info my-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                                Cupiditate quos ipsa
                                sed officiis odio
                            </p>
                            <div class="radiobtn">
                                <input type="radio" name="box" id="one">
                                <input type="radio" name="box" id="two">
                                <input type="radio" name="box" id="three">
                                <label for="one" class="box py-2 first">
                                    <div class="d-flex align-items-start">
                                        <span class="circle"></span>
                                        <div class="course">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <span class="fw-bold">
                                                    Collection 01
                                                </span>
                                                <span class="fas fa-dollar-sign">29</span>
                                            </div>
                                            <span>10 x Presets. Released in 2018</span>
                                        </div>
                                    </div>
                                </label>
                                <label for="two" class="box py-2 second">
                                    <div class="d-flex">
                                        <span class="circle"></span>
                                        <div class="course">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <span class="fw-bold">
                                                    Collection 01
                                                </span>
                                                <span class="fas fa-dollar-sign">29</span>
                                            </div>
                                            <span>10 x Presets. Released in 2018</span>
                                        </div>
                                    </div>
                                </label>
                                <label for="three" class="box py-2 third">
                                    <div class="d-flex">
                                        <span class="circle"></span>
                                        <div class="course">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <span class="fw-bold">
                                                    Collection 01
                                                </span>
                                                <span class="fas fa-dollar-sign">29</span>
                                            </div>
                                            <span>10 x Presets. Released in 2018</span>
                                        </div>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="box-2">
                        <div class="box-inner-2">
                            <div>
                                <p class="fw-bold">Detalles de pago</p>
                                <p class="dis mb-3">Complete su compra proporcionando sus datos de pago</p>
                            </div>
                            <form action="">
                                <div class="mb-3">
                                    <p class="dis fw-bold mb-2">Dirección de correo electrónico</p>
                                    <input class="form-control" type="email" value="luke@skywalker.com">
                                </div>
                                <div>
                                    <p class="dis fw-bold mb-2">Detalles de tarjeta</p>
                                    <div
                                        class="d-flex align-items-center justify-content-between card-atm border rounded">
                                        <div class="fab fa-cc-visa ps-3"></div>
                                        <input type="text" class="form-control" placeholder="Card Details">
                                        <div class="d-flex w-50">
                                            <input type="text" class="form-control px-0" placeholder="MM/YY">
                                            <input type="password" maxlength=3 class="form-control px-0"
                                                placeholder="CVV">
                                        </div>
                                    </div>
                                    <div class="my-3 cardname">
                                        <p class="dis fw-bold mb-2">Nombre del titular de la tarjeta</p>
                                        <input class="form-control" type="text">
                                    </div>
                                    <div class="address">
                                        <p class="dis fw-bold mb-3">Dirección de Envio</p>
                                        <select class="form-select" aria-label="Default select example">
                                            <option selected hidden>United States</option>
                                            <option value="1">India</option>
                                            <option value="2">Australia</option>
                                            <option value="3">Canada</option>
                                        </select>
                                        <div class="d-flex">
                                            <input class="form-control zip" type="text" placeholder="ZIP">
                                            <input class="form-control state" type="text" placeholder="State">
                                        </div>
                                        <div class=" my-3">
                                            <p class="dis fw-bold mb-2">VAT Number</p>
                                            <div class="inputWithcheck">
                                                <input class="form-control" type="text" value="GB012345B9">
                                                <span class="fas fa-check"></span>
                                            </div>
                                        </div>
                                        <div class="d-flex flex-column dis">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <?php include_once("./dashboard/src/html/conexion_database.php");
                                        $usu=$_SESSION['id_Usuario'];
                                        $consulta = "SELECT ROUND(SUM(subtotal), 2) AS total FROM tdet_ven WHERE usuario='$usu'";
                                        $resultado = $conexion->query($consulta);                                        
                                        if($resultado->num_rows>0){
                                            $fila=$resultado->fetch_assoc(); 
                                            $subtotal = $fila['total'];                                           
                                        }
                                     ?>
                                                <p>Subtotal</p>
                                                <p><span class="fas fa-dollar-sign"></span>
                                                    <?php echo $subtotal;?>
                                                </p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <p>VAT<span>(20%)</span></p>
                                                <p><span class="fas fa-dollar-sign"></span>2.80</p>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <p class="fw-bold">Total</p>
                                                <?php                                         
                                        $usu=$_SESSION['id_Usuario'];
                                        $suma="SELECT ROUND(SUM(total),2) AS total FROM tdet_ven WHERE usuario='$usu';";
                                        $resultado = $conexion->query($suma);                                        
                                        if($resultado->num_rows>0){
                                            $fila=$resultado->fetch_assoc(); 
                                            $tot = $fila['total'];                                           
                                        }
                                    ?>
                                                <p class="fw-bold"><span class="fas fa-dollar-sign"></span>
                                                    <?php echo "$tot";?>
                                                </p>
                                            </div>
                                            <div class="btn btn-primary mt-2">Pay<span
                                                    class="fas fa-dollar-sign px-1"></span>35.80
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <footer>
        <div class="row">
            <div class="col-lg-12">
                <p>Copyright © 2036 <a href="#">Cyborg Gaming</a> Company. All rights reserved.

                    <br>Design: <a href="https://templatemo.com" target="_blank"
                        title="free CSS templates">TemplateMo</a>
                    Distributed By <a href="https://themewagon.com" target="_blank">ThemeWagon</a>
                </p>
            </div>
        </div>
    </footer>

    <script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript' src='#'></script>
    <script type='text/javascript'>#</script>
    <script type='text/javascript'>var myLink = document.querySelector('a[href="#"]');
        myLink.addEventListener('click', function (e) {
            e.preventDefault();
        });</script>
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