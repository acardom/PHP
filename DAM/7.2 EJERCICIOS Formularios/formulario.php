
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Formulario - Página 1</title>
</head>
<body>
    <h1>Introduce un número de elementos</h1>
    <form action="formulario2.php" method="post">
        <label for="num_elementos">Número de elementos (entre 1 y 10):</label>
        <input type="number" name="num_elementos" id="num_elementos" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
