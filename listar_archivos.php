<!DOCTYPE html>
<html>
<head>
    <title>Archivos en la Carpeta</title>
</head>
<body>
    <h1>Archivos en la Carpeta Seleccionada</h1>
    <ul>
    <?php
    if (isset($_GET['folder'])) {
        $selectedFolder = '../vfm/uploads/' . $_GET['folder'];

        if (is_dir($selectedFolder)) {
            $files = scandir($selectedFolder);

            foreach ($files as $file) {
                if ($file != '.' && $file != '..') {
                    echo '<li>' . $file . '</li>';
                }
            }
        } else {
            echo '<li>La carpeta seleccionada no existe.</li>';
        }
    } else {
        echo '<li>No se ha seleccionado ninguna carpeta.</li>';
    }
    ?>
    </ul>
</body>
</html>