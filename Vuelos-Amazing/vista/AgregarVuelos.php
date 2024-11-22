<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <title>Agregar Vuelo</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        h1 {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
            margin-bottom: 40px;
        }
        .container {
            width: 60%;
            margin: 0 auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 40px;
            border-radius: 8px;
        }
        form {
            display: flex;
            flex-direction: column;
        }
        label {
            font-size: 16px;
            margin-bottom: 8px;
            font-weight: bold;
        }
        input {
            padding: 12px;
            font-size: 16px;
            border: 1px solid #ddd;
            border-radius: 4px;
            margin-bottom: 20px;
        }
        input[type="number"] {
            -moz-appearance: textfield;
        }
        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #007bff;
            outline: none;
        }
        button {
            background-color: #007bff;
            color: white;
            padding: 12px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button:hover {
            background-color: #0056b3;
        }
        button:active {
            background-color: #004085;
        }
        .btn-danger {
            background-color: #dc3545; /* Rojo para el botón de cancelar */
        }
        .btn-danger:hover {
            background-color: #c82333;
        }
        .btn-danger:active {
            background-color: #bd2130;
        }
    </style>
</head>
<body>
<?php
require_once "../controlador/VuelosControler.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $destino = $_POST['destino'];
    $precio = $_POST['precio'];
    $fechaVuelo = $_POST['fecha_vuelo'];
    $fechaAterrizaje = $_POST['fecha_aterrizaje'];

    if (VuelosControler::agregarVuelo($destino, $precio, $fechaVuelo, $fechaAterrizaje)) {
        header("Location: vuelosadm.php");
    } else {
        echo "Error al agregar el vuelo.";
    }
}
?>


    <h1>Agregar Vuelo</h1>
    <div class="container">
        <form method="POST">
            <label for="destino">Destino:</label>
            <input type="text" id="destino" name="destino" required>

            <label for="precio">Precio:</label>
            <input type="number" id="precio" name="precio" step="0.01" required>

            <label for="fecha_vuelo">Fecha de Vuelo:</label>
            <input type="text" id="fecha_vuelo" name="fecha_vuelo" required>

            <label for="fecha_aterrizaje">Fecha de Aterrizaje:</label>
            <input type="text" id="fecha_aterrizaje" name="fecha_aterrizaje" required>
            <br>
            <button type="submit">Agregar</button> 
            <br>
            <a href="vuelosadm.php" class="btn btn-danger">Cancelar</a>
            <br>
        </form>
    </div>
</body>
</html>