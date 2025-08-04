<?php
// Definimos una variable de tipo flotante
$precio_producto = 19.99;

// Realizamos una operación: calculamos el total con un impuesto del 21%
$impuesto = 0.21;
$total_con_impuesto = $precio_producto * (1 + $impuesto);

// Imprimimos el resultado
echo "El precio total con impuesto es: " . $total_con_impuesto;
?>
