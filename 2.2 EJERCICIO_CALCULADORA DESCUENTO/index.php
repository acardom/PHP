<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        flex-direction: column;
    }

    h1 {
        margin-bottom: 20px;
    }

    form {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        width: 300px;
        text-align: left;
    }

    label {
        display: block;
        margin-bottom: 5px;
        font-weight: bold;
    }

    input[type="text"],
    input[type="number"] {
        width: calc(100% - 10px);
        padding: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 3px;
    }

    input[type="submit"] {
        background-color: #28a745;
        color: #fff;
        border: none;
        padding: 10px;
        border-radius: 5px;
        cursor: pointer;
        width: 100%;
        font-size: 16px;
    }

    input[type="submit"]:hover {
        background-color: #218838;
    }

    .resultado {
        background-color: #fff;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        margin-top: 20px;
        width: 300px;
        text-align: left;
    }

    .resultado h2 {
        margin-top: 0;
    }
</style>

<?php
// Inicializar variables para conservar los valores ingresados
$nombre_producto = "";
$cantidad = 0;
$precio_unitario = 0.0;

// Verificamos si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener valores desde el formulario
    $nombre_producto = $_POST['nombre_producto']; // Variable de tipo texto
    $cantidad = (int)$_POST['cantidad']; // Variable de tipo entero
    $precio_unitario = (float)$_POST['precio_unitario']; // Variable de tipo flotante
}

// Calcular Total Sin Descuento
$total_sin_descuento = $cantidad * $precio_unitario;

// Verificar si el total sin descuento supera los 50
if ($total_sin_descuento > 50) {
    // Sí, Se aplica un descuento del 10%
    $porcentaje_descuento = 0.10; 
} else {
    // No, No se aplica ningún descuento
    $porcentaje_descuento = 0;
}

// Calcular el descuento
$descuento = $total_sin_descuento * $porcentaje_descuento;
// Calcular Total con Descuento
$total_con_descuento = $total_sin_descuento - $descuento;
?>

<form method="post" action="">
    <label for="nombre_producto">Nombre del producto:</label>
    <input type="text" id="nombre_producto" name="nombre_producto" value="<?php echo htmlspecialchars($nombre_producto); ?>" required><br><br>

    <label for="cantidad">Cantidad:</label>
    <input type="number" id="cantidad" name="cantidad" min="1" value="<?php echo htmlspecialchars($cantidad); ?>" required><br><br>

    <label for="precio_unitario">Precio unitario (EUR):</label>
    <input type="number" id="precio_unitario" name="precio_unitario" step="0.01" value="<?php echo htmlspecialchars($precio_unitario); ?>" required><br><br>

    <input type="submit" value="Calcular">
</form>

<br>
<br>

<?php
// Mostrar Resumen de la Compra solo si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mostrar Resumen de la Compra
    echo "<u>Datos</u><br>";
    echo "Total sin descuento: " . number_format($total_sin_descuento, 2, ',', '.') . " EUR <br>";
    echo "Descuento aplicado: " . number_format($descuento, 2, ',', '.') . " EUR <br>";
    echo "Total con descuento: " . number_format($total_con_descuento, 2, ',', '.') . " EUR <br><br><br>";

    $resumen_compra = "<u>Resumen de la compra</u><br>" .
                      "Producto: " . htmlspecialchars($nombre_producto) . "<br>" .
                      "Cantidad: " . $cantidad . "<br>" .
                      "Precio unitario: " . number_format($precio_unitario, 2, ',', '.') . " EUR <br>" .
                      "Total sin descuento: " . number_format($total_sin_descuento, 2, ',', '.') . " EUR <br>" .
                      "Descuento: " . number_format($descuento, 2, ',', '.') . " EUR <br>" .
                      "Total a pagar: " . number_format($total_con_descuento, 2, ',', '.') . " EUR <br>";

    // Mostrar el resumen
    echo $resumen_compra;
    echo "<br><br><u>Diagnóstico</u>";

    // Verificar si el total sin descuento es mayor de 100
    if ($total_sin_descuento > 100) {
        // Mostrar Mensaje de Compra Grande
        echo "<br>¡Es una compra grande!<br>";
    } else {
        echo "<br>No es una compra grande.<br>";
    }
}
?>
