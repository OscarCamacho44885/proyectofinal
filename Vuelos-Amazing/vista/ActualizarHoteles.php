<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR HOTELES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>

<?php require_once "LAYOUT/header.php"; ?>
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once "../controlador/HotelesControler.php";

// Verifica si se recibió el ID del hotel
if (!isset($_GET['id'])) {
    header("Location: hotelesadm.php");
    exit();
}

$id = $_GET['id'];
$hoteles = HotelesControler::mostrarHoteles();
$hotel = null;

// Busca el hotel correspondiente al ID
foreach ($hoteles as $h) {
    if ($h['ID_Hotel'] == $id) {
        $hotel = $h;
        break;
    }
}

// Si no se encuentra el hotel, redirige a la página principal
if (!$hotel) {
    header("Location: hotelesadm.php");
    exit();
}

// Manejo del formulario de actualización
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $lugar = $_POST['lugar'];
    $precio = $_POST['precio'];
    $tiempo = $_POST['tiempo'];
    $imagen = $_FILES['imagen']; // Recibe la nueva imagen (si hay)

    // Llama al controlador para actualizar el hotel
    $resultado = HotelesControler::actualizarHotel($id, $nombre, $lugar, $precio, $tiempo, $imagen);

    if ($resultado) {
        header("Location: hotelesadm.php?mensaje=actualizado");
        exit();
    } else {
        echo "<p>Error al actualizar el hotel.</p>";
    }
}
?>

<div class="container mt-5">
    <div class="form-container">
        <h2 class="text-center mb-4"><b>- Actualizar Información del Hotel -</b></h2>
        <form action="ActualizarHoteles.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
            
            <!-- Nombre del Hotel -->
            <div class="mb-4">
                <label for="nombre" class="form-label"><b>Nombre del Hotel</b></label>
                <input type="text" name="nombre" class="form-control form-control-lg" id="nombre" value="<?= $hotel['Nombre_Hotel']; ?>" required />
            </div>

            <!-- Lugar -->
            <div class="mb-4">
                <label for="lugar" class="form-label"><b>Lugar</b></label>
                <input type="text" name="lugar" class="form-control form-control-lg" id="lugar" value="<?= $hotel['Lugar']; ?>" required />
            </div>

            <!-- Precio -->
            <div class="mb-4">
                <label for="precio" class="form-label"><b>Precio</b></label>
                <input type="text" name="precio" class="form-control form-control-lg" id="precio" value="<?= $hotel['Precio']; ?>" required />
            </div>

            <!-- Tiempo de Estadía -->
            <div class="mb-4">
                <label for="tiempo" class="form-label"><b>Tiempo de Estadía</b></label>
                <input type="text" name="tiempo" class="form-control form-control-lg" id="tiempo" value="<?= $hotel['Tiempo_estadia']; ?>" required />
            </div>

            <!-- Nueva Imagen (opcional) -->
            <div class="mb-4">
                <label for="imagen" class="form-label"><b>Nueva Imagen (opcional)</b></label>
                <input type="file" name="imagen" class="form-control form-control-lg" accept="image/*" />
            </div>

            <!-- Botón de Actualizar -->
            <div class="text-center">
                <button type="submit" class="btn btn-success btn-lg"><b>Actualizar</b></button>
            </div>
        </form>
    </div>
</div>



            

<?php require_once "LAYOUT/footer.php"; ?>


</body>
</html>