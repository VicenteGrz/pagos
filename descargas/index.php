<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            text-align: center;
            background-color: #f4f4f4;
        }
        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
        }
        header h1 {
            font-size: 36px;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
        }
        .file-list {
            list-style: none;
            padding: 0;
        }
        .file-list li {
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <header>
    
    </header>
    <div class="container">
        <ul class="file-list">
    <?php
$carpetas = array(
    "darchivos" => "Documentos"  
);

foreach ($carpetas as $carpeta => $titulo) {
    $archivos = scandir($carpeta);
    if (count($archivos) > 1) {
        echo "<li><strong>$titulo:</strong></li>";
        foreach ($archivos as $archivo) {
            if ($archivo != '.' && $archivo != '..') {
                $nombreArchivo = pathinfo($archivo, PATHINFO_FILENAME);
                echo "<li><a href='$carpeta/$archivo'>$nombreArchivo</a></li>";
            }
        }
    }
}
?>
</ul>

    </div>
</body>
</html>
<button onclick="goBackAndRedirect()">Volver</button>
<button onclick="redirectToUploadPage()">Subir Archivo</button>
<script>
        function goBackAndRedirect() {
            window.location.href = 'https://gruporeyes.cloud/pagos';
        }
        function redirectToUploadPage() {
            window.location.href = 'https://gruporeyes.cloud/pagos/upload.php';
        }
    </script>
</body>
</html>