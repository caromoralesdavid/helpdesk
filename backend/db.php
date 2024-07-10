<?php
require_once 'config.php';

function getDBConnection() {
    $link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Verificar la conexión
    if($link === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
    return $link;
}
?>
