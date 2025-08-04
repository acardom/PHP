<?php
session_start(); // Iniciar sesión



// Verificar si hay productos en el carrito
if (!isset($_SESSION['carrito']) || empty($_SESSION['carrito'])) {
    echo "<p>Tu carrito está vacío.</p>";
} else {
    // Productos disponibles (simulados)
    include('productos.php');
    // Mostrar productos del carrito
    $total = 0;
    echo "<h1>Carrito de Compras</h1><ul>";

    // Recorrer el carrito (ahora almacena el ID del producto y la cantidad)
    foreach ($_SESSION['carrito'] as $idProducto => $cantidad) {
        if (isset($productos[$idProducto])) {
            $producto = $productos[$idProducto];
            $subtotal = $producto['precio'] * $cantidad;
            echo "<li>{$producto['nombre']} - $ {$producto['precio']} x $cantidad = $ $subtotal</li>";
            $total += $subtotal;
        } 
    }
    echo "</ul>";
    echo "<p>Total: $ {$total}</p>";
}
?>

<br>
<a href="index.php">Seguir comprando</a>
