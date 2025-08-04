<?php
// Función para verificar si un número es primo
function esPrimo($numero) {
    if ($numero <= 1) return false;
    for ($i = 2; $i <= sqrt($numero); $i++) {
        if ($numero % $i == 0) return false;
    }
    return true;
}

// Definir los números entre los cuales buscamos los primos
$inicio = 10; // Cambiar por el número de inicio
$fin = 50;    // Cambiar por el número final

$primos = [];
for ($i = $inicio; $i <= $fin; $i++) {
    if (esPrimo($i)) {
        $primos[] = $i;
    }
}

// Mostrar los números primos encontrados
echo "Números primos entre $inicio y $fin:". nl2br("\n\n");
foreach ($primos as $primo) {
    echo "$primo". nl2br("\n");
}
?>
