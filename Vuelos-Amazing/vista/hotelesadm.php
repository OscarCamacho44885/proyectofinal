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
<img src="IMG/imgbanner.png" height="40%" width="100%">
<?php
require_once "../controlador/HotelesControler.php";
require_once "LAYOUT/header.php";

$hoteles = HotelesControler::mostrarHoteles();
?>
<br>
<br>
<h1 class="text-center">Hoteles Del Mundo</h1>
<br>
<br>
<div class="mb-3">
    <a href="AgregarHoteles.php" class="btn btn-success">Agregar Nuevo Hotel</a>
</div>
<br>
<?php if (!empty($hoteles)) : ?>
    <div class="container">
    <div class="row">
        <?php foreach ($hoteles as $hotel): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- Imagen --> 
                    <?php if (!empty($hotel['Imagen'])): ?>
                        <img src="IMG/<?= $hotel['Imagen']; ?>" class="card-img-top" alt="<?= $hotel['Nombre_Hotel']; ?>" style="height: 200px; object-fit: cover;">
                    <?php else: ?>
                        <img src="IMG/default.png" class="card-img-top" alt="Sin imagen" style="height: 200px; object-fit: cover;">
                    <?php endif; ?>

                    <!-- Contenido -->
                    <div class="card-body">
                        <h5 class="card-title"><?= $hotel['Nombre_Hotel']; ?></h5>
                        <p class="card-text">
                        <strong>Precio:</strong> $<?= number_format($hotel['Precio'], 2); ?><br>
                        <strong>Lugar:</strong> <?= $hotel['Lugar']; ?><br>
                        <strong>Tiempo de Estadía:</strong> <?= $hotel['Tiempo_estadia']; ?><br>   
                        </p>
                        <a href="ActualizarHoteles.php?id=<?= $hotel['ID_Hotel']; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="EliminarHoteles.php?id=<?= $hotel['ID_Hotel']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro de eliminar este Hotel?');">Eliminar</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php else: ?>
    <p class="text-center">No hay Hoteles disponibles.</p>
<?php endif; ?>

<?php require_once "LAYOUT/footer.php"; ?>
</body>
</html>