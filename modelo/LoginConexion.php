<?php

$username = "root";
$password = "root";
$database = "vuelosamazing";
$host = "localhost";

// Crear conexión
$mysqli = new mysqli($host, $username, $password, $database, 3306);

// Verificar conexión
if ($mysqli->connect_error) {
    die("Error de conexión: " . $mysqli->connect_error);
}

?>