<?php
require 'vendor/autoload.php'; // Ajusta la ubicación de la biblioteca si es necesario

use chillerlan\QRCode\QRCode;
use chillerlan\QRCode\Output\QRImage;

// Conecta a la base de datos y recupera los datos de la columna
$servername = "localhost"; // Nombre del servidor de la base de datos
$username = "remoteadd";  // Nombre de usuario de la base de datos
$password = "stafatima104";  // Contraseña de la base de datos
$dbname = "credenciales";  // Nombre de la base de datos

// Crear una conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
} else {
    echo "Conexión exitosa";
}

// Realiza operaciones en la base de datos aquí

// Cerrar la conexión

$qrcode = new QRCode;
$output = new QRImage;

foreach ($data as $row) {
    // Genera un código QR para cada dato
    $codeContents = $row['uniqid'];
    $qrcode->render($codeContents, 'generados/' . $row['id'] . '.png');
}
?>