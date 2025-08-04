<?php
// Arrays de las clases A y B
$claseA = [
    ["Nombre" => "Juan", "Edad" => 21],
    ["Nombre" => "María", "Edad" => 19],
    ["Nombre" => "Pedro", "Edad" => 24],
    ["Nombre" => "Antonio", "Edad" => 30],
    ["Nombre" => "Carmen", "Edad" => 24],
    ["Nombre" => "Carlos", "Edad" => 26],
    ["Nombre" => "Lucía", "Edad" => 22]
];

$claseB = [
    ["Nombre" => "Jaime", "Edad" => 27],
    ["Nombre" => "Luisa", "Edad" => 21],
    ["Nombre" => "Aitor", "Edad" => 33],
    ["Nombre" => "Macarena", "Edad" => 22],
    ["Nombre" => "María", "Edad" => 27],
    ["Nombre" => "Pedro", "Edad" => 28],
    ["Nombre" => "Juan", "Edad" => 24]
];

// Mostrar las tablas
echo "Clase A:".nl2br("\n\n");
foreach ($claseA as $alumno) {
    echo "Nombre: " . $alumno['Nombre'] . ", Edad: " . $alumno['Edad'] . nl2br("\n");
}

echo nl2br("\n\n\n")."Clase B:".nl2br("\n\n");
foreach ($claseB as $alumno) {
    echo "Nombre: " . $alumno['Nombre'] . ", Edad: " . $alumno['Edad'] .nl2br("\n");
}

// Unir ambas clases en una sola
$clasesUnidas = array_merge($claseA, $claseB);

echo nl2br("\n\n\n")."Clases Unidas:".nl2br("\n\n");
foreach ($clasesUnidas as $alumno) {
    echo "Nombre: " . $alumno['Nombre'] . ", Edad: " . $alumno['Edad'] .nl2br("\n");
}
?>
