<?php
session_start(); // Iniciar sesión

// Productos de ejemplo
include('productos.php');

// Verificar si el stock inicial ya existe en la sesión
if (!isset($_SESSION['stock_inicial'])) {
    $_SESSION['stock_inicial'] = $productos; // Guardar el stock inicial en la sesión
}

// Verificar si el carrito ya existe en la sesión
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array(); // Crear un array vacío para el carrito si no existe
}

// Si se ha añadido un producto al carrito
if (isset($_POST['agregar'])) {
    $idProducto = (int)$_POST['agregar']; // Asegurarse de que el ID sea un entero

    // Verificar si hay suficiente stock del producto
    if (isset($_SESSION['stock_inicial'][$idProducto])) {
        $stockDisponible = $_SESSION['stock_inicial'][$idProducto]['stock'];

        // Verificar si el producto ya está en el carrito
        if (isset($_SESSION['carrito'][$idProducto])) {
            $cantidadEnCarrito = $_SESSION['carrito'][$idProducto];
        } else {
            $cantidadEnCarrito = 0;
        }

        // Verificar si hay suficiente stock para agregar el producto al carrito
        if ($cantidadEnCarrito = $stockDisponible) {
            // Si el producto ya está en el carrito, incrementar su cantidad
            if (isset($_SESSION['carrito'][$idProducto])) {
                $_SESSION['carrito'][$idProducto]++;
            } else {
                // Si el producto no está en el carrito, agregarlo con cantidad 1
                $_SESSION['carrito'][$idProducto] = 1;
            }

            // Reducir el stock del producto en la sesión
            $_SESSION['stock_inicial'][$idProducto]['stock']--;

            // Obtener el nombre del producto agregado
            $productoAgregado = $_SESSION['stock_inicial'][$idProducto]['nombre'];
            echo "<p>El producto '$productoAgregado' ha sido añadido al carrito.</p>";
        } else {
            // Mostrar mensaje si no hay suficiente stock
            echo "<p>No hay suficiente stock del producto.</p>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 12px;
        }
        .producto {
            border: 1px solid #ccc;
            padding: 10px;
            margin: 10px;
            width: 180px;
            display: inline-block;
            vertical-align: top;
        }
        .producto h3 {
            font-size: 14px;
            margin: 0 0 10px 0;
        }
        .producto p {
            margin: 5px 0;
        }
        .producto button {
            padding: 5px 10px;
            font-size: 12px;
        }
    </style>
</head>
<body>
    <h1>Productos Disponibles</h1>

    <div>
        <?php foreach ($_SESSION['stock_inicial'] as $id => $producto): ?>
            <div class="producto">
                <h3><?php echo $producto['nombre']; ?></h3>
                <p>Precio: $<?php echo $producto['precio']; ?></p>
                <p>Stock: <?php echo $producto['stock']; ?></p>
                <form method="post" action="index.php">
                    <button type="submit" name="agregar" value="<?php echo $id; ?>">Añadir al carrito</button>
                </form>
            </div>
        <?php endforeach; ?>
    </div>

    <br>
    <a href="carro.php">Ver mi carrito</a>
    <br>
    <a href="cerrar.php">cerrar sesion</a>
</body>
</html>
