<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Emoticono Aleatorio</title>
    <style>
        .emoticono {
            font-size: 80px; 
        }
        .letra {
            font-size: 40px;
        }
    </style>
</head>
<body>
    <h1>Emoticono Aleatorio</h1>
    <?php
        // Generar un número aleatorio entre 128512 y 128586
        $codigoEmoticono = rand(128512, 128586);
        
        // Mostrar el emoticono correspondiente
        echo "<p class='letra'>Tu emoticono aleatorio es: <strong class='emoticono'>&#{$codigoEmoticono};</strong></p>";
    ?>
    <p><a href="emoticono.php">Generar otro emoticono</a></p>
</body>
</html>
