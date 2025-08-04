<?php
include 'funciones.php';

if (!isset($_SESSION['pago_realizado']) || !$_SESSION['pago_realizado']) {
    header('Location: index.php');
    exit;
}

session_unset();
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Descargar Entradas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Entradas Generadas</h1>
        <p>Las entradas han sido generadas correctamente.</p>
        <a href="entradas.txt" download>
            <button>Descargar Entradas</button>
        </a>
        <br><br>
        <a href="index.php">
            <button>Volver al Inicio</button>
        </a>
    </div>
</body>
</html>
