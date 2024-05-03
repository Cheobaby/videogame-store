<?php
// 1. Establecer la conexión a la base de datos MySQL
include("./dashboard/src/html/conexion_database.php");

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

<!DOCTYPE html>
<html>
<head>
    <title>Gráfica de barras de productos por sucursal</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <canvas id="barras"></canvas>

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
</body>
</html>