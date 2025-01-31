<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Descargar Archivos</title>
</head>
<body>
    <h1>Archivos Disponibles</h1>

    <?php
    $targetDir = "darchivos/";

    // Obtener la lista de archivos en el directorio
    $files = scandir($targetDir);
    foreach($files as $file){
        if($file != "." && $file != ".."){
            echo '<p><a href="'.$targetDir.$file.'" download>'.$file.'</a></p>';
        }
    }
    ?>
</body>
</html>