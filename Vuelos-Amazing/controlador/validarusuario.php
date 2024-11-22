<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<?php
// login_process.php

// Conexión a la base de datos
$servername = "sql201.infinityfree.com";
$username = "if0_37584141"; // Cambia con tu usuario de la base de datos
$password = "KFHYXnAtdVQtT"; // Cambia con tu contraseña de la base de datos
$dbname = "if0_37584141_vuelosamazing"; // Nombre de tu base de datos

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el nombre de usuario y la contraseña del formulario
$user = $_POST['username'];
$pass = $_POST['password'];

// Consulta para verificar si el usuario existe y obtener su rol
$sql = "SELECT * FROM admins WHERE Correo = ? AND Pass = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $user, $pass);
$stmt->execute();
$result = $stmt->get_result();

// Comprobar si se encontró al usuario
if ($result->num_rows > 0) {
    // El usuario es un admin
    header("Location: ../vista/planesadm.php");
} else {
    // Verificar si es un cliente
    $sql_cliente = "SELECT * FROM cliente WHERE Correo = ? AND Pass = ?";
    $stmt_cliente = $conn->prepare($sql_cliente);
    $stmt_cliente->bind_param("ss", $user, $pass);
    $stmt_cliente->execute();
    $result_cliente = $stmt_cliente->get_result();

    if ($result_cliente->num_rows > 0) {
        // El usuario es un cliente
        session_start();
        $cliente = $result_cliente->fetch_assoc();
        
        // Guardamos los datos del cliente en la sesión
        $_SESSION['cliente_id'] = $cliente['ID_Cliente']; // Guardamos el ID del cliente
        $_SESSION['cliente_nombre'] = $cliente['Nombres'];
        $_SESSION['cliente_ape_paterno'] = $cliente['Ape_Paterno'];
        $_SESSION['cliente_ape_materno'] = $cliente['Ape_Materno'];
        $_SESSION['cliente_telefono'] = $cliente['Numero_Telefono'];
        $_SESSION['cliente_correo'] = $cliente['Correo'];

        // Redirigir a la página correcta para el cliente
        header("Location: ../vista/index.php");
    } else {
        // Si no es ni admin ni cliente
        echo "Usuario o contraseña incorrectos";
    }
}

$stmt->close();
$conn->close();
?>