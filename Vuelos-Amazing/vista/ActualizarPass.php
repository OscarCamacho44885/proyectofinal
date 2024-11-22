<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['cliente_id'])) {
    header("Location: ../index.php"); // Redirige al login si no está logueado
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $cliente_id = $_SESSION['cliente_id'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Conexión a la base de datos
    $servername = "sql201.infinityfree.com";
    $username = "if0_37584141";
    $password = "KFHYXnAtdVQtT";
    $dbname = "if0_37584141_vuelosamazing";
    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Verificar si la contraseña actual es correcta
    $sql = "SELECT Pass FROM cliente WHERE ID_Cliente = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $cliente_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $cliente = $result->fetch_assoc();
        if ($cliente['Pass'] == $old_password) {
            // Verificar si la nueva contraseña y la confirmación coinciden
            if ($new_password == $confirm_password) {
                // Actualizar la contraseña
                $sql_update = "UPDATE cliente SET Pass = ? WHERE ID_Cliente = ?";
                $stmt_update = $conn->prepare($sql_update);
                $stmt_update->bind_param("si", $new_password, $cliente_id);
                if ($stmt_update->execute()) {
                    // Si la contraseña se cambió exitosamente, actualizarla en la sesión
                    $_SESSION['cliente_correo'] = $correo; // Deja el correo intacto
                    $_SESSION['cliente_nombre'] = $nombre; // Deja el nombre intacto
                    $_SESSION['cliente_ape_paterno'] = $ape_paterno; // Deja el apellido intacto
                    $_SESSION['cliente_ape_materno'] = $ape_materno; // Deja el apellido intacto
                    $_SESSION['cliente_telefono'] = $telefono; // Deja el teléfono intacto
                    header("Location: index.php");
                } else {
                    echo "Error al cambiar la contraseña.";
                }
            } else {
                echo "Las contraseñas no coinciden.";
            }
        } else {
            echo "La contraseña actual es incorrecta.";
        }
    } else {
        echo "Usuario no encontrado.";
    }

    $stmt->close();
    $conn->close();
}
?>
