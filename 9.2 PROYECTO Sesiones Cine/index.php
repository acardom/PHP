<?php
include 'funciones.php';
$peliculas = obtenerPeliculas();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cine - Películas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenido al Cine</h1>
        <h2>Películas Disponibles</h2>
        <ul>
            <?php foreach ($peliculas as $pelicula): ?>
                <li>
                    <a href="seleccion_pelicula.php?pelicula_id=<?php echo $pelicula['id']; ?>">
                        <?php echo $pelicula['titulo']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
