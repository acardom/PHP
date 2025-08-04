<?php
include 'funciones.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $asientos = $_POST['asientos'];
    $_SESSION['asientos'] = $asientos;

    $total = calcularTotal($asientos);
    $_SESSION['total'] = $total;
}

// Verificar que haya datos de película, sesión y asientos
if (!isset($_SESSION['pelicula_id']) || !isset($_SESSION['sesion_id']) || !isset($_SESSION['asientos'])) {
    header('Location: index.php');  // Redirigir al inicio si no se han completado los pasos
    exit;
}


if (isset($_SESSION['pago_realizado']) && $_SESSION['pago_realizado']) {
    header('Location: descargar_entradas.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Pago</title>
    <script>
        setTimeout(function() {
            alert('Tiempo agotado para realizar el pago.');
            window.location.href = 'index.php';
        }, 20000); // 1 minuto
    </script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Resumen de la Compra</h1>
        <p>Película: <?php echo obtenerTituloPelicula($_SESSION['pelicula_id']); ?></p>
        <p>Sesión: <?php echo obtenerHoraSesion($_SESSION['sesion_id']); ?></p>
        <p>Asientos: <?php echo implode(', ', $_SESSION['asientos']); ?></p>
        <p>Total: <?php echo $_SESSION['total']; ?>€</p>
        <form action="procesar_pago.php" method="post">
            <input type="submit" value="Pagar">
        </form>
    </div>
</body>
</html>
