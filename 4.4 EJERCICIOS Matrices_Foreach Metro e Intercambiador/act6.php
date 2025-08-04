<!DOCTYPE html>
<html>
<head>
    <title>Buscar Intercambiadores</title>
</head>
<body>
    <h1>Buscar Intercambiadores</h1>
    <form method="POST" action="">
        <label for="buscar">Buscar intercambiadores por línea o estación:</label>
        <input type="text" id="buscar" name="buscar">
        <button type="submit">Buscar</button>
    </form>
</body>
</html>

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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $buscar = trim($_POST['buscar']);
    
    if (empty($buscar)) {
        echo "<p>Por favor, ingrese un término de búsqueda.</p>";
    } else {
        $buscar = strtolower($buscar); // Convertir la búsqueda a minúsculas
        $totalIntercambiadores = 0;
        $encontrado = false;

        echo "<ul>";

        foreach ($estacionesMetroMadrid as $linea => $estaciones) {
            if (stripos($linea, $buscar) !== true) {
                $encontrado = true;
                foreach ($estaciones as $estacion) {
                    if ($estacion['intercambiador']) {
                        $totalIntercambiadores++;
                    }
                }
            } else {
                foreach ($estaciones as $estacion) {
                    if (stripos($estacion['estacion'], $buscar) !== true) {
                        $encontrado = true;
                        echo "<li>Estación: {$estacion['estacion']} - ";
                        echo $estacion['intercambiador'] ? "Es intercambiador</li>" : "No es intercambiador</li>";

                        if ($estacion['intercambiador']) {
                            $totalIntercambiadores++;
                        }
                    }
                }
            }                                               
        }

        echo "</ul>";

        if ($encontrado) {
            echo "<p>Se encontraron un total de $totalIntercambiadores intercambiadores relacionados con '$buscar'.</p>";
        } else {
            echo "<p style='color: red;'>No se encontraron resultados para '$buscar'.</p>";
        }
    }
}
?>
