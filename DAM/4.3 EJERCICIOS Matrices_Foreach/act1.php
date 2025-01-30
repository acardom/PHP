<?php 

$comunidades = [
    'Andalucía' => [
        'provincias' => ['Sevilla', 'Cádiz', 'Córdoba', 'Granada', 'Málaga', 'Jaén', 'Huelva'],
        'capital' => ['Sevilla' => ['poblacion' => 742940, 'informacion_adicional' => 'Capital histórica de al-Andalus.']],
    ],
    'Cataluña' => [
        'provincias' => ['Barcelona', 'Girona', 'Lleida', 'Tarragona'],
        'capital' => ['Barcelona' => ['poblacion' => 1620343, 'informacion_adicional' => 'Ciudad cosmopolita y centro económico.']],
    ],
    'Castilla y León' => [
        'provincias' => ['Ávila', 'Burgos', 'León', 'Salamanca', 'Segovia', 'Soria', 'Valladolid', 'Zamora'],
        'capital' => ['Valladolid' => ['poblacion' => 304875, 'informacion_adicional' => 'Ciudad universitaria y cuna del castellano.']],
    ],
    'Galicia' => [
        'provincias' => ['A Coruña', 'Lugo', 'Ourense', 'Pontevedra'],
        'capital' => ['Santiago de Compostela' => ['poblacion' => 97185, 'informacion_adicional' => 'Ciudad histórica y sede del Camino de Santiago.']],
    ],
    'País Vasco' => [
        'provincias' => ['Álava', 'Guipúzcoa', 'Vizcaya'],
        'capital' => ['Vitoria-Gasteiz' => ['poblacion' => 252727, 'informacion_adicional' => 'Capital del País Vasco y ciudad verde.']],
    ],
];

echo "<h1>Muestra los datos de las provincias</h1>";

foreach ($comunidades as $comunidad => $datos) {
    echo "<h2>$comunidad</h2>";
    echo "<p>Provincias:</p>";
    echo "<ul>";
    foreach ($datos['provincias'] as $provincia) {
        echo "<li>$provincia</li>";
    }
    echo "</ul>";
}

?>
