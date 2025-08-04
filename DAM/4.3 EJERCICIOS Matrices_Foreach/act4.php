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

?>

<!DOCTYPE html>
<html>
<head>
    <title>Buscar Provincia</title>
</head>
<body>
<h1>Buscar Provincia</h1>
<form method="POST" action="">
    <label for="provincia">Ingrese el nombre de la provincia:</label>
    <input type="text" id="provincia" name="provincia">
    <button type="submit">Buscar</button>
</form>

<?php
// Procesar el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $provinciaBuscada = trim($_POST['provincia']);
    $encontrado = false;

    // Normalizar la entrada a minúsculas para hacer la búsqueda insensible a mayúsculas
    $provinciaBuscada = strtolower($provinciaBuscada);

    // Buscar la provincia en las comunidades
    foreach ($comunidades as $comunidad => $datos) {
        foreach ($datos['provincias'] as $provincia) {
            if (strtolower($provincia) === $provinciaBuscada) {
                echo "<h2>Resultado de la búsqueda</h2>";
                echo "<p>La provincia <strong>$provincia</strong> pertenece a la comunidad autónoma de <strong>$comunidad</strong>.</p>";
                $encontrado = true;
                break 2; // Salir de ambos bucles
            }
        }
    }

    // Si no se encontró la provincia
    if (!$encontrado) {
        echo "<p style='color: red;'>La provincia <strong>$provinciaBuscada</strong> no se encuentra en los registros.</p>";
    }
}
?>

</body>
</html>
