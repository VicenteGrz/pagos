<?php
// Incluye el archivo de conexión
include 'db_connect.php';

// Definir un array asociativo con las bases de datos y sus contraseñas correspondientes
$databases = array(
    'u814339862_mante' => 'u814339862_adminmante',
    'u814339862_victoria' => 'u814339862_adminvictoria'
    'u814339862_pagos' => 'u814339862_adminpagos'
    // Agrega más bases de datos y contraseñas si es necesario
);

// Verifica si se envió un formulario para cambiar la base de datos
if(isset($_POST['new_database'])){
    // Obtiene el nombre de la nueva base de datos desde el formulario
    $selected_db = $_POST['new_database'];

    // Verifica si la base de datos seleccionada existe en el array
    if(array_key_exists($selected_db, $databases)){
        // Obtiene la contraseña correspondiente a la base de datos seleccionada
        $new_db_password = $databases[$selected_db];

        // Realiza la conexión con la nueva base de datos y contraseña
        $conn = new mysqli('localhost', $new_db_password, $new_db_password, $selected_db) or die("Could not connect to mysql" . mysqli_error($con));
    }
}

// Aquí va tu HTML, formulario o botón select para cambiar la base de datos
// Ejemplo con un formulario sencillo
?>
<form method="POST" action="">
    <label for="new_database">Selecciona una nueva base de datos:</label>
    <select name="new_database">
        <option value="u814339862_mante">Base de Datos 1</option>
        <option value="u814339862_victoria">Base de Datos 2</option>
        <option value="u814339862_pagos">Base de Datos 3</option>
        <!-- Agrega más opciones si es necesario -->
    </select>
    <input type="submit" value="Cambiar Base de Datos">
</form>