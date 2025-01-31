<?php
$directorio = '../vfm/vfm-admin/_content/log/';
$archivos = scandir($directorio);
$archivos_json = array_filter($archivos, function ($archivo) {
    return pathinfo($archivo, PATHINFO_EXTENSION) === 'json';
});

echo '<table border="1">';
echo '<tr><th>Archivo</th><th>Usuario</th><th>Accion</th><th>Tipo</th><th>Archivo</th><th>Hora</th></tr>';

foreach ($archivos_json as $archivo) {
    $ruta_archivo = $directorio . $archivo;
    $contenido = file_get_contents($ruta_archivo);
    $datos = json_decode($contenido, true);

    echo '<tr>';
    echo '<td>' . $archivo . '</td>';

    // Iterar sobre las fechas y sus respectivos conjuntos de objetos
    foreach ($datos as $fecha => $conjunto) {
        foreach ($conjunto as $item) {
            // Mostrar los valores correspondientes en la tabla
            echo '<td>' . $item['archivo'] . '</td>';
            echo '<td>' . $item['user'] . '</td>';
            echo '<td>' . $item['action'] . '</td>';
            echo '<td>' . $item['type'] . '</td>';
            echo '<td>' . $item['item'] . '</td>';
            echo '<td>' . $item['time'] . '</td>';
            echo '</tr><tr>'; // Crear una nueva fila para el próximo conjunto de datos
        }
    }
}

echo '</tr>';
echo '</table>';
?>