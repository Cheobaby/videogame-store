<!DOCTYPE html>
<html lang="en">

<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="assets/css/fontawesome.css">

  <style>
     body {
          background: black;
        }
  </style>
</head>

<body>
  <?php    
  session_start();
  $usu=$_SESSION['id_Usuario'];
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
      include("./dashboard/src/html/conexion_database.php");
      if(isset($_POST['searchKeyword'])) {
          $searchKeyword = $_POST['searchKeyword'];

          $query = "SELECT DISTINCT tinventario.id_prod,nombre_Prod,id_Cate,
          estatus_inv,descripcion_Prod,precio_Uni,foto
          FROM tinventario
          JOIN tproductos ON tproductos.id_prod=tinventario.id_prod
          WHERE estatus_inv!='PR_0' AND nombre_Prod LIKE '%$searchKeyword%'";

          $result = $conexion->query($query);
          
          if ($result->num_rows > 0) {
              while ($row = $result->fetch_assoc()) {                
              $prod=$row['id_prod'];
              $con="SELECT SUM(stock_inv) AS inv, COUNT(estatus_inv) AS dispo 
              FROM tinventario 
              WHERE id_prod = '$prod' AND estatus_inv = 'PR_1'";
              $ress=$conexion->query($con);
              $inventario=$ress->fetch_assoc();
                  $rutaImagen = "assets/images/" . $row['foto'];
                  echo '<div class="container d-flex justify-content-center align-items-center" style="height: 100vh;">';
                  echo '    <div class="card" style="width: 18rem;">';
                  echo '        <img src="' . $rutaImagen . '" class="card-img-top" alt="..." onclick="redireccionar(\'' . $row['id_prod'] . '\')">';
                  echo '        <div class="card-body text-center">';
                  echo '            <h5 class="card-title"> '. $row['nombre_Prod'] .'</h5>';
                  echo '            <a href="agregar_deseos.php?id=' . $row['id_prod'] . '">Agregar a lista de deseos <i class="fa fa-heart"></i></a>';
                  echo '            <li style="text-align: left;">Disponibles: ' . $inventario['inv'] . ' <i class="fa fa-cubes"></i></li>';
                  if (!empty($_SESSION['id_Usuario'])) {
                    if($inventario['inv']<1 || $inventario['dispo']=='0'){
                      echo '<button class="btn btn-secondary">Agotado</button>';
                    }
                    else{                              
                      echo '<a href="agregar_car.php?id_prod=' . $row['id_prod'] . '&id_usu=' . $usu . '" class="btn btn-primary ' . $row['id_prod'] . '" name="btnAgregar">Agregar al carrito</a>';
                    }                                                            
                  }
                  else {
                    echo '<button class="btn btn-primary">Agregar al carrito</button>';
                  }          
                  echo '            <a href="index.php" class="btn btn-primary">Volver</a>';
                  echo '        </div>';
                  echo '    </div>';
                  echo '</div>';
              }
          }
          $conexion->close();
      }
  }
  ?>

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
</body>

</html>