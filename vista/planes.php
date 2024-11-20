<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PLANES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    
</head>
<body>
<img src="IMG/imgbanner.png" height="40%" width="100%">  
<?php
require_once "../controlador/PlanesControler.php";
require_once "LAYOUT/header1.php";

$planes = PlanesControler::mostrarPlanes();
?>

<h1 class="text-center">Planes de Vuelo</h1>
<?php if (!empty($planes)) : ?>
    <div class="container">
    <div class="row">
        <?php foreach ($planes as $plan): ?>
            <div class="col-md-4 mb-4">
                <div class="card">
                    <!-- Imagen --> 
                    <?php if (!empty($plan['Imagen'])): ?>
                        <img src="IMG/<?= $plan['Imagen']; ?>" class="card-img-top" alt="<?= $plan['Nombre']; ?>" style="height: 200px; object-fit: cover;">
                    <?php else: ?>
                        <img src="IMG/default.png" class="card-img-top" alt="Sin imagen" style="height: 200px; object-fit: cover;">
                    <?php endif; ?>

                    <!-- Contenido -->
                    <div class="card-body">
                        <h5 class="card-title"><?= $plan['Nombre']; ?></h5>
                        <p class="card-text">
                            <strong>Contenido:</strong> <?= $plan['Contenido_Lugar']; ?><br>
                            <strong>Precio:</strong> $<?= number_format($plan['Precio'], 2); ?><br>
                            <strong>Fecha:</strong> <?= $plan['Fecha']; ?><br>
                            <strong>ID Vuelo:</strong> <?= $plan['ID_Vuelo']; ?><br>
                            <strong>ID Hotel:</strong> <?= $plan['ID_Hotel']; ?>
                        </p><center>
                        <a href="ActualizarPlanes.php?id=<?= $plan['ID_Planes']; ?>" class="btn btn-success btn-sm">Comprar</a></center>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<?php else: ?>
    <p class="text-center">No hay planes disponibles.</p>
<?php endif; ?>
<?php require_once "LAYOUT/footer1.php"; ?>
</body>