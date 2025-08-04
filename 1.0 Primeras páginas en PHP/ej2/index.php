<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lanzar un Dado</title>
</head>
<body>
    <h1>Lanzamiento de Dado</h1>
    <?php
        // Generar un número aleatorio entre 1 y 6
        $numeroAleatorio = rand(1, 6);
        echo "<p>Su número es: <strong>$numeroAleatorio</strong></p>";
    ?>
    <p><a href="index.php">Lanzar el dado de nuevo</a></p>
</body>
</html>