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
      height: 600px;
      /* Ajusta la altura deseada */
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
            <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
          <ul id="sidebarnav">
            <li class="nav-small-cap">
              <i class="ti ti-dots nav-small-cap-icon fs-4"></i>
              <span class="hide-menu">Reportes</span>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./Reportes/Clientes.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">CLIENTES</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./Reportes/Ventas.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Ventas</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./Reportes/inventario.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Inventario</span>
              </a>
            </li>
            <li class="sidebar-item">
              <a class="sidebar-link" href="./Reportes/empleados.php" aria-expanded="false">
                <span>
                  <i class="ti ti-article"></i>
                </span>
                <span class="hide-menu">Empleados</span>
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
                    <a href="../../../cerrar_sesion.php" class="btn btn-outline-primary mx-3 mt-2 d-block">Cerrar
                      Sesión</a>
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
                    <h5 class="card-title fw-semibold">Resumen de Ventas</h5>
                  </div>                  
                </div>
                <?php
                  // 1. Establecer la conexión a la base de datos MySQL
                  include("./conexion_database.php");

                  // 2. Realizar la consulta a la base de datos
                  $sql = "SELECT MONTH(date_comp) AS mes, COUNT(*) AS cantidad_ventas
                  FROM tventas
                  GROUP BY MONTH(date_comp)";
                  $result = $conexion->query($sql);

                  // 3. Construir los datos en un formato compatible con Chart.js
                  $labels = [];
                  $data = [];

                  if ($result->num_rows > 0) {
                      while ($row = $result->fetch_assoc()) {
                          $labels[] = $row["mes"];
                          $data[] = intval($row["cantidad_ventas"]);
                      }
                  }

                  // 4. Cerrar la conexión a la base de datos
                  $conexion->close();
                ?>
                <canvas id="barras"></canvas>

              
              </div>
            </div>
          </div>
          

        <div class="row">



          <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
              <div class="card-body p-4">
                <h5 class="card-title fw-semibold mb-4">Usuarios</h5>
                <div class="table-container">
                  <div class="table-responsive">
                    <table class="table text-nowrap mb-0 align-middle">
                      <thead class="text-dark fs-4">
                        <tr>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Id</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Nombre</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Contraseña</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Estatus</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Correo</h6>
                          </th>
                          <th class="border-bottom-0">
                            <h6 class="fw-semibold mb-0">Tipo</h6>
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

              // Consulta a la base de datos para obtener los usuarios
              $sql = "SELECT id_Usuario, nombre_usuario, contraseña_usuario, estatus_usu, correo_usu, tipo_usu FROM TUsuario";
              $result = $conexion->query($sql);

              if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-0'>" . $row["id_Usuario"] . "</h6></td>";
                  echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-1'>" . $row["nombre_usuario"] . "</h6></td>";
                  echo "<td class='border-bottom-0'><p class='mb-0 fw-normal'>" . $row["contraseña_usuario"] . "</p></td>";
                  echo "<td class='border-bottom-0'><div class='d-flex align-items-center gap-2'><span class='badge bg-primary rounded-3 fw-semibold'>" . $row["estatus_usu"] . "</span></div></td>";
                  echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-0 fs-4'>" . $row["correo_usu"] . "</h6></td>";
                  echo "<td class='border-bottom-0'><h6 class='fw-semibold mb-0 fs-4'>" . $row["tipo_usu"] . "</h6></td>";
                  echo "<td class='border-bottom-0'>
                          <div class='dropdown'>
                            <button class='btn btn-primary dropdown-toggle' type='button' id='dropdownMenuButton1' data-bs-toggle='dropdown' aria-expanded='false'>
                              Acciones
                            </button>
                            <ul class='dropdown-menu' aria-labelledby='dropdownMenuButton1'>
                              <li><a class='dropdown-item' href='#' data-id='" . $row["id_Usuario"] . "' onclick='mostrarTarjetaEdicion(this)'>Editar</a></li>
                              <li><a class='dropdown-item' href='#' data-id='" . $row["id_Usuario"] . "' onclick='mostrarConfirmacionEliminacion(this)'>Eliminar</a></li>
                              <li><a class='dropdown-item' href='#' onclick='mostrarTarjetaAlta()'>Alta</a></li> <!-- Nueva opción de Alta -->
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


<!-- Tarjeta de edición oculta -->
<div id="tarjetaEdicion" class="card d-none">
    <div class="card-body">
        <h5 class="card-title">Editar Usuario</h5>
        <form action="guardar_cambios.php?success=1" method="POST">
            <div class="mb-3">
                <label for="nombre">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre">
            </div>
            <div class="mb-3">
                <label for="contraseña">Contraseña</label>
                <input type="password" class="form-control" id="contraseña" name="contraseña">
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
                <label for="correo">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo">
            </div>
            <input type="hidden" name="idUsuario">
            <button type="submit" class="btn btn-primary">Guardar Cambios</button>
        </form>
    </div>
</div>

<!-- Tarjeta de alta oculta ALTA -->
<div id="tarjetaAlta" class="card d-none">
  <div class="card-body">
    <h5 class="card-title">Agregar Nuevo Usuario</h5>
    <form action="alta_usuario.php" method="POST"> <!-- Modificar la acción y el método según corresponda -->
      <div class="mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" required>
      </div>
      <div class="mb-3">
        <label for="contraseña">Contraseña</label>
        <input type="password" class="form-control" id="contraseña" name="contraseña" required>
      </div>

      <div class="mb-3">
        <label for="correo">Correo</label>
        <input type="email" class="form-control" id="correo" name="correo" required>
      </div>
      <div class="mb-3">
        <label for="tipo">Tipo de Usuario</label>
        <select class="form-select" id="tipo" name="tipo" required>
          <option value=""></option>
          <option value="Cliente">Cliente</option>
          <option value="Empleado">Empleado</option>
          <option value="Admin">Administrador</option>
        </select>
      </div>
      <button type="submit" class="btn btn-primary">Guardar Usuario</button>
    </form>
  </div>
</div>



<!-- Ventana emergente de confirmación de eliminación -->
<div class="modal fade" id="confirmacionEliminacionModal" tabindex="-1" aria-labelledby="confirmacionEliminacionModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="confirmacionEliminacionModalLabel">Confirmar eliminación</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>¿Estás seguro de que deseas eliminar este usuario?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" onclick="mostrarTarjetaEdicion()">Cancelar</button>
        <button type="button" class="btn btn-danger" onclick="eliminarUsuario()">Eliminar</button>
      </div>
    </div>
  </div>
</div>



<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>      
function mostrarTarjetaEdicion(element) {
    // Obtener los valores de la fila seleccionada
    var fila = element.closest("tr");
    var idUsuario = fila.querySelector("td:nth-child(1) h6").innerText;
    var nombre = fila.querySelector("td:nth-child(2) h6").innerText;
    var contraseña = fila.querySelector("td:nth-child(3) p").innerText;
    var estatus = fila.querySelector("td:nth-child(4) span").innerText;
    var correo = fila.querySelector("td:nth-child(5) h6").innerText;

    // Asignar los valores a los campos de la tarjeta de edición
    document.getElementById("nombre").value = nombre;
    document.getElementById("contraseña").value = contraseña;
    document.getElementById("estatus").value = estatus;
    document.getElementById("correo").value = correo;
    document.querySelector("#tarjetaEdicion [name='idUsuario']").value = idUsuario;

    // Mostrar la tarjeta de edición
    $('#tarjetaEdicion').removeClass('d-none');
    $('html, body').animate({
        scrollTop: $('#tarjetaEdicion').offset().top
    }, 'slow');
}

  
  function mostrarConfirmacionEliminacion(element) {
    var idUsuario = element.getAttribute('data-id');
    var modal = new bootstrap.Modal(document.getElementById("confirmacionEliminacionModal"));
    modal.show();
    document.getElementById("confirmacionEliminacionModal").setAttribute('data-id', idUsuario);
  }

  function eliminarUsuario() {
    var idUsuario = document.getElementById("confirmacionEliminacionModal").getAttribute('data-id');
    $.ajax({
      url: 'eliminar_usuario.php',
      method: 'POST',
      data: { idUsuario: idUsuario },
      success: function(response) {
        // El usuario se eliminó correctamente, realiza las acciones necesarias
        // como recargar la tabla de usuarios o mostrar un mensaje de éxito.
        location.reload();
      },
      error: function(xhr, status, error) {
        // Ocurrió un error al eliminar el usuario, maneja el error de acuerdo a tus necesidades.
        console.log(error);
      }
    });
    var modal = new bootstrap.Modal(document.getElementById("confirmacionEliminacionModal"));
    modal.hide();
  }
  function mostrarTarjetaAlta() {
  $('#tarjetaAlta').removeClass('d-none');
  $('html, body').animate({
    scrollTop: $('#tarjetaAlta').offset().top
  }, 'slow');
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
            label: 'Total de ventas por mes',
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

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/js/sidebarmenu.js"></script>
    <script src="../assets/js/app.min.js"></script>
    <script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
    <script src="../assets/libs/simplebar/dist/simplebar.js"></script>
    <script src="../assets/js/dashboard.js"></script>
</body>

</html>