<?php
// Directorio donde se encuentran los archivos JSON
$directorio = '../vfm/vfm-admin/_content/log/';

// Obtener la lista de archivos en el directorio
$archivos = scandir($directorio);

// Filtrar solo los archivos JSON
$archivos_json = array_filter($archivos, function ($archivo) {
    return pathinfo($archivo, PATHINFO_EXTENSION) === 'json';
});

// Iniciar la tabla HTML
echo '<table border="1">';
echo '<tr><th>Archivo</th><th>Contenido</th></tr>';

// Recorrer cada archivo JSON y mostrar su contenido
foreach ($archivos_json as $archivo) {
    $ruta_archivo = $directorio . $archivo;

    // Leer el contenido del archivo JSON
    $contenido = file_get_contents($ruta_archivo);

    // Decodificar el JSON a un array asociativo
    $datos = json_decode($contenido, true);

    // Mostrar contenido en la tabla
    echo '<tr>';
    echo '<td>' . $archivo . '</td>';
    echo '<td><pre>' . print_r($datos, true) . '</pre></td>';
    echo '</tr>';
}

// Cerrar la tabla HTML
echo '</table>';
?>