<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once "../controlador/PlanesControler.php";
require_once "LAYOUT/header.php";

// Verifica si se recibió el ID del plan
if (!isset($_GET['id'])) {
    header("Location: planesadm.php");
    exit();
}

$id = $_GET['id'];
$planes = PlanesControler::mostrarPlanes();
$plan = null;

// Busca el plan correspondiente al ID
foreach ($planes as $p) {
    if ($p['ID_Planes'] == $id) {
        $plan = $p;
        break;
    }
}

// Si no se encuentra el plan, redirige a la página principal
if (!$plan) {
    header("Location: planesadm.php");
    exit();
}

// Manejo del formulario de actualización
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $contenido = $_POST['contenido'];
    $precio = $_POST['precio'];
    $idVuelo = $_POST['id_vuelo'];
    $idHotel = $_POST['id_hotel'];
    $imagen = $_FILES['imagen']; // Recibe la nueva imagen (si hay)
    $fecha = $_POST['fecha'];  // La fecha recibida

    // Llama al controlador para actualizar el plan
    $resultado = PlanesControler::actualizarPlan($id, $nombre, $contenido, $precio, $fecha, $idVuelo, $idHotel, $imagen);

    if ($resultado) {
        header("Location: planesadm.php?mensaje=actualizado");
        exit();
    } else {
        echo "<p>Error al actualizar el plan.</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ACTUALIZAR PLANES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <style>
    .form-container {
        max-width: 600px;
        margin: auto;
        background-color: #ffffff;
        border: 1px solid #dee2e6;
    }

    .btn-primary {
        background-color: #007bff;
        border-color: #007bff;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #004085;
    }
</style>

</head>
<body>
    

    <div class="container mt-5">
    <div class="form-container shadow p-4 rounded bg-light">
        <h1 class="text-center mb-4 text-primary">Editar Plan</h1>

        <form action="ActualizarPlanes.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label"><strong>Nombre:</strong></label>
                <input type="text" name="nombre" class="form-control" value="<?= $plan['Nombre']; ?>" required />
            </div>

            <!-- Contenido del Lugar -->
            <div class="mb-3">
                <label for="contenido" class="form-label"><strong>Contenido del Lugar:</strong></label>
                <textarea name="contenido" class="form-control" rows="3" required><?= $plan['Contenido_Lugar']; ?></textarea>
            </div>

            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label"><strong>Precio:</strong></label>
                <input type="text" name="precio" class="form-control" value="<?= $plan['Precio']; ?>" required />
            </div>

            <!-- Fecha -->
            <div class="mb-3">
                <label for="fecha" class="form-label"><strong>Fecha:</strong></label>
                <input type="text" name="fecha" class="form-control" value="<?= $plan['Fecha']; ?>" required />
            </div>

            <!-- ID del Vuelo -->
            <div class="mb-3">
                <label for="id_vuelo" class="form-label"><strong>ID del Vuelo:</strong></label>
                <input type="number" name="id_vuelo" class="form-control" value="<?= $plan['ID_Vuelo']; ?>" required />
            </div>

            <!-- ID del Hotel -->
            <div class="mb-3">
                <label for="id_hotel" class="form-label"><strong>ID del Hotel:</strong></label>
                <input type="number" name="id_hotel" class="form-control" value="<?= $plan['ID_Hotel']; ?>" required />
            </div>

            <!-- Nueva Imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label"><strong>Nueva Imagen (opcional):</strong></label>
                <input type="file" name="imagen" class="form-control" accept="image/*" />
            </div>

            <!-- Botón de Actualizar -->
            <div class="text-center">
                <button type="submit" class="btn btn-primary btn-lg w-100 mt-3">Actualizar</button>
            </div>
        </form>
    </div>
</div>


    <?php require_once "LAYOUT/footer.php"; ?>
</body>
</html>