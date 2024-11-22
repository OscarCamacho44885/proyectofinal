
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR HOTELES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../controlador/PlanesControler.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $contenido = $_POST['contenido'];
    $precio = $_POST['precio'];
    $fecha = $_POST['fecha'];
    $idVuelo = $_POST['id_vuelo'];
    $idHotel = $_POST['id_hotel'];
    $imagen = $_FILES['imagen'];

    $resultado = PlanesControler::insertarPlan($nombre, $contenido, $precio, $fecha, $idVuelo, $idHotel, $imagen);

    if ($resultado) {
        header("Location: planesadm.php?mensaje=agregado");
    } else {
        echo "<p>Error al agregar el plan.</p>";
    }
}
?>




<h1 class="text-center my-5">Agregar Nuevo Plan</h1>
<form method="POST" action="AgregarPlanes.php" enctype="multipart/form-data">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="mb-4">
                    <label for="nombre" class="form-label">Nombre del Plan</label>
                    <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" required>
                </div>

                <div class="mb-4">
                    <label for="contenido" class="form-label">Contenido</label>
                    <textarea class="form-control form-control-lg" id="contenido" name="contenido" rows="4" required></textarea>
                </div>

                <div class="mb-4">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control form-control-lg" id="precio" name="precio" step="0.01" required>
                </div>

                <div class="mb-4">
                    <label for="fecha" class="form-label">Fecha</label>
                    <input type="text" class="form-control form-control-lg" id="fecha" name="fecha" required>
                </div>

                <div class="mb-4">
                    <label for="id_vuelo" class="form-label">ID del Vuelo</label>
                    <input type="number" class="form-control form-control-lg" id="id_vuelo" name="id_vuelo" required>
                </div>

                <div class="mb-4">
                    <label for="id_hotel" class="form-label">ID del Hotel</label>
                    <input type="number" class="form-control form-control-lg" id="id_hotel" name="id_hotel" required>
                </div>

                <div class="mb-4">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control form-control-lg" id="imagen" name="imagen" accept="image/*" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-success btn-lg">Agregar Plan</button>
                    <a href="vuelosadm.php" class="btn btn-danger btn-lg">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</form>


<?php require_once "LAYOUT/footer.php"; ?>
</body>