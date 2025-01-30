<?php
$comunidades = [
    'Andalucía' => [
        'provincias' => ['Sevilla', 'Cádiz', 'Córdoba', 'Granada', 'Málaga', 'Jaén', 'Huelva'],
        'capital' => ['Sevilla' => ['poblacion' => 742940, 'informacion_adicional' => 'Capital histórica de al-Andalus.'],
                      'Cádiz' => ['poblacion' => 120000, 'informacion_adicional' => 'Ciudad portuaria.'],
                      'Córdoba' => ['poblacion' => 328428, 'informacion_adicional' => 'Ciudad cultural y patrimonio mundial.'],
                      'Granada' => ['poblacion' => 233649, 'informacion_adicional' => 'Conocida por la Alhambra.'],
                      'Málaga' => ['poblacion' => 577400, 'informacion_adicional' => 'Famosa por su costa y clima.'],
                      'Jaén' => ['poblacion' => 116000, 'informacion_adicional' => 'Cuna del aceite de oliva.'],
                      'Huelva' => ['poblacion' => 146000, 'informacion_adicional' => 'Ciudad portuaria y agrícola.']],
    ],
    'Cataluña' => [
        'provincias' => ['Barcelona', 'Girona', 'Lleida', 'Tarragona'],
        'capital' => ['Barcelona' => ['poblacion' => 1620343, 'informacion_adicional' => 'Ciudad cosmopolita y centro económico.'],
                      'Girona' => ['poblacion' => 100000, 'informacion_adicional' => 'Ciudad medieval con gran encanto.'],
                      'Lleida' => ['poblacion' => 140000, 'informacion_adicional' => 'Centro agrícola e industrial.'],
                      'Tarragona' => ['poblacion' => 132000, 'informacion_adicional' => 'Importante ciudad portuaria.']],
    ],
    'Castilla y León' => [
        'provincias' => ['Ávila', 'Burgos', 'León', 'Salamanca', 'Segovia', 'Soria', 'Valladolid', 'Zamora'],
        'capital' => ['Valladolid' => ['poblacion' => 304875, 'informacion_adicional' => 'Ciudad universitaria y cuna del castellano.'],
                      'Ávila' => ['poblacion' => 58000, 'informacion_adicional' => 'Ciudad amurallada patrimonio de la humanidad.'],
                      'Burgos' => ['poblacion' => 175000, 'informacion_adicional' => 'Conocida por su catedral.'],
                      'León' => ['poblacion' => 125000, 'informacion_adicional' => 'Cuna del Reino de León.'],
                      'Salamanca' => ['poblacion' => 144000, 'informacion_adicional' => 'Famosa por su universidad.'],
                      'Segovia' => ['poblacion' => 58000, 'informacion_adicional' => 'Conocida por su acueducto romano.'],
                      'Soria' => ['poblacion' => 40000, 'informacion_adicional' => 'Rural y tranquila.'],
                      'Zamora' => ['poblacion' => 61000, 'informacion_adicional' => 'Ciudad histórica.']],
    ],
    'Galicia' => [
        'provincias' => ['A Coruña', 'Lugo', 'Ourense', 'Pontevedra'],
        'capital' => ['Santiago de Compostela' => ['poblacion' => 97185, 'informacion_adicional' => 'Ciudad histórica y sede del Camino de Santiago.'],
                      'A Coruña' => ['poblacion' => 246000, 'informacion_adicional' => 'Puerto importante.'],
                      'Lugo' => ['poblacion' => 98000, 'informacion_adicional' => 'Conocida por su muralla romana.'],
                      'Ourense' => ['poblacion' => 105000, 'informacion_adicional' => 'Famosa por sus termas.'],
                      'Pontevedra' => ['poblacion' => 95000, 'informacion_adicional' => 'Puerto pesquero.']],
    ],
    'País Vasco' => [
        'provincias' => ['Álava', 'Guipúzcoa', 'Vizcaya'],
        'capital' => ['Vitoria-Gasteiz' => ['poblacion' => 252727, 'informacion_adicional' => 'Capital del País Vasco y ciudad verde.'],
                      'Bilbao' => ['poblacion' => 345122, 'informacion_adicional' => 'Centro industrial y cultural.'],
                      'San Sebastián' => ['poblacion' => 188000, 'informacion_adicional' => 'Famosa por su gastronomía y playa.']],
    ],
];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Buscar en Comunidades</title>
</head>
<body>
<h1>Buscar en Comunidades</h1>
<form method="POST" action="">
    <label for="buscar">Buscar por comunidad, provincia o capital:</label>
    <input type="text" id="buscar" name="buscar">
    <button type="submit">Buscar</button>
</form>

<?php
// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $buscar = trim($_POST['buscar']);
    
    // Si el campo de búsqueda está vacío, no mostrar nada
    if (empty($buscar)) {
        echo "<p>Campo de búsqueda vacío.</p>";
    } else {
        $encontrado = false;
        
        echo "<h2>Resultados de la búsqueda para: $buscar</h2>";

        // Convertir la búsqueda a minúsculas para hacerla insensible a mayúsculas
        $buscar = strtolower($buscar);

        // Buscar por comunidad
        foreach ($comunidades as $comunidad => $datos) {
            if (strcasecmp($comunidad, $buscar) === 0) {
                echo "<h3>Comunidad: $comunidad</h3>";
                echo "<ul>";
                foreach ($datos['provincias'] as $provincia) {
                    echo "<li>Provincia: $provincia</li>";
                }
                foreach ($datos['capital'] as $capital => $info) {
                    echo "<li>Capital: $capital, Población: {$info['poblacion']}</li>";
                }
                echo "</ul>";
                $encontrado = true;
            }

            // Buscar por provincia
            foreach ($datos['provincias'] as $provincia) {
                if (strcasecmp($provincia, $buscar) === 0) {
                    echo "<h3>Provincia: $provincia</h3>";
                    echo "<ul>";
                    echo "<li>Comunidad: $comunidad</li>";
                    foreach ($datos['capital'] as $capital => $info) {
                        if (strcasecmp($capital, $buscar) === 0) {
                            echo "<li>Capital: $capital, Población: {$info['poblacion']}</li>";
                        }
                    }
                    echo "</ul>";
                    $encontrado = true;
                }
            }

            // Buscar por capital
            foreach ($datos['capital'] as $capital => $info) {
                if (strcasecmp($capital, $buscar) === 0) {
                    echo "<h3>Capital: $capital</h3>";
                    echo "<ul>";
                    echo "<li>Comunidad: $comunidad</li>";
                    echo "<li>Población: {$info['poblacion']}</li>";
                    echo "</ul>";
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

</body>
</html>
