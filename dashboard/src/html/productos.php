<?php
  session_start();
  if(empty($_SESSION["id_Usuario"])){
    header("location: ../../../login.php");
  }
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Extreme Games</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <style>
  .table-container {
    height: 600px; /* Ajusta la altura deseada */
    overflow-y: auto;
  }
</style>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
    data-sidebar-position="fixed" data-header-position="fixed">
    <!-- Sidebar Start -->
    <aside class="left-sidebar">
      <!-- Sidebar scroll-->
      <div>
        <div class="brand-logo d-flex align-items-center justify-content-between">
          <a href="./index.php" class="text-nowrap logo-img">
            <img src="../assets/images/logos/control2.00.png" width="180" alt="" />
          </a>
          <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
            <i class="ti ti-x fs-8"></i>
          </div>
        </div>
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Inicio</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./index.php" aria-expanded="false">
                <span>
                  <i class="ti ti-layout-dashboard"></i>
                </span>
                <span class="hide-menu">Dashboard</span>
              </a>
            </li>
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">UI COMPONENTS</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./productos.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Alta Productos</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./categorias.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Categorias</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./sucursal.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Sucursales</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./inventario.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Inventario</span>
              </a>
            </li>            
          </ul>
          
        </nav>
        <!-- End Sidebar navigation -->
      </div>
      <!-- End Sidebar scroll-->
    </aside>
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      <header class="app-header">
        <nav class="navbar navbar-expand-lg navbar-light">
          <ul class="navbar-nav">
            <li class="nav-item d-block d-xl-none">
              <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
                <i class="ti ti-menu-2"></i>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link nav-icon-hover" href="javascript:void(0)">
                <i class="ti ti-bell-ringing"></i>
                <div class="notification bg-primary rounded-circle"></div>
              </a>
            </li>
          </ul>
          <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
            <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">

              <li class="nav-item dropdown">
                <a class="nav-link nav-icon-hover" href="javascript:void(0)" id="drop2" data-bs-toggle="dropdown"
                  aria-expanded="false">
                  <img src="../assets/images/profile/user-1.jpg" alt="" width="35" height="35" class="rounded-circle">
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-animate-up" aria-labelledby="drop2">
                  <div class="message-body">
                    <a href="javascript:void(0)" class="d-flex align-items-center gap-2 dropdown-item">
                      <i class="ti ti-user fs-6"></i>
                      <p class="mb-0 fs-3">My Profile</p>
                    </a>
                    <a href="../../../cerrar_sesion.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Cerrar Sesión</a>
                  </div>
                </div>
              </li>
            </ul>
          </div>
        </nav>
      </header>
      <!--  Header End -->
<br><br><br>
<div class="col-lg-12 d-flex align-items-stretch">
    <div class="card w-100">
        <div class="card-body p-4">
            <h5 class="card-title fw-semibold mb-4">Productos</h5>
            <div class="table-container">
                <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                        <thead class="text-dark fs-4">
                            <tr>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Id</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Categoría</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Estatus</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Producto</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Precio</h6>
                                </th>
                                <!--<th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Stock</h6>
                                </th>-->
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Id Empleado</h6>
                                </th>
                                <th class="border-bottom-0">
                                    <h6 class="fw-semibold mb-0">Editar</h6>
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("./conexion_database.php");
                            $sql = "SELECT * FROM TProductos";
                            $consulta = $conexion->query($sql);
                            if ($consulta->num_rows > 0) {
                                while ($row = $consulta->fetch_assoc()){
                                    $estatus='';
                                    if($row['id_ESta']=='PR_0'){
                                      $estatus='Inactivo';                                      
                                    }else{
                                      $estatus='Activo';
                                    }
                                    echo "<tr>";
                                    echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-0'>" . $row['id_prod'] . "</h6></td>";
                                    echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-1'>" . $row["id_Cate"] . "</h6></td>";
                                    echo "<td class='border-bottom-0'><div class='d-flex align-items-center gap-2'><span class='badge bg-primary rounded-3 fw-semibold'>" . $estatus . "</span></div></td>";
                                    echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-0'>" . $row['nombre_Prod'] . "</h6></td>";
                                    echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-1'>" . $row["precio_Uni"] . "</h6></td>";
                                    //echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-0'>" . $row['stock_Prod'] . "</h6></td>";
                                    echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-1'>" . $row["id_Emp"] . "</h6></td>";
                                    echo "<td class='border-bottom-0'>
                                              <div class='dropdown'>
                                                <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                                                  Acciones
                                                </button>
                                                <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                                                  <li><a class='dropdown-item' href='#' data-id='" . $row["id_prod"] . "' onclick='mostrarTarjetaEdicion(this)'>Editar</a></li>
                                                  <li><a class='dropdown-item' href='#' data-id='" . $row["id_prod"] . "' onclick='mostrarConfirmacionEliminacion(this)'>Eliminar</a></li>
                                                  <li><a class='dropdown-item' href='#' data-id='" . $row["id_prod"] . "' onclick='mostrarTarjetaAlta(this)'>Alta</a></li>
                                                </ul>
                                              </div>
                                            </td>";
                                    echo "</tr>";
                                }
                            } else {
                                echo "<tr><td colspan='7' class='border-bottom-0'>No se encontraron productos</td></tr>";
                            }
                            $conexion->close();
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Formulario de Edición -->
<div id="tarjetaEdicion" class="card d-none">
    <div class="card-body">
        <form id="editarForm" action="editar_productos.php" method="POST">
            <h5 class="card-title">Editar Producto</h5>
            <div class="mb-3">
                <label for="idProducto">Id Producto</label>
                <input type="text" class="form-control" id="idProducto" name="idProducto" readonly>
            </div>
            <div class="mb-3">
                <label for="categoria">Categoría</label>
                <input type="text" class="form-control" id="categoria" name="categoria" readonly>
            </div>
            <div class="mb-3">
                <label for="estatus">Estatus</label>
                <select class="form-select" id="estatus" name="estatus" required>
                    <option value=""></option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="nombreProducto">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombreProducto" name="nombreProducto">
            </div>
            <div class="mb-3">
                <label for="precio">Precio venta</label>
                <input type="number" class="form-control" id="precio" name="precio">
            </div>
            <!--<div class="mb-3">
                <label for="cantidad">Cantidad</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad">
            </div>-->
            <div class="mb-3">
                <label for="idEmpleado">Empleado</label>
                <select class="form-control" id="idEmpleado" name="idEmpleado">
    <?php
        include("./conexion_database.php");
        $sql = "SELECT * FROM TEmpleados";
        $consulta = $conexion->query($sql);
        if ($consulta->num_rows > 0) {
            $row = $consulta->fetch_assoc();
            $usuario = $_SESSION['id_Usuario'];
            $nombre = $_SESSION['nombre_usuario'];
            echo "<option value='" . $usuario . "' selected>" . $nombre . "</option>";                                            
        }
        $conexion->close();
    ?>                    
</select>              
            </div>
            <div class="mb-3">
                <label for="descripcion">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="4"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <button type="button" class="btn btn-secondary" onclick="ocultarTarjetaEdicion()">Cancelar</button>
        </form>
    </div>
</div>

<!-- Formulario de Alta -->
<div id="altaForm" class="card d-none">
    <div class="card-body">
        <form action="alta_productos.php" method="POST" enctype="multipart/form-data">
            <h5 class="card-title">Dar de Alta Producto</h5>
            <div class="mb-3">
                <label for="nombreProductoAlta">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombreProductoAlta" name="nombreProductoAlta">
            </div>
            <!--<div class="mb-3">
                <label for="cantidadSucursalAlta">Cantidad</label>
                <input type="number" class="form-control" id="cantidadSucursalAlta" name="cantidadSucursalAlta" pattern="\d+" title="Ingrese solo números">
            </div>-->
            <div class="mb-3">
                <label for="claveEmpleadoAlta">Empleado</label>
                <select class="form-control" id="claveEmpleadoAlta" name="claveEmpleadoAlta">
                    <?php
                    include("./conexion_database.php");
                    $sql = "SELECT * FROM TEmpleados";
                    $consulta = $conexion->query($sql);
                    if ($consulta->num_rows > 0) {
                      $consulta->fetch_assoc();
                      $usuario=$_SESSION['id_Usuario'];
                      $nombre=$_SESSION['nombre_usuario'];
                      echo "<option value='" . $usuario . "'>" . $nombre . "</option>";                        
                    }
                    $conexion->close();
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="costoProducto">Precio venta</label>
                <input type="number" class="form-control" id="costoProducto" name="costoProducto">
            </div>

            <div class="mb-3">
            <label>Seleccione la sucursal</label>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="sucursal1" name="sucursal" value="sucursal1">
              <?php
                    include("./conexion_database.php");
                    $sql = "SELECT * FROM tsucursal";
                    $consulta = $conexion->query($sql);
                    if ($consulta->num_rows > 0) {
                        while ($row = $consulta->fetch_assoc()){
                            //echo "<option value='" . $row['id_Cate'] . "'>" . $row['nombre_Cate'] . "</option>";
                            echo '<input class="form-check-input" type="checkbox" name="sucursal[]" value="' . $row['id_suc'] . '">';
                            echo '<label class="form-check-label" for="sucursal1">' . $row['nombre_Sucur'] . '</label><br>';                            
                        }
                    }
                    $conexion->close();
                    ?>              
            </div>

            <!-- Agrega más opciones de sucursal según sea necesario -->
          </div>


            <br>
            <div class="mb-3">
                <label for="categoriaProducto">Categoría</label>
                <select class="form-control" id="idCategorias" name="claveCategoriasAlta">
                    <?php
                    include("./conexion_database.php");
                    $sql = "SELECT * FROM TCategorias";
                    $consulta = $conexion->query($sql);
                    if ($consulta->num_rows > 0) {
                        while ($row = $consulta->fetch_assoc()) {
                            echo "<option value='" . $row['id_Cate'] . "'>" . $row['nombre_Cate'] . "</option>";
                        }
                    }
                    $conexion->close();
                    ?>
                </select>
            </div>
            <!--<div class="mb-3">
                <label for="sucursalProducto">Sucursal</label>
                <select class="form-control" id="idSucursal" name="claveSucursalAlta">
                    <?php
                    /*include("./conexion_database.php");
                    $sql = "SELECT * FROM TSucursal";
                    $consulta = $conexion->query($sql);
                    if ($consulta->num_rows > 0) {
                        while ($row = $consulta->fetch_assoc()) {
                            echo "<option value='" . $row['id_suc'] . "'>" . $row['nombre_Sucur'] . "</option>";
                        }
                    }
                    $conexion->close();*/
                    ?>
                </select>
            </div>-->
            <div class="mb-3">
                <label for="descripcionProducto">Descripción del Producto</label>
                <textarea class="form-control" id="descripcionProducto" name="descripcionProducto" rows="4"></textarea>
            </div>
            <div class="mb-3">
                <label for="imagenSucursalAlta">Imagen</label>
                <input type="file" class="form-control" id="imagenSucursalAlta" name="imagenSucursalAlta">
            </div>
            <button type="submit" class="btn btn-primary">Dar de Alta</button>
            <button type="button" class="btn btn-secondary" onclick="ocultarTarjetaEdicion();">Cancelar</button>
        </form>
    </div>
</div>

<div class="modal fade" id="confirmacionEliminacionModal" tabindex="-1" aria-labelledby="confirmacionEliminacionModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmacionEliminacionModalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Estás seguro de que deseas eliminar este producto?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="eliminarProducto()">Eliminar</button>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function mostrarTarjetaAlta(element) {
        document.getElementById("editarForm").style.display = "none";
        document.getElementById("altaForm").style.display = "block";

        $('#tarjetaEdicion').removeClass('d-none');
        $('#altaForm').removeClass('d-none');

        $('html, body').animate({
            scrollTop: $('#tarjetaEdicion').offset().top
        }, 'slow');
    }

    function mostrarTarjetaEdicion(element) {
        var fila = element.closest("tr");
        var idProducto = fila.querySelector("td:nth-child(1) h6").innerText;
        var categoria = fila.querySelector("td:nth-child(2) h6").innerText;
        var estatus = fila.querySelector("td:nth-child(3) span").innerText;
        var nombreProducto = fila.querySelector("td:nth-child(4) h6").innerText;
        var precio = fila.querySelector("td:nth-child(5) h6").innerText;
        //var cantidad = fila.querySelector("td:nth-child(6) h6").innerText;
        var idEmpleado = fila.querySelector("td:nth-child(6) h6").innerText;
        var descripcion = fila.querySelector("td:nth-child(5)").textContent.trim();


        document.getElementById("idProducto").value = idProducto;
        document.getElementById("categoria").value = categoria;
        document.getElementById("estatus").value = estatus;
        document.getElementById("nombreProducto").value = nombreProducto;
        document.getElementById("precio").value = precio;
        //document.getElementById("cantidad").value = cantidad;
        document.getElementById("idEmpleado").value = idEmpleado;
        document.getElementById("descripcion").value = "";


        if (element.textContent.trim().toLowerCase() === "alta") {
            document.getElementById("editarForm").style.display = "none";
            document.getElementById("altaForm").style.display = "block";
            document.getElementById("nombreProductoAlta").value = "";
            //document.getElementById("cantidadSucursalAlta").value = "";
            document.getElementById("claveEmpleadoAlta").value = "";
            document.getElementById("costoProducto").value = "";
            document.getElementById("categoriaProducto").value = "";
            document.getElementById("descripcionProducto").value = "";
            document.getElementById("imagenSucursalAlta").value = "";
        } else {
            document.getElementById("editarForm").style.display = "block";
            document.getElementById("altaForm").style.display = "none";
        }

        $('#tarjetaEdicion').removeClass('d-none');
        $('html, body').animate({
            scrollTop: $('#tarjetaEdicion').offset().top
        }, 'slow');
    }

    function ocultarTarjetaEdicion() {
        document.getElementById("editarForm").style.display = "none";
        document.getElementById("altaForm").style.display = "none";
        $('#tarjetaEdicion').addClass('d-none');
    }

    function mostrarConfirmacionEliminacion(element) {
        var idProducto = element.getAttribute('data-id');
        var modal = new bootstrap.Modal(document.getElementById("confirmacionEliminacionModal"));
        modal.show();
        document.getElementById("confirmacionEliminacionModal").setAttribute('data-id', idProducto);
    }

    function eliminarProducto() {
        var idProducto = document.getElementById("confirmacionEliminacionModal").getAttribute('data-id');
        $.ajax({
            url: 'eliminar_productos.php',
            method: 'POST',
            data: { idProducto: idProducto },
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
        ocultarTarjetaEdicion();
    }
</script>

<div class="py-6 px-6 text-center">
    <p class="mb-0 fs-4">Desarrollado por CodeCraft</p>
</div>
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.js"></script>
<script src="../assets/js/dashboard.js"></script>
</body>

</html>
