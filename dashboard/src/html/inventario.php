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
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Resumen de Inventario</h5>
                  </div>                  
                </div>
                <?php
                  // 1. Establecer la conexión a la base de datos MySQL
                  include("./conexion_database.php");

                  // 2. Realizar la consulta a la base de datos
                  $sql = "SELECT tinventario.id_suc, COUNT(*) AS TOTAL_PRODUCTOS_SUCURSAL,tsucursal.nombre_Sucur
                  FROM tsucursal
                  JOIN tinventario ON tsucursal.id_suc = tinventario.id_suc
                  GROUP BY tinventario.id_suc";
                  $result = $conexion->query($sql);

                  // 3. Construir los datos en un formato compatible con Chart.js
                  $labels = [];
                  $data = [];

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          $labels[] = $row["nombre_Sucur"];
                          $data[] = intval($row["TOTAL_PRODUCTOS_SUCURSAL"]);
                      }
                  }

                  // 4. Cerrar la conexión a la base de datos
                  $conexion->close();
                ?>
                <canvas id="barras"></canvas>

              
              </div>
            </div>
          </div>
          <!--<div class="col-lg-4">
            <div class="row">
              <div class="col-lg-12">-->
                <!-- Yearly Breakup -->
                <!-- <div class="card overflow-hidden">
                  <div class="card-body p-4">
                    <h5 class="card-title mb-9 fw-semibold">Ruptura Anual</h5>
                    <div class="row align-items-center">
                      <div class="col-8">
                        <h4 class="fw-semibold mb-3">$36,358</h4>
                        <div class="d-flex align-items-center mb-3">
                          <span
                            class="me-1 rounded-circle bg-light-success round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-up-left text-success"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                          <p class="fs-3 mb-0">el año pasado</p>
                        </div>
                        <div class="d-flex align-items-center">
                          <div class="me-4">
                            <span class="round-8 bg-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                          </div>
                          <div>
                            <span class="round-8 bg-light-primary rounded-circle me-2 d-inline-block"></span>
                            <span class="fs-2">2023</span>
                          </div>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-center">
                          <div id="breakup"></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-lg-12">-->
                <!-- Monthly Earnings -->
                <!--<div class="card">
                  <div class="card-body">
                    <div class="row alig n-items-start">
                      <div class="col-8">
                        <h5 class="card-title mb-9 fw-semibold"> Ingresos Mensuales </h5>
                        <h4 class="fw-semibold mb-3">$6,820</h4>
                        <div class="d-flex align-items-center pb-1">
                          <span
                            class="me-2 rounded-circle bg-light-danger round-20 d-flex align-items-center justify-content-center">
                            <i class="ti ti-arrow-down-right text-danger"></i>
                          </span>
                          <p class="text-dark me-1 fs-3 mb-0">+9%</p>
                          <p class="fs-3 mb-0">el año pasado</p>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="d-flex justify-content-end">
                          <div
                            class="text-white bg-secondary rounded-circle p-6 d-flex align-items-center justify-content-center">
                            <i class="ti ti-currency-dollar fs-6"></i>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div id="earning"></div>
                </div>
              </div>
            </div>
          </div>
        </div> -->
        <div class="row">




      <div class="col-lg-12 d-flex align-items-stretch">
  <div class="card w-100">
    <div class="card-body p-4">
      <h5 class="card-title fw-semibold mb-4">Inventario</h5>
      <div class="table-container">
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id Producto</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Stock</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id Sucursal</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Estatus</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Editar</h6>
                </th>
              </tr>
            </thead>
            <tbody>   
              <?php
              // Establecer la conexión a la base de datos
              include("./conexion_database.php");
              $sql = "    SELECT * FROM TInventario INNER JOIN tproductos on tproductos.id_prod = TInventario.id_prod inner join tsucursal on tsucursal.id_suc = tinventario.id_suc";
              $consulta = $conexion->query($sql);
              if ($consulta->num_rows > 0) {              
                while ($row = $consulta->fetch_assoc()){
                  $estatus='';
                  if($row['estatus_inv']=='PR_0'){
                    $estatus='Inactivo';                                      
                  }else{
                    $estatus='Activo';
                  }
                  echo "<tr>";
                  echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-0'>" . $row['id_inv'] . "</h6></td>";
                  echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-1'>" . $row["nombre_Prod"] . "</h6></td>";
                  echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-1'>" . $row["stock_inv"] . "</h6></td>";
                  echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-1'>" . $row["nombre_Sucur"] . "</h6></td>";
                  echo "<td class='border-bottom-0'><div class='d-flex align-items-center gap-2'><span class='badge bg-primary rounded-3 fw-semibold'>" . $estatus . "</span></div></td>";
                  echo "<td class='border-bottom-0'>
                          <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                              Acciones
                            </button>
                            <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                              <li><a class='dropdown-item' href='#' data-id='" . $row["id_inv"] . "' onclick='mostrarTarjetaEdicion(this)'>Editar</a></li>
                              <li><a class='dropdown-item' href='#' data-id-inv='" . $row["id_inv"] . "' onclick='mostrarConfirmacionEliminacion(this)'>Eliminar</a></li>
                              <li><a class='dropdown-item' href='#' data-id='" . $row["id_inv"] . "' onclick='mostrarTarjetaAlta(this)'>Alta</a></li>
                            </ul>
                          </div>
                        </td>";
                  echo "</tr>";
                }
              } else {
                echo "<tr><td colspan='7' class='border-bottom-0'>No se encontraron usuarios</td></tr>";
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
        <form id="editarForm" action="editar_inventario.php" method="POST">
            <h5 class="card-title">Editar Inventario</h5>
            <div class="mb-3">
                <label for="idInventario">Id Inventario</label>
                <input type="text" class="form-control" id="idInventario" name="idInventario" readonly>
            </div>
            <div class="mb-3">
                <label for="idProducto">Id Producto</label>
                <input type="text" class="form-control" id="idProducto" name="idProducto" readonly>
            </div>
            <div class="mb-3">
                <label for="stock">Stock</label>
                <input type="text" class="form-control" id="stock_inv" name="stock_inv" >
            </div>
            <!--<div class="mb-3">
                <label for="sucursal">Sucursal</label>
                <select class="form-select" id="sucursales" name="sucursales" required>
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
                <label for="estatus">Estatus</label>
                <select class="form-select" id="estatus" name="estatus" required>
                    <option value=""></option>
                    <option value="Activo">Activo</option>
                    <option value="Inactivo">Inactivo</option>
                </select>
            </div>            
            <button type="submit"  class="btn btn-primary">Guardar Cambios</button>
            <button type="button" class="btn btn-secondary" onclick="ocultarTarjetaEdicion()">Cancelar</button>
        </form>
    </div>
</div>

<!-- Formulario de Alta -->
<div id="altaForm" class="card d-none">
    <div class="card-body">
        <form action="alta_inventario.php" method="POST" enctype="multipart/form-data">
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
                <label for="costoProducto">Costo del venta</label>
                <input type="number" class="form-control" id="costoProducto" name="costoProducto">
            </div>
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
    ocultarTarjetaEdicion();
    document.getElementById("editarForm").style.display = "block";
    document.getElementById("altaForm").style.display = "none";

    var fila = element.closest("tr");
    var idProducto = fila.querySelector("td:nth-child(2) h6").innerText; // Obtener el id_prod en lugar del id_inv
    var idInventario = fila.querySelector("td:nth-child(1) h6").innerText; // Obtener el id_inv en lugar del id_prod

    var stock_inv = fila.querySelector("td:nth-child(3) h6").innerText;
    // Asignar los valores a los campos del formulario
    document.getElementById("idProducto").value = idProducto;
    document.getElementById("idInventario").value = idInventario;
    //document.getElementById("stock_inv").value = stock_inv;

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
    var idInv = element.getAttribute('data-id-inv'); // Obtener el id_inv del atributo data-id-inv
    var modal = new bootstrap.Modal(document.getElementById("confirmacionEliminacionModal"));
    modal.show();
    document.getElementById("confirmacionEliminacionModal").setAttribute('data-id-inv', idInv); // Almacenar el id_inv como atributo del modal
}


function eliminarProducto() {
    var idInv = document.getElementById("confirmacionEliminacionModal").getAttribute('data-id-inv'); // Obtener el id_inv del atributo data-id-inv del modal
    $.ajax({
        url: 'eliminar_inventario.php',
        method: 'POST',
        data: { idInv: idInv }, // Enviar el id_inv como "idInv" en la petición AJAX
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

<script>
      // 5. Renderizar la gráfica de barras usando Chart.js
      var ctx = document.getElementById('barras').getContext('2d');
      var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
          labels: <?php echo json_encode($labels); ?>,
          datasets: [{
            label: 'Total de productos por sucursal',
            data: <?php echo json_encode($data); ?>,
            backgroundColor: 'rgba(0, 123, 255, 0.5)',
            borderColor: 'rgba(0, 123, 255, 1)',
            borderWidth: 1
          }]
        },
        options: {
          responsive: true,
          scales: {
            y: {
              beginAtZero: true
            }
          }
        }
      });
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



