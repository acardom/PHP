<?php

// Función para comparar inventarios con proveedores
function comparar_inventarios($inventario_actual, $proveedor) {
    $productos_actual = array_column($inventario_actual, 'producto');
    $productos_proveedor = array_column($proveedor, 'producto');
    return array_diff($productos_actual, $productos_proveedor);
}

// Función para unir inventarios
function unir_inventarios($inventario_actual, $proveedor_a, $proveedor_b) {
    return array_merge($inventario_actual, $proveedor_a, $proveedor_b);
}

// Función para eliminar productos duplicados y calcular precio promedio
function eliminar_productos_duplicados($inventario_unido) {
    $resultadoProductosEliminados = [];
    foreach ($inventario_unido as $item) {
        $clave = $item['producto'] . '|' . $item['categoria'];
        if (!isset($resultadoProductosEliminados[$clave])) {
            $resultadoProductosEliminados[$clave] = [
                'producto' => $item['producto'],
                'categoria' => $item['categoria'],
                'total_precio' => 0,
                'total_cantidad' => 0,
            ];
        }
        $resultadoProductosEliminados[$clave]['total_precio'] += $item['precio'] * $item['cantidad'];
        $resultadoProductosEliminados[$clave]['total_cantidad'] += $item['cantidad'];
    }
    foreach ($resultadoProductosEliminados as $clave => $datos) {
        $resultadoProductosEliminados[$clave]['precio_promedio'] = $datos['total_precio'] / $datos['total_cantidad'];
        unset($resultadoProductosEliminados[$clave]['total_precio']);
    }
    return array_values($resultadoProductosEliminados);
}

// Función para generar informe del inventario
function generar_informe($resultadoProductosEliminados) {
    $informe_inventario = [];
    foreach ($resultadoProductosEliminados as $item) {
        $informe_inventario[$item['producto']] = [
            "precio" => $item['precio_promedio'],
            "cantidad" => $item['total_cantidad'],
            "categoria" => $item['categoria'],
        ];
    }
    return $informe_inventario;
}

?>
