<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../controlador/AdminsCrontroler.php";

// Crear una instancia del controlador
$adminControler = new AdminsControler();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Llamar al método para insertar un nuevo administrador
    $resultado = $adminControler->insertarAdmin($nombre, $correo, $password);

    if ($resultado) {
        header("Location: planesadm.php?mensaje=agregado");
        exit;
    } else {
        echo "<p>Error al agregar el administrador.</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Administrador</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/style.css">
    <style>
    /* Estilo de los títulos */
    h1.text-center {
        font-size: 2.5rem;
        color: #000000;
        margin-bottom: 30px;
        font-weight: bold;
    }

    /* Estilo para el contenedor del formulario */
    .form-container {
        border-radius: 10px;
        padding: 30px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        background-color: #2ca6f0;
        max-width: 600px;
        margin: auto;
    }

    /* Estilo de las etiquetas de los formularios */
    .form-label {
        font-weight: bold;
        color: #333;
    }

    /* Estilo de los botones */
    .btn-primary {
        background-color: #007bff;
        border: none;
        color: white;
        font-weight: bold;
        padding: 10px 20px;
        border-radius: 5px;
        transition: background-color 0.3s;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    /* Estilo de los campos del formulario */
    .form-control {
        border-radius: 5px;
        border: 2px solid #007bff;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        margin-bottom: 15px;
    }

    .form-control:focus {
        border-color: #0056b3;
        box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }
</style>
</head>
<body>

<img src="IMG/imgbanner.png" height="40%" width="100%">
<?php require_once('LAYOUT/header.php'); ?>
<br>
<br>
<br>
<div class="container">
    <div class="form-container" style="background-color: #2ca6f0;">
        <h2 class="text-center mb-4" style="color: #000000; font-weight: bold;">Registrar Nuevo Administrador</h2>
        <form method="POST" action="Registroadm.php">
            <div class="mb-3">
                <label for="nombre" class="form-label" style="font-weight: bold; color: #333;">Nombre del Administrador</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required />
            </div>
            <div class="mb-3">
                <label for="correo" class="form-label" style="font-weight: bold; color: #333;">Correo</label>
                <input type="email" class="form-control" id="correo" name="correo" required />
            </div>
            <div class="mb-3">
                <label for="password" class="form-label" style="font-weight: bold; color: #333;">Contraseña</label>
                <input type="password" class="form-control" id="password" name="password" required />
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary" style="font-weight: bold; padding: 10px 20px;">Agregar Administrador</button>
            </div>
        </form>
    </div>
</div>

<?php require_once('LAYOUT/footer.php'); ?>
</body>
</html>


