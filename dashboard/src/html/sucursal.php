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
      <div class="container-fluid">
        <!--  Row 1 -->
        <div class="row">
          <div class="col-lg-8 d-flex align-items-strech">
            <div class="card w-100">
              <div class="card-body">
                <div class="d-sm-flex d-block align-items-center justify-content-between mb-9">
                  <div class="mb-3 mb-sm-0">
                    <h5 class="card-title fw-semibold">Resumen de Ventas</h5>
                  </div>
                  <div>
                    <!--<select class="form-select">
                      <option value="1">Marzo 2023</option>
                      <option value="2">Abril 2023</option>
                      <option value="3">Mayo 2023</option>
                      <option value="4">Junio 2023</option>
                    </select>-->
                  </div>
                </div>
                <?php
                  // 1. Establecer la conexión a la base de datos MySQL
                  include("./conexion_database.php");

                  // 2. Realizar la consulta a la base de datos
                  $sql = "SELECT tinventario.id_suc, SUM(stock_inv) AS TOTAL_STOCK_X_SUCURSAL,tsucursal.nombre_Sucur
                  FROM tsucursal
                  JOIN tinventario ON tsucursal.id_suc = tinventario.id_suc
                  GROUP BY tinventario.id_suc;";
                  $result = $conexion->query($sql);

                  // 3. Construir los datos en un formato compatible con Chart.js
                  $labels = [];
                  $data = [];

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          $labels[] = $row["nombre_Sucur"];
                          $data[] = intval($row["TOTAL_STOCK_X_SUCURSAL"]);
                      }
                  }

                  // 4. Cerrar la conexión a la base de datos
                  $conexion->close();
                ?>
                <canvas id="barras"></canvas>
              </div>
            </div>
          </div>
         
      <!--  Header End -->  
      <br><br><br>
      <div class="col-lg-12 d-flex align-items-stretch">
  <div class="card w-100">
    <div class="card-body p-4">
      <h5 class="card-title fw-semibold mb-4">Sucursales</h5>
      <div class="table-container">
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Estatus</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Nombre</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Estado</h6>
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
              $sql = "SELECT id_suc, id_ESta, nombre_Sucur,estado_su FROM TSucursal";
              $consulta = $conexion->query($sql);
              if ($consulta->num_rows > 0){              
                while ($row = $consulta->fetch_assoc()){
                  $estatus='';
                  if($row['id_ESta']=='SU_0'){
                    $estatus='Inactivo';                                      
                  }else{
                    $estatus='Activo';
                  }
                  echo "<tr>";
                  echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-0'>" . $row['id_suc'] . "</h6></td>";
                  echo "<td class='border-bottom-0'><div class='d-flex align-items-center gap-2'><span class='badge bg-primary rounded-3 fw-semibold'>" . $estatus . "</span></div></td>";
                  echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-1'>" . $row["nombre_Sucur"] . "</h6></td>";
                  echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-0 fs-4'>" . $row["estado_su"] . "</h6></td>";                  
                  echo "<td class='border-bottom-0'>
                          <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                              Acciones
                            </button>
                            <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                              <li><a class='dropdown-item' href='#' data-id='" . $row["id_suc"] . "' onclick='mostrarTarjetaEdicion(this)'>Editar</a></li>
                              <li><a class='dropdown-item' href='#' data-id='" . $row["id_suc"] . "' onclick='mostrarConfirmacionEliminacion(this)'>Eliminar</a></li>
                              <li><a class='dropdown-item' href='#' data-id='" . $row["id_suc"] . "' onclick='mostrarTarjetaEdicion(this)'>Alta</a></li>
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
<br>

<!--<div class="col-lg-12 d-flex align-items-stretch">
  <div class="card w-100">
    <div class="card-body p-4">
      <h5 class="card-title fw-semibold mb-4">Sucursales</h5>
      <div class="table-container">
        <div class="table-responsive">
          <table class="table text-nowrap mb-0 align-middle">
            <thead class="text-dark fs-4">
              <tr>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Id</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Estatus</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Nombre</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Estado</h6>
                </th>
                <th class="border-bottom-0">
                  <h6 class="fw-semibold mb-0">Editar</h6>
                </th>
              </tr>
            </thead>
            <tbody>  
<tr>
    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">ID de Sucursal</h6></td>
    <td class="border-bottom-0">
        <div class="d-flex align-items-center gap-2">
            <span class="badge bg-primary rounded-3 fw-semibold">Estatus</span>
        </div>
    </td>
    <td class="border-bottom-0"><h6 class="fw-semibold mb-1">Nombre de Sucursal</h6></td>
    <td class="border-bottom-0"><h6 class="fw-semibold mb-0 fs-4">Estado de la Sucursal</h6></td>
    <td class="border-bottom-0">
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Acciones
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="#" data-id="ID_SUCURSAL" onclick="mostrarTarjetaEdicion(this)">Editar</a></li>
                <li><a class="dropdown-item" href="#" data-id="ID_SUCURSAL" onclick="mostrarConfirmacionEliminacion(this)">Eliminar</a></li>
                <li><a class="dropdown-item" href="#" data-id="ID_SUCURSAL" onclick="mostrarTarjetaEdicion(this)">Alta</a></li>
            </ul>
        </div>
    </td>
</tr>-->



<div id="tarjetaEdicion" class="card d-none">
    <div class="card-body">
        <form id="editarForm" action="editar_sucursal.php" method="POST">
          <h5 class="card-title">Editar Sucursal</h5>
            <div class="mb-3">
                <label for="idSucursal">Id Sucursal</label>
                <input type="text" class="form-control" id="idSucursal" readonly>
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
                <label for="nombreSucursal">Nombre Sucursal</label>
                <input type="text" class="form-control" id="nombreSucursal" name="nombreSucursal">
            </div>
            <div class="mb-3">
                <label for="estado">Estado</label>
                <input type="text" class="form-control" id="estado" name="estado">
            </div>
            <input type="hidden" name="idSucursal">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
            <button type="button" class="btn btn-secondary" onclick="ocultarTarjetaEdicion()">Cancelar</button>
        </form>
        <form id="altaForm" action="alta_sucursal.php" method="POST" style="display: none;">
          <h5 class="card-title">Dar de Alta Sucursal</h5>
            <div class="mb-3">
                <label for="nombreSucursalAlta">Nombre Sucursal</label>
                <input type="text" class="form-control" id="nombreSucursalAlta" name="nombreSucursalAlta">
            </div>
            <div class="mb-3">
                <label for="estadoSucursalAlta">Estado</label>
                <input type="text" class="form-control" id="estadoSucursalAlta" name="estadoSucursalAlta">
            </div>
            <button type="submit" class="btn btn-primary">Dar de Alta</button>
            <button type="button" class="btn btn-secondary" onclick="ocultarTarjetaEdicion()">Cancelar</button>
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
                <p>¿Estás seguro de que deseas eliminar esta sucursal?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" onclick="eliminarSucursal()">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<div class="py-6 px-6 text-center">
    <p class="mb-0 fs-4">Desarrollado por CodeCraft</p>
  </div>   
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function mostrarTarjetaEdicion(element) {
        var fila = element.closest("tr");
        var idSucursal = fila.querySelector("td:nth-child(1) h6").innerText;
        var estatus = fila.querySelector("td:nth-child(2) span").innerText;
        var nombreSucursal = fila.querySelector("td:nth-child(3) h6").innerText;
        var estado = fila.querySelector("td:nth-child(4) h6").innerText;

        document.getElementById("idSucursal").value = idSucursal;
        document.getElementById("nombreSucursal").value = nombreSucursal;
        document.getElementById("estado").value = estado;
        document.querySelector("#tarjetaEdicion [name='idSucursal']").value = idSucursal;

        if (element.textContent.trim().toLowerCase() === "alta") {
            document.getElementById("editarForm").style.display = "none";
            document.getElementById("altaForm").style.display = "block";
            document.getElementById("nombreSucursalAlta").value = "";
            document.getElementById("estadoSucursalAlta").value = "";
        } else {
            document.getElementById("editarForm").style.display = "block";
            document.getElementById("altaForm").style.display = "none";
            document.getElementById("estatus").value = estatus;
        }

        $('#tarjetaEdicion').removeClass('d-none');
        $('html, body').animate({
            scrollTop: $('#tarjetaEdicion').offset().top
        }, 'slow');
    }

    function ocultarTarjetaEdicion() {
        $('#tarjetaEdicion').addClass('d-none');
    }

    function mostrarConfirmacionEliminacion(element) {
        var idSucursal = element.getAttribute('data-id');
        var modal = new bootstrap.Modal(document.getElementById("confirmacionEliminacionModal"));
        modal.show();
        document.getElementById("confirmacionEliminacionModal").setAttribute('data-id', idSucursal);
    }

    function eliminarSucursal() {
        var idSucursal = document.getElementById("confirmacionEliminacionModal").getAttribute('data-id');
        $.ajax({
            url: 'eliminar_sucursal.php',
            method: 'POST',
            data: { idSucursal: idSucursal },
            success: function(response) {
                location.reload();
            },
            error: function(xhr, status, error) {
                console.log(error);
            }
        });
        ocultarVentanaEmergente();
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
                              label: 'Total de stock por sucursal',
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
   
  <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
  <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/js/sidebarmenu.js"></script>
  <script src="../assets/js/app.min.js"></script>
  <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="../assets/js/dashboard.js"></script>
</body>

</html>


