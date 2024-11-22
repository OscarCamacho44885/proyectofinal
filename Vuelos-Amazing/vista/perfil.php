<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perfil</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <style>
        body {
            background-color: #f4f4f9;
        }
        .container {
            margin-top: 50px;
        }
        h1, h2 {
            font-weight: bold;
            color: #2c3e50;
        }
        .card {
            padding: 20px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }
        .form-control {
            margin-bottom: 15px;
        }
        .btn-custom {
            background-color: #3498db;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            cursor: pointer;
        }
        .btn-custom:hover {
            background-color: #2980b9;
        }
        .form-label {
            font-weight: bold;
        }
        #change-password-form, #historial-form {
            display: none; /* El formulario estará oculto por defecto */
        }
    </style>
</head>
<body>
<img src="IMG/imgbanner.png" height="40%" width="100%">
<?php require_once "LAYOUT/header1.php";
 ?>
<?php
session_start();

// Verificar si el usuario está logueado
if (!isset($_SESSION['cliente_id'])) {
    header("Location: ../index.php"); // Redirige al login si no está logueado
    exit();
}

$nombre = $_SESSION['cliente_nombre'];
$ape_paterno = $_SESSION['cliente_ape_paterno'];
$ape_materno = $_SESSION['cliente_ape_materno'];
$telefono = $_SESSION['cliente_telefono'];
$correo = $_SESSION['cliente_correo'];
$cliente_id = $_SESSION['cliente_id'];

// Conexión a la base de datos
$servername = "sql201.infinityfree.com";
$username = "if0_37584141";
$password = "KFHYXnAtdVQtT";
$dbname = "if0_37584141_vuelosamazing";
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener el historial del cliente
$sql_historial = "SELECT * FROM historial_cliente WHERE ID_Cliente = ?";
$stmt_historial = $conn->prepare($sql_historial);
$stmt_historial->bind_param("i", $cliente_id);
$stmt_historial->execute();
$result_historial = $stmt_historial->get_result();
?>
    <div class="container">
        <!-- Perfil de usuario -->
        <div class="card">
            <h1 class="text-center">Bienvenido, <?php echo $nombre . ' ' . $ape_paterno . ' ' . $ape_materno; ?></h1>
            <p><strong>Teléfono:</strong> <?php echo $telefono; ?></p>
            <p><strong>Correo:</strong> <?php echo $correo; ?></p>
        </div>

        <!-- Botón para mostrar el formulario de cambio de contraseña -->
        <div class="text-center mt-4">
            <button class="btn btn-warning" onclick="togglePasswordForm()">Cambiar Password</button>
        </div>

        <!-- Botón para mostrar el historial -->
        <div class="text-center mt-4">
            <button class="btn btn-info" onclick="toggleHistorialForm()">Ver Historial de Vuelos</button>
        </div>

        <!-- Formulario para cambiar la contraseña -->
        <div class="card mt-4" id="change-password-form">
            <h2>Cambiar Contraseña</h2>
            <form action="ActualizarPass.php" method="POST">
                <div class="mb-3">
                    <label for="old_password" class="form-label">Contraseña actual:</label>
                    <input type="password" name="old_password" id="old_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="new_password" class="form-label">Nueva contraseña:</label>
                    <input type="password" name="new_password" id="new_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="confirm_password" class="form-label">Confirmar nueva contraseña:</label>
                    <input type="password" name="confirm_password" id="confirm_password" class="form-control" required>
                </div>

                <div class="text-center">
                    <button type="submit" class="btn btn-custom">Cambiar contraseña</button>
                </div>
            </form>
        </div>

        <!-- Tabla de Historial de Vuelos -->
        <div class="card mt-4" id="historial-form">
            <h2>Historial de Vuelos</h2>
            <table class="table">
                <thead>
                    <tr>
                        <th>Vuelo</th>
                        <th>Nombre del Hotel</th>
                        <th>Destino</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Mostrar los registros de historial
                    if ($result_historial->num_rows > 0) {
                        while ($row = $result_historial->fetch_assoc()) {
                            echo "<tr>
                                    <td>" . $row['Vuelo'] . "</td>
                                    <td>" . $row['Nombre_Hotel'] . "</td>
                                    <td>" . $row['Destino'] . "</td>
                                    <td>" . $row['Fecha'] . "</td>
                                  </tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>No hay historial disponible.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        // Función para mostrar/ocultar el formulario de cambio de contraseña
        function togglePasswordForm() {
            const form = document.getElementById('change-password-form');
            form.style.display = form.style.display === "none" || form.style.display === "" ? "block" : "none";
        }

        // Función para mostrar/ocultar el historial de vuelos
        function toggleHistorialForm() {
            const form = document.getElementById('historial-form');
            form.style.display = form.style.display === "none" || form.style.display === "" ? "block" : "none";
        }
    </script>

    <?php require_once "LAYOUT/footer.php"; ?>
</body>
</html>
