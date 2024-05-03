<!DOCTYPE html>
<html lang="es">

<head>6
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ventas</title>
    <script defer src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script defer src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.10.1/jszip.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script defer src="https://cdn.datatables.net/buttons/2.4.1/js/buttons.html5.min.js"></script>
    <script defer src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"></script>
    <script defer src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
    <script defer src="script.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap5.min.css">
</head>

<body>
    <div class="card">
        <div class="card-header">Filtro</div>
        <div class="card-body">
            <form action="" method="post">
                Fecha inicial:
                <input type="date" name="inicio" id="inicio">
                Fecha final:
                <input type="date" name="fin" id="fin">
                <input class="btn btn-primary btn-space" type="submit" value="Filtrar">
                &nbsp;|&nbsp;&nbsp;<a class="btn btn-warning btn-space" href="ventas.php">Mostrar todos</a>
            </form>
        </div>
    </div>
    <br>
    <table id="tabla" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No. Venta</th>
                <th>Cantidad</th>
                <th>Fecha</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $whereConsulta = "";
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if (isset($_POST["inicio"]) && isset($_POST["fin"])) {
                    $whereConsulta = " WHERE Fecha BETWEEN '" . $_POST["inicio"] . "' AND '" . $_POST["fin"] . "'";
                }
            }
            $servername = "localhost";
            $username = "root";
            $password = "123456";
            $dbname = "EG01";

            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT tventas.id_ven, tventas.cant_prod, tventas.tot_ven, tventas.date_comp,
                    (SELECT  SUM(tventas.tot_ven) FROM tventas) AS total_ventas 
                    FROM tventas
                    JOIN tusuario ON tventas.usuario_ven = tusuario.id_Usuario
                    " . $whereConsulta;

            $result = $conn->query($sql);
            $totalRep = 0;
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo '<tr>
                            <td>' . $row["id_ven"] . '</td>
                            <td>' . $row["cant_prod"] . '</td>
                            <td>' . $row["date_comp"] . '</td>
                            <td>' . $row["tot_ven"] . '</td>
                        </tr>';
                    $totalRep += $row["tot_ven"];
                }
            }
            $conn->close();
            ?>
        </tbody>
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th>Total de ventas:</th>
                <th>$<?=  number_format((float)$totalRep, 2, '.', ','); ?></th>
            </tr>
        </tfoot>
    </table>

</body>

</html>
