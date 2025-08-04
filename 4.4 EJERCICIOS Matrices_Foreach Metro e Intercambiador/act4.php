<!DOCTYPE html>
<html>
<head>
    <title>Buscar estacion</title>
</head>
<body>
<h1>Mostrar todas las estaciones con su estado de intercambiador</h1>
<form method="POST" action="">
    <label for="buscar">Buscar estacion:</label>
    <input type="text" id="buscar" name="buscar">
    <button type="submit">Buscar</button>
</form>

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
        ['estacion' => 'Nuevo Ministerios', 'intercambiador' => true],
        ['estacion' => 'Chamartín', 'intercambiador' => true],
        ['estacion' => 'Berruguete', 'intercambiador' => false],
    ]
];


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $buscar = trim($_POST['buscar']);
    
    // Si el campo de búsqueda está vacío, no mostrar nada
    if (empty($buscar)) {
        echo "<p>Campo de búsqueda vacío.</p>";
    } else {
        $encontrado = false;
        
        echo "<br/>";

        // Convertir la búsqueda a minúsculas para hacerla insensible a mayúsculas
        $buscar = strtolower($buscar);

        // Buscar por comunidad
        foreach ($estacionesMetroMadrid as $linea => $datos) {

            foreach ($datos as $provincia => $datos2) {
                if (strcasecmp($datos2['estacion'], $buscar) === 0) {
                    
                    echo "<li>{$datos2['estacion']}  -  ";
                    echo $datos2['intercambiador'] ? "es intercambiador</li>" : "no es intercambiador</li>";

                    $encontrado = true;
                }
            }

           
        }

        if (!$encontrado) {
            echo "<p style='color: red;'>No se encontraron resultados para '$buscar'.</p>";
        }
    }
}

?>