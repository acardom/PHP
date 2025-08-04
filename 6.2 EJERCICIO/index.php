<?php

// Incluir la biblioteca
require 'inventory_operations.php';

// Inventario actual, proveedores A y B
$inventario_actual = [
    ["producto" => "Teclado", "precio" => 20, "categoria" => "Electrónica", "cantidad" => 4],
    ["producto" => "Ratón", "precio" => 15, "categoria" => "Electrónica", "cantidad" => 10],
    ["producto" => "Monitor", "precio" => 100, "categoria" => "Electrónica", "cantidad" => 3],
    ["producto" => "Silla", "precio" => 80, "categoria" => "Muebles", "cantidad" => 5],
];

$proveedor_a = [
    ["producto" => "Ratón", "precio" => 10, "categoria" => "Electrónica", "cantidad" => 20],
    ["producto" => "Lámpara", "precio" => 25, "categoria" => "Iluminación", "cantidad" => 15],
    ["producto" => "Escritorio", "precio" => 50, "categoria" => "Muebles", "cantidad" => 2],
];

$proveedor_b = [
    ["producto" => "Monitor", "precio" => 92, "categoria" => "Electrónica", "cantidad" => 8],
    ["producto" => "Auriculares", "precio" => 30, "categoria" => "Electrónica", "cantidad" => 20],
    ["producto" => "Lámpara", "precio" => 20, "categoria" => "Iluminación", "cantidad" => 5],
];

// Comparar inventarios
$diferencias_proveedor_a = comparar_inventarios($inventario_actual, $proveedor_a);
$diferencias_proveedor_b = comparar_inventarios($inventario_actual, $proveedor_b);

// Unir inventarios
$inventario_unido = unir_inventarios($inventario_actual, $proveedor_a, $proveedor_b);

// Eliminar duplicados y calcular precio promedio
$resultadoProductosEliminados = eliminar_productos_duplicados($inventario_unido);

// Generar informe del inventario
$informe_inventario = generar_informe($resultadoProductosEliminados);

// Mostrar resultados
echo "<pre>Diferencias con Proveedor A: "; print_r($diferencias_proveedor_a); echo "</pre>";
echo "<pre>Diferencias con Proveedor B: "; print_r($diferencias_proveedor_b); echo "</pre>";
echo "<pre>Inventario Unido: "; print_r($inventario_unido); echo "</pre>";
echo "<pre>Inventario eliminando duplicados: "; print_r($resultadoProductosEliminados); echo "</pre>";
echo "<pre>Informe del Inventario: "; print_r($informe_inventario); echo "</pre>";

?>
