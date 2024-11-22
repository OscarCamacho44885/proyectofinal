<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
    <title>Lista De Vuelos Disponibles</title>
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
        }
        .container {
            width: 80%;
            margin: 20px auto;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        a {
            text-decoration: none;
            color: #007bff;
            font-weight: bold;
            margin-right: 10px;
        }
        a:hover {
            text-decoration: underline;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #007bff;
            color: white;
        }
        td {
            background-color: #f9f9f9;
        }
        .actions a {
            margin-right: 10px;
            color: #28a745;
        }
        .actions a.delete {
            color: #dc3545;
        }
        .actions a:hover {
            opacity: 0.7;
        }
        .actions a.delete:hover {
            color: #c82333;
        }
    </style>
</head>
<body>
<?php
require_once "../controlador/VuelosControler.php";
$vuelos = VuelosControler::mostrarVuelos();

?>

<img src="IMG/imgbanner.png" height="40%" width="100%">
<?php require_once "LAYOUT/header1.php"; ?>
    <h1>Lista De Vuelos Disponibles</h1>
    <div class="container">
        
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Destino</th>
                    <th>Precio</th>
                    <th>Fecha de Vuelo</th>
                    <th>Fecha de Aterrizaje</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($vuelos as $vuelo): ?>
                    <tr>
                        <td><?php echo $vuelo['ID_Vuelo']; ?></td>
                        <td><?php echo $vuelo['Destino']; ?></td>
                        <td>$<?php echo number_format($vuelo['Precio'], 2); ?></td>
                        <td><?php echo $vuelo['Fecha_Vuelo']; ?></td>
                        <td><?php echo $vuelo['Fecha_Aterrizaje']; ?></td>
                        <td class="actions">
                            <a href="?id=<?php echo $vuelo['ID_Vuelo']; ?>">Reservar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>