<?php
include 'funciones.php';

// Verificar si se ha pasado el ID de la película
if (!isset($_GET['pelicula_id'])) {
    header('Location: index.php');  // Redirigir al inicio si no se ha seleccionado una película
    exit;
}

$pelicula_id = $_GET['pelicula_id'];
$sesiones = obtenerSesiones($pelicula_id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Selección de Sesión</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Selecciona una Sesión</h1>
        <ul>
            <?php foreach ($sesiones as $sesion): ?>
                <li>
                    <a href="seleccion_asientos.php?pelicula_id=<?php echo $pelicula_id; ?>&sesion_id=<?php echo $sesion['id']; ?>">
                        <?php echo $sesion['hora']; ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    </div>
</body>
</html>
