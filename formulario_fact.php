<?php
session_start();
echo '<!DOCTYPE html>';
echo '<html lang="es">';
echo '<head>';
echo '    <meta charset="UTF-8">';
echo '    <meta name="viewport" content="width=device-width, initial-scale=1.0">';
echo '    <title>Formulario de Facturación</title>';
echo '    <!-- Enlace al archivo CSS de Bootstrap 5 -->';
echo '    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">';
echo '</head>';
echo '<body>';

echo '<div class="container mt-5">';
echo '    <p class="mb-3">Complete los siguientes campos para generar la factura:</p>';
echo '    <form action="formulario_fact.php" method="POST">';
echo '        <div class="mb-3">';
echo '            <input type="text" id="nom_fact" class="form-control" placeholder="Nombre" name="nombre">';
echo '        </div>';
echo '        <div class="mb-3">';
echo '            <input type="text" id="apellido_mat" class="form-control" placeholder="Apellido Materno" name="apellido_mat">';
echo '        </div>';
echo '        <div class="mb-3">';
echo '            <input type="text" id="apellido_pat" class="form-control" placeholder="Apellido Paterno" name="apellido_pat">';
echo '        </div>';
echo '        <div class="mb-3">';
echo '            <input type="text" id="rfc_fact" class="form-control" placeholder="RFC" name="rfc">';
echo '        </div>';
echo '        <div class="mb-3">';
echo '            <input type="email" id="email_fact" class="form-control" placeholder="Email" name="email">';
echo '        </div>';
echo '        <div class="mb-3">';
echo '            <input type="number" id="telefono_fact" class="form-control" placeholder="Teléfono" name="tel">';
echo '        </div>';
echo '        <div class="mb-3">';
echo '            <input type="text" id="ciudad_fact" class="form-control" placeholder="Ciudad" name="ciudad">';
echo '        </div>';
echo '        <div class="mb-3">';
echo '            <input type="text" id="calle_fact" class="form-control" placeholder="Calle" name="calle">';
echo '        </div>';
echo '        <div class="mb-3">';
echo '            <input type="text" id="colonia_fact" class="form-control" placeholder="Colonia" name="colonia">';
echo '        </div>';
echo '        <button type="submit" name="guardar" id="guardar" class="btn btn-primary">Guardar</button>';
echo '        <a href="carro.php" class="btn btn-secondary">Cancelar</a>';
echo '    </form>';
echo '</div>';
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
        
        echo '<a href="./INVOICE-main/mi_factura.php" target="_blank" class="btn btn-success">Descargar Factura</a>';
    } else {
        echo "Error al guardar la información: " . $conexion->error;
    }
    $conexion->close();
  }   
echo '<!-- Enlace al archivo JavaScript de Bootstrap 5 (opcional) -->';
echo '<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>';
echo '</body>';
echo '</html>';
?>
