<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lanzar un Dado</title>
    <style>
        .color-cuadro {
            width: 100px;  
            height: 100px; 
            border: 1px solid #000; 
            margin-top: 10px; 
        }
    </style>
</head>
<body>
    <h1>Lanzamiento de Dado</h1>
    <?php
        // Generar tres números aleatorios entre 0 y 255
        $numero1 = rand(0, 255);
        $numero2 = rand(0, 255);
        $numero3 = rand(0, 255);

        echo "<p>Su color aleatorio es: <strong>RGB ($numero1, $numero2, $numero3)</strong></p>";
    ?>
    
    <!-- Cuadro de color con el color generado -->
    <div class="color-cuadro" style="background-color: rgb(<?php echo $numero1; ?>, <?php echo $numero2; ?>, <?php echo $numero3; ?>);"></div>

    <p><a href="index.php">Volver a sacar color</a></p>
</body>
</html>
