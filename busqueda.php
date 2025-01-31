<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "remoteadd";
$password = "stafatima104";
$dbname = "credenciales";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtiene el valor del código QR enviado desde JavaScript
$codigo_qr = $_POST["codigo_qr"];
$codigo_qr = $conn->real_escape_string($codigo_qr);

// Realiza una consulta para buscar al usuario con el valor de $codigo_qr
$sql = "SELECT * FROM tabla WHERE uniqno = '$codigo_qr'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Se encontraron resultados, puedes procesarlos aquí
    while ($row = $result->fetch_assoc()) {
        $resultado = $row; // Maneja los resultados según tus necesidades
    }
    // Devuelve los resultados como JSON
    echo json_encode($resultado);
} else {
    echo "No se encontraron resultados.";
}

// Cierra la conexión a la base de datos
$conn->close();
?>
