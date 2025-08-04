<?php 

$estacionesMetroMadrid = [
    'Línea 1' => [
        ['estacion' => 'Sol', 'intercambiador' => true],
        ['estacion' => 'Gran Vía', 'intercambiador' => false],
        ['estacion' => 'Tribunal', 'intercambiador' => false],
    ],
    'Línea 2' => [
        ['estacion' => 'Cuatro Caminos', 'intercambiador' => true],
        ['estacion' => 'La Elipa', 'intercambiador' => false],
        ['estacion' => 'Ventas', 'intercambiador' => false],
    ],
    'Línea 3' => [
        ['estacion' => 'Villaverde Alto', 'intercambiador' => false],
        ['estacion' => 'Sierra de Guadalupe', 'intercambiador' => true],
        ['estacion' => 'Emilia Pardo Bazán', 'intercambiador' => false],
    ],
    'Línea 10' => [
        ['estacion' => 'Nuevos Ministerios', 'intercambiador' => true],
        ['estacion' => 'Chamartín', 'intercambiador' => true],
        ['estacion' => 'Berruguete', 'intercambiador' => false],
    ]
];

echo "<h1>Añadir un nuevo intercambiador y mostrar la matriz</h1>";

// Añadir el nuevo intercambiador a todas las estaciones sin usar &
foreach ($estacionesMetroMadrid as $linea => $datos) { 
    foreach ($datos as $index => $estacion) { 
        $estacionesMetroMadrid[$linea][$index]['intercambiador2'] = true; 
    }
}

foreach ($estacionesMetroMadrid as $linea => $datos) {
    echo "<h2>$linea</h2>";
    echo "<ul>";
    foreach ($datos as $estacion) {
        echo "<li>Estación: {$estacion['estacion']} - Intercambiador1: ";
        echo $estacion['intercambiador'] ? "Sí" : "No";
        echo " - Intercambiador2: ";
        echo $estacion['intercambiador2'] ? "Sí" : "No";
        echo "</li>";
    }
    echo "</ul>";
}

?>
