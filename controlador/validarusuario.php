<?php
session_start();

$correo = $_POST['formcorreo'];
$clave = $_POST['formcontrasena'];

include '../modelo/LoginConexion.php'; // Asegúrate de que la conexión sea correcta

if ($mysqli->connect_errno) {
    echo "No se puede conectar a MySQL: " . $mysqli->connect_error;
    exit();
}

// Sanitize input to prevent SQL injection
$correo = mysqli_real_escape_string($mysqli, $correo);
$clave = mysqli_real_escape_string($mysqli, $clave);

// Realizamos la consulta
// Consulta en la tabla de administradores
$consultaAdmin = "SELECT * FROM admins WHERE Correo = '$correo' AND contraseña = '$clave'";
$resultadoAdmin = mysqli_query($mysqli, $consultaAdmin);

if ($resultadoAdmin && mysqli_num_rows($resultadoAdmin) > 0) {
    $fila = mysqli_fetch_assoc($resultadoAdmin);

    $_SESSION['nombre'] = $fila['Nombre']; // Guardamos el nombre del administrador en sesión
    header("Location: ../vista/planesadm.php"); // Página del administrador
    exit();
}else{



// Consulta en la tabla de personal
$consultaPersonal = "SELECT * FROM cliente WHERE Correo = '$correo' AND contraseña = '$clave'";
$resultadoPersonal = mysqli_query($mysqli, $consultaPersonal);

if ($resultadoPersonal && mysqli_num_rows($resultadoPersonal) > 0) {
    $fila = mysqli_fetch_assoc($resultadoPersonal);

    $_SESSION['nombre'] = $fila['Nombres']; // Guardamos el nombre del personal en sesión
    header("Location: ../vista/index.php"); // Página del personal
    exit();
}
}

// Si no se encuentra en ninguna tabla
header("Location: ../index.php?error=1");
exit();
?>