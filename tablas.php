<?php include('db_connect.php'); ?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Lista de Tablas</title>
</head>

<body>
    <div>
        <h2>Selecciona una tabla:</h2>
        <form method="post">
            <select name="tabla">
                <?php
                // Obtener las tablas disponibles
                $query = "SHOW TABLES";
                $result = $conn->query($query);

                if ($result) {
                    while ($row = $result->fetch_array()) {
                        echo "<option value='" . $row[0] . "'>" . $row[0] . "</option>";
                    }
                }
                ?>
            </select>
            <input type="submit" value="Mostrar tabla">
        </form>
    </div>

    <?php
    // Mostrar la tabla seleccionada
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['tabla'])) {
            $selectedTable = $_POST['tabla'];

            // Realizar la consulta para obtener datos de la tabla seleccionada
            $dataQuery = "SELECT * FROM " . $selectedTable;
            $dataResult = $conn->query($dataQuery);

            if ($dataResult) {
                echo "<h2>Contenido de la tabla '$selectedTable':</h2>";
                echo "<table border='1'>";
                while ($dataRow = $dataResult->fetch_assoc()) {
                    echo "<tr>";
                    foreach ($dataRow as $value) {
                        echo "<td>$value</td>";
                    }
                    echo "</tr>";
                }
                echo "</table>";
            } else {
                echo "Error al obtener datos de la tabla '$selectedTable'";
            }
        }
    }
    ?>

</body>

</html>