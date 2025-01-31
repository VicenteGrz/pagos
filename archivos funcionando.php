<!DOCTYPE html>
<html>
<head>
    <title>Listar Carpetas</title>
</head>
<body>
    <h1>Carpetas Disponibles</h1>
    <ul>
    <?php
    $dir = '../vfm/uploads/'; 
    $folders = scandir($dir);

    foreach ($folders as $folder) {
        if (is_dir($dir . $folder) && $folder != '.' && $folder != '..') {
            echo '<li><a href="listar_archivos.php?folder=' . $folder . '">' . $folder . '</a></li>';
        }
    }
    ?>
    </ul>
</body>
</html>
