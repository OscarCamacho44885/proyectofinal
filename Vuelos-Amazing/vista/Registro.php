<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../controlador/ClienteControler.php";


// Crear una instancia del controlador
$ClienteControler = new ClienteControler();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $Apaterno = $_POST['apaterno'];
    $Amaterno = $_POST['amaterno'];
    $cell = $_POST['telefono'];
    $correo = $_POST['correo'];
    $password = $_POST['password'];

    // Llamar al método para insertar un nuevo administrador
    $resultado = $ClienteControler->insertarCliente($nombre, $Apaterno, $Amaterno, $cell, $correo, $password);

    if ($resultado) {
        header("Location: ../index.php?mensaje=agregado");
        exit;
    } else {
        echo "<p>Error al Registrarse Intente de nuevo.</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="CSS/style.css">
    <title>REGISTRO</title>
    <style>
        /* General */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }

        main {
            flex: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        h1.text-center {
            font-size: 2.5rem;
            color: #007bff;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Contenedor del formulario */
        .form-container {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
            padding: 30px;
        }

        /* Etiquetas del formulario */
        .form-label {
            font-weight: bold;
            color: #555;
        }

        /* Campos del formulario */
        .form-control {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 2px solid #ddd;
            border-radius: 5px;
            font-size: 1rem;
            box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.1);
            transition: border-color 0.3s, box-shadow 0.3s;
        }

        .form-control:focus {
            border-color: #007bff;
            box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
            outline: none;
        }

        /* Botón de enviar */
        .btn-primary {
            background-color: #007bff;
            border: none;
            color: white;
            font-size: 1rem;
            font-weight: bold;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s, box-shadow 0.3s;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        /* Responsividad */
        @media (max-width: 768px) {
            .form-container {
                padding: 20px;
            }

            h1.text-center {
                font-size: 2rem;
            }
        }
    </style>
</head>
<body>

<br>
<br>
<br>

<main>
        <div class="form-container">
            <h1 class="text-center">Registro Nuevo Usuario</h1>
            <form method="POST" action="Registro.php">
                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombres: </label>
                    <input type="text" class="form-control" id="Nombre" name="nombre" placeholder="Escribe tu nombre" required>
                </div>
                <div class="mb-3">
                    <label for="Apaterno" class="form-label">Apellido Paterno: </label>
                    <input type="text" class="form-control" id="Apaterno" name="apaterno" placeholder="Escribe tu apellido paterno" required>
                </div>
                <div class="mb-3">
                    <label for="Amaterno" class="form-label">Apellido Materno: </label>
                    <input type="text" class="form-control" id="Amaterno" name="amaterno" placeholder="Escribe tu apellido materno" required>
                </div>
                <div class="mb-3">
                    <label for="Telefono" class="form-label">Número Telefónico: </label>
                    <input type="text" class="form-control" id="Telefono" name="telefono" placeholder="Escribe tu número de teléfono" required>
                </div>
                <div class="mb-3">
                    <label for="Correo" class="form-label">Correo Electrónico: </label>
                    <input type="email" class="form-control" id="Correo" name="correo" placeholder="Escribe tu correo electrónico" required>
                </div>
                <div class="mb-3">
                    <label for="Password" class="form-label">Contraseña: </label>
                    <input type="password" class="form-control" id="Password" name="password" placeholder="Escribe tu contraseña" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Registrarse</button> <a href="../index.php" class="btn btn-danger">Cancelar</a>
                </div>
                
            </form>
        </div>
    </main>

<?php require_once('LAYOUT/footer.php'); ?>
</body>
</html>