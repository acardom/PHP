
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $num_elementos = filter_input(INPUT_POST, 'num_elementos', FILTER_VALIDATE_INT);

    if ($num_elementos === false || $num_elementos < 1 || $num_elementos > 10) {
        echo "<h1>Error: el número debe estar entre 1 y 10.</h1>";
        echo '<a href="formulario.php">Volver al formulario inicial</a>';
        exit;
    }
} else {
    header('Location: formulario.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario - Página 2</title>
</head>
<body>
    <h1>Introduce los valores</h1>
    <form action="resultado.php" method="post">
        <?php for ($i = 0; $i < $num_elementos; $i++): ?>
            <label for="elemento_<?= $i ?>">Elemento <?= $i + 1 ?>:</label>
            <input type="text" name="elementos[]" id="elemento_<?= $i ?>" required><br>
        <?php endfor; ?>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
