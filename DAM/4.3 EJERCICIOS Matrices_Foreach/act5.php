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
    <title>Población Total por Comunidad</title>
    <style>
        table {
            width: max-content;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>

<h1>Población Total de Cada Comunidad Autónoma</h1>

<table>
    <thead>
        <tr>
            <th>Comunidad Autónoma</th>
            <th>Población Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Mostrar las comunidades y la población total
        foreach ($comunidades as $comunidad => $datos) {
            $poblacionTotal = 0;
            foreach ($datos['capital'] as $provincia => $info) {
                $poblacionTotal += $info['poblacion']; // Sumar la población de cada provincia
            }

            echo "<tr>
                    <td>$comunidad</td>
                    <td>$poblacionTotal</td>
                  </tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
