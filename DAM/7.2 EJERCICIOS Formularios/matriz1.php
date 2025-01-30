<!-- matriz1.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Matriz - Página 1</title>
</head>
<body>
    <h1>Introduce el tamaño de la matriz</h1>
    <form action="matriz2.php" method="post">
        <label for="tamano_matriz">Tamaño de la matriz (entre 1 y 10):</label>
        <input type="number" name="tamano_matriz" id="tamano_matriz" required>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
