<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Matriz - Página 2</title>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $tamano_matriz = filter_input(INPUT_POST, 'tamano_matriz', FILTER_VALIDATE_INT);

        if ($tamano_matriz === false || $tamano_matriz < 1 || $tamano_matriz > 10) {
            echo "<h1>Error: el tamaño debe estar entre 1 y 10.</h1>";
            echo '<a href="matriz1.php">Volver al formulario inicial</a>';
            exit;
        }
    } else {
        header('Location: matriz1.php');
        exit;
    }
    ?>
    <h1>Rellena la matriz</h1>
    <form action="resultadoMatriz.php" method="post">
        <!-- Guardar tamaño de la matriz como campo oculto -->
        <input type="hidden" name="tamano_matriz" value="<?= $tamano_matriz ?>">
        <table>
            <?php for ($i = 0; $i < $tamano_matriz; $i++): ?>
                <tr>
                    <?php for ($j = 0; $j < $tamano_matriz; $j++): ?>
                        <td>
                            <input type="text" name="matriz[<?= $i ?>][<?= $j ?>]" required>
                        </td>
                    <?php endfor; ?>
                </tr>
            <?php endfor; ?>
        </table>
        <!-- Selección de fila inicial -->
        <label for="fila">Fila inicial:</label>
        <select name="fila">
            <?php for ($i = 0; $i < $tamano_matriz; $i++): ?>
                <option value="<?= $i ?>">Fila <?= $i + 1 ?></option>
            <?php endfor; ?>
        </select>
        <!-- Selección de columna inicial -->
        <label for="columna">Columna inicial:</label>
        <select name="columna">
            <?php for ($j = 0; $j < $tamano_matriz; $j++): ?>
                <option value="<?= $j ?>">Columna <?= $j + 1 ?></option>
            <?php endfor; ?>
        </select>
        <!-- Selección de dirección -->
        <label for="direccion">Dirección:</label>
        <select name="direccion">
            <option value="arriba">Arriba</option>
            <option value="abajo">Abajo</option>
            <option value="izquierda">Izquierda</option>
            <option value="derecha">Derecha</option>
            <option value="arriba_izquierda">Arriba e izquierda</option>
            <option value="arriba_derecha">Arriba y derecha</option>
            <option value="abajo_izquierda">Abajo e izquierda</option>
            <option value="abajo_derecha">Abajo y derecha</option>
        </select>
        <button type="submit">Enviar</button>
    </form>
</body>
</html>
