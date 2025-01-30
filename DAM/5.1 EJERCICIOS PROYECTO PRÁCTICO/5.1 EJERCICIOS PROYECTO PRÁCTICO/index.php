<?php 

$Inventarios = [
    'Actual' => [
        ['producto' => 'Teclado', 'precio' => 20, 'categoria' => 'electroníca', 'cantidad' => 4],
        ['producto' => 'Ratón', 'precio' => 15, 'categoria' => 'electroníca', 'cantidad' => 10],
        ['producto' => 'Monitor', 'precio' => 100, 'categoria' => 'electroníca', 'cantidad' => 3],
        ['producto' => 'Silla', 'precio' => 80, 'categoria' => 'Muebles', 'cantidad' => 5]
    ],

    'Proveedor_A' => [
        ['producto' => 'Ratón', 'precio' => 10, 'categoria' => 'Electrónica', 'cantidad' => 20],
        ['producto' => 'Lámpara', 'precio' => 25, 'categoria' => 'Iluminación', 'cantidad' => 15],
        ['producto' => 'Escritorio', 'precio' => 50, 'categoria' => 'Muebles', 'cantidad' => 2]
    ],

    'Proveedor_B' => [
        ['producto' => 'Monitor', 'precio' => 92, 'categoria' => 'Electrónica', 'cantidad' => 8],
        ['producto' => 'Auriculares', 'precio' => 30, 'categoria' => 'Electrónica', 'cantidad' => 20],
        ['producto' => 'Lámpara', 'precio' => 20, 'categoria' => 'Iluminación', 'cantidad' => 5]
    ],
];


// Comparar inventarios de diferentes proveedores.
echo "<h2>1. Comparar inventarios de diferentes proveedores.</h2>";
// Extraer nombres de productos
$actualProductos = array_column($Inventarios['Actual'], 'producto');
$proveedorAProductos = array_column($Inventarios['Proveedor_A'], 'producto');
$proveedorBProductos = array_column($Inventarios['Proveedor_B'], 'producto');
// Usar array_diff para comparar
$productosUnicos = array_diff($actualProductos, $proveedorAProductos, $proveedorBProductos);
// Mostrar resultados
echo "<h2>Productos únicos en el inventario actual:</h2>";
foreach ($productosUnicos as $producto) {
    echo "Producto: $producto<br>";
}



// Unir y organizar las listas de productos.
echo "<h2>2. Unir y organizar las listas de productos.</h2>";
//unims todos
$UnirInventarios = array_merge($Inventarios['Actual'], $Inventarios['Proveedor_A'], $Inventarios['Proveedor_B']);
//los recorremos para mostrar
foreach ($UnirInventarios as $def => $datos) {
    foreach ($datos as $defi => $value) {
        echo "$defi  -  $value ".nl2br("\n");
    }
    echo nl2br("\n");
}



echo "<h2>3. Eliminar productos duplicados.</h2>";
// Extraer los nombres de los productos de cada inventario
$actualProductos = array_column($Inventarios['Actual'], 'producto');
$proveedorAProductos = array_column($Inventarios['Proveedor_A'], 'producto');
$proveedorBProductos = array_column($Inventarios['Proveedor_B'], 'producto');
// Unir todos los productos en un solo array
$productosUnidos = array_merge($actualProductos, $proveedorAProductos, $proveedorBProductos);
// Eliminar productos duplicados
$productosUnicos = array_unique($productosUnidos);
// Mostrar los productos únicos
echo "<h3>Productos únicos:</h3>";
foreach ($productosUnicos as $producto) {
    echo "$producto<br>";
}



echo "<h2>4.Conteo de productos por categoría</h2>";
// Extraer las categorías de los productos
$categorias = [];
// Recorremos todos los inventarios para extraer las categorías
foreach ($Inventarios as $inventario) {
    foreach ($inventario as $producto) {
        $categorias[] = $producto['categoria']; // Guardamos solo las categorías
    }
}
// Usamos array_count_values para contar cuántos productos hay por categoría
$conteoCategorias = array_count_values($categorias);
// Mostrar el conteo de productos por categoría
echo "<h3>Productos por categoría:</h3>";
foreach ($conteoCategorias as $categoria => $cantidad) {
    echo "Categoría: $categoria - Cantidad de productos: $cantidad<br>";
}   



echo "<h2>5. Ordenar los productos por precio..</h2>";
$UnirInventarios = array_merge($Inventarios['Actual'], $Inventarios['Proveedor_A'], $Inventarios['Proveedor_B']);
// Ordenar por precio (de menor a mayor)
usort($UnirInventarios, function($a, $b) {
    return $b['precio'] <=> $a['precio']; // Comparación de precios de mayor a menor de $b a $a cambiandolos de lugar daria de menos a mayor
});
// Mostrar los productos ordenados
foreach ($UnirInventarios as $producto) {
    echo "Producto: {$producto['producto']} - Precio: {$producto['precio']} - Categoría: {$producto['categoria']} - Cantidad: {$producto['cantidad']}<br>";
}


echo "<h2>6. Dividir el inventario de la tienda en secciones de 2 elementos cada uno.</h2>";
// Función para dividir un array en secciones de 2 elementos
function dividirInventario($inventario, $tamaño) {
    $dividido = array_chunk($inventario, $tamaño);
    return $dividido;
}
$divididoInventario = dividirInventario($UnirInventarios, 2);
// Mostrar el inventario dividido
foreach ($divididoInventario as $seccion) {
    foreach ($seccion as $producto) {
        echo "Producto: {$producto['producto']} - Precio: {$producto['precio']} - Categoría: {$producto['categoria']} - Cantidad: {$producto['cantidad']}<br>";
    }
    echo "<br>";
}



echo "<h2>7. Buscar y contar elementos en el inventario (por nombre)</h2>";
$productoBuscado = 'Ratón'; // Producto a buscar
$encontrado = 0; // Contador de coincidencias
foreach ($UnirInventarios as $producto) {
    if (strtolower($producto['producto']) === strtolower($productoBuscado)) {
        $encontrado++;
    }
}
echo "El producto '$productoBuscado' se encontró $encontrado veces en el inventario.<br>";



echo "<h2>8. Reindexar inventario y mostrar los nuevos índices.</h2>";
// Reindexamos el inventario después de haber hecho operaciones como un merge o eliminación
$inventarioReindexado = array_values($UnirInventarios);
// Mostrar los productos con los nuevos índices
foreach ($inventarioReindexado as $indice => $producto) {
    echo "Índice: $indice - Producto: {$producto['producto']} - Precio: {$producto['precio']} - Categoría: {$producto['categoria']} - Cantidad: {$producto['cantidad']}<br>";
}



echo "<h2>9. Dividir el inventario en secciones más manejables (3 elementos por sección).</h2>";
$divididoInventario3 = dividirInventario($UnirInventarios, 3);
// Mostrar las secciones
foreach ($divididoInventario3 as $seccion) {
    foreach ($seccion as $producto) {
        echo "Producto: {$producto['producto']} - Precio: {$producto['precio']} - Categoría: {$producto['categoria']} - Cantidad: {$producto['cantidad']}<br>";
    }
    echo "<br>";
}




echo "<h2>10. Informe estadístico del inventario actual.</h2>";
$totalValorInventario = 0;
$totalCantidadProductos = 0;
echo "<h3>Informe del inventario:</h3>";
foreach ($Inventarios['Actual'] as $producto) {
    $valorProducto = $producto['precio'] * $producto['cantidad'];
    $totalValorInventario += $valorProducto;
    $totalCantidadProductos += $producto['cantidad'];
    echo "Producto: {$producto['producto']} - Precio: {$producto['precio']} - Cantidad: {$producto['cantidad']} - Valor total: $valorProducto<br>";
}
echo "<h3>Resumen:</h3>";
echo "Total de productos en el inventario actual: $totalCantidadProductos<br>";
echo "Valor total del inventario actual: $totalValorInventario<br>";





?>