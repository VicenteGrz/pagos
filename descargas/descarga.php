<?php
if (isset($_GET['archivo'])) {
  $archivo = $_GET['archivo'];
  $ruta = 'descargas/' . $archivo;

  if (file_exists($ruta)) {
    // Realizar la descarga del archivo
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header('Content-Disposition: attachment; filename=' . basename($ruta));
    header('Content-Transfer-Encoding: binary');
    header('Expires: 0');
    header('Cache-Control: must-revalidate');
    header('Pragma: public');
    header('Content-Length: ' . filesize($ruta));
    readfile($ruta);
    exit;
  } else {
    echo "El archivo no existe.";
  }
} else {
  echo "Parámetros incorrectos.";
}
