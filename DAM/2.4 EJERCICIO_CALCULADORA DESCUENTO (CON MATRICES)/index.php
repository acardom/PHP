<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Título de la Página</title>
    <link rel="stylesheet" href="style.css"> <!-- Si el CSS está en el mismo directorio -->
    <!-- o si está en una carpeta css -->
    <!-- <link rel="stylesheet" href="css/estilos.css"> -->
</head>
<body>

<?php
// Definir constantes
define('DESCUENTO_PEQUENO', 0.10);
define('LIMITE_DESCUENTO', 50);
define('LIMITE_COMPRA_GRANDE', 100);

// Inicializar variables
$nombre_producto = "";
$cantidad = 0;
$precio_unitario = 0.0;
$resumen_compra = ""; // Variable para el resumen de la compra

// Array de productos
$productos = [
    ["nombre" => "Patatas", "precio" => 4,5],
    ["nombre" => "Caracoles", "precio" => 12,3],
    ["nombre" => "Merluza", "precio" => 21,4]
];

// Verificamos si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $selected_product = $_POST['producto'];
    $cantidad = (int)$_POST['cantidad']; // Variable de tipo entero

    // Obtener el precio del producto seleccionado
    foreach ($productos as $producto) {
        if ($producto['nombre'] == $selected_product) {
            $nombre_producto = $producto['nombre'];
            $precio_unitario = (float)$producto['precio']; // Variable de tipo flotante
            break;
        }
    }

    // Calcular Total Sin Descuento
    $total_sin_descuento = $cantidad * $precio_unitario;

    // Verificar si el total sin descuento supera el límite de descuento
    $porcentaje_descuento = ($total_sin_descuento > LIMITE_DESCUENTO) ? DESCUENTO_PEQUENO : 0;

    // Calcular el descuento
    $descuento = $total_sin_descuento * $porcentaje_descuento;
    // Calcular Total con Descuento
    $total_con_descuento = $total_sin_descuento - $descuento;

    // Crear resumen de la compra
    $resumen_compra = "<u>Resumen de la compra</u>" . nl2br("\n") .
                      "Producto: " . htmlspecialchars($nombre_producto) .nl2br("\n").
                      "Cantidad: " . $cantidad . nl2br("\n") .
                      "Precio unitario: " . number_format($precio_unitario, 2, ',', '.') . " EUR" . nl2br("\n").
                      "Total sin descuento: " . number_format($total_sin_descuento, 2, ',', '.') . " EUR" . nl2br("\n").
                      "Descuento: " . number_format($descuento, 2, ',', '.') . " EUR" . nl2br("\n").
                      "Total a pagar: " . number_format($total_con_descuento, 2, ',', '.') . " EUR". nl2br("\n");
}

// Mostrar resultados solo si el formulario ha sido enviado
?>

<form method="post" action="">
    <label for="producto">Seleccione el producto:</label>
    <select id="producto" name="producto" required>
        <option value="" disabled selected>--Seleccione un producto--</option>
        <?php foreach ($productos as $producto): ?>
            <option value="<?php echo htmlspecialchars($producto['nombre']); ?>">
                <?php echo htmlspecialchars($producto['nombre']) . " (" . number_format($producto['precio'], 2, ',', '.') . " EUR)"; ?>
            </option>
        <?php endforeach; ?>
    </select>

    <label for="cantidad">Cantidad:</label>
    <input type="number" id="cantidad" name="cantidad" min="1" value="<?php echo htmlspecialchars($cantidad); ?>" required>

    <input type="submit" value="Calcular">
</form>

<br>

<?php
// Mostrar Resumen de la Compra solo si se envió el formulario
if (!empty($resumen_compra)) {
    echo $resumen_compra;
    echo "<br><br><u>Diagnóstico</u>";

    // Verificar si el total sin descuento es mayor de 100
    if ($cantidad * $precio_unitario > LIMITE_COMPRA_GRANDE) {
        echo "<br>¡Es una compra grande!".nl2br("\n\n");
    } else {
        echo "<br>No es una compra grande.".nl2br("\n\n");
    }
}
?>

</body>
</html>