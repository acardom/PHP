<?php
// Generamos un número aleatorio entre 1 y 10
$numeroAleatorio = rand(1, 10);
echo "Número aleatorio generado: $numeroAleatorio".nl2br("\n");

// Creamos la tabla de multiplicar del número generado usando RANGE
$tabla = range($numeroAleatorio, $numeroAleatorio * 10, $numeroAleatorio);

// Mostramos la tabla
echo "La tabla de multiplicar de $numeroAleatorio es:".nl2br("\n\n");
foreach ($tabla as $valor) {
    echo "$valor".nl2br("\n");
}

// Encontramos el valor mínimo y máximo en la tabla
$valorMinimo = min($tabla);
$valorMaximo = max($tabla);

echo nl2br("\n")."Valor mínimo de la tabla: $valorMinimo".nl2br("\n");
echo "Valor máximo de la tabla: $valorMaximo".nl2br("\n");
?>
