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
require_once "../controlador/HotelesControler.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $lugar = $_POST['lugar'];
    $precio = $_POST['precio'];
    $tiempo = $_POST['tiempo'];
    $imagen = $_FILES['imagen'];

    // Llama al controlador para insertar el nuevo hotel
    $resultado = HotelesControler::insertarHotel($nombre, $lugar, $precio, $tiempo, $imagen);

    if ($resultado) {
        header("Location: hotelesadm.php?mensaje=agregado");
    } else {
        echo "<p>Error al agregar el hotel.</p>";
    }
}
?>

<h1 class="text-center my-5">Agregar Nuevo Hotel</h1>
<form method="POST" action="AgregarHoteles.php" enctype="multipart/form-data">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="mb-4">
                    <label for="nombre" class="form-label">Nombre del Hotel</label>
                    <input type="text" class="form-control form-control-lg" id="nombre" name="nombre" required>
                </div>

                <div class="mb-4">
                    <label for="lugar" class="form-label">Lugar</label>
                    <input type="text" class="form-control form-control-lg" id="lugar" name="lugar" required>
                </div>

                <div class="mb-4">
                    <label for="precio" class="form-label">Precio</label>
                    <input type="number" class="form-control form-control-lg" id="precio" name="precio" step="0.01" required>
                </div>

                <div class="mb-4">
                    <label for="tiempo" class="form-label">Tiempo de Estadía</label>
                    <input type="text" class="form-control form-control-lg" id="tiempo" name="tiempo" required>
                </div>

                <div class="mb-4">
                    <label for="imagen" class="form-label">Imagen</label>
                    <input type="file" class="form-control form-control-lg" id="imagen" name="imagen" accept="image/*" required>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <button type="submit" class="btn btn-success btn-lg">Agregar Hotel</button>
                    <a href="hotelesadm.php" class="btn btn-danger btn-lg">Cancelar</a>
                </div>
            </div>
        </div>
    </div>
</form>

<?php require_once "LAYOUT/footer.php"; ?>
</body>