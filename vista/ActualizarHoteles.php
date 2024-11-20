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
<img src="IMG/imgbanner.png" height="40%" width="100%">   
<?php require_once "LAYOUT/header.php"; ?>
<?php
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



<h1 class="text-center">Editar Hotel</h1>

<form action="ActualizarHoteles.php?id=<?= $id ?>" method="POST" enctype="multipart/form-data">
    <label for="nombre">Nombre:</label>
    <input type="text" name="nombre" value="<?= $hotel['Nombre_Hotel']; ?>" required /><br>

    <label for="lugar">Lugar:</label>
    <input type="text" name="lugar" value="<?= $hotel['Lugar']; ?>" required /><br>

    <label for="precio">Precio:</label>
    <input type="text" name="precio" value="<?= $hotel['Precio']; ?>" required /><br>

    <label for="tiempo">Tiempo de Estadía:</label>
    <input type="text" name="tiempo" value="<?= $hotel['Tiempo_estadia']; ?>" required /><br>

    <label for="imagen">Nueva Imagen (si deseas cambiarla):</label>
    <input type="file" name="imagen" accept="image/*" /><br>

    <button type="submit">Actualizar</button>
</form>

<?php require_once "LAYOUT/footer.php"; ?>


</body>
</html>