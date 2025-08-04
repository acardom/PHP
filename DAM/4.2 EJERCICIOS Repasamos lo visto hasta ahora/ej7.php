<?php
// Función para generar una secuencia aleatoria de N bits
function generarSecuenciaBits($n) {
    $secuencia = "";
    for ($i = 0; $i < $n; $i++) {
        $secuencia .= rand(0, 1); // Genera 0 o 1 aleatorio
    }
    return $secuencia;
}

// Generamos la secuencia aleatoria de N bits
$n = 10; // Puedes cambiar el valor de N aquí
$secuenciaOriginal = generarSecuenciaBits($n);

// Generamos la secuencia complementaria
$secuenciaComplementaria = strtr($secuenciaOriginal, '01', '10');

// Mostrar las secuencias
echo "Secuencia aleatoria de $n bits: $secuenciaOriginal". nl2br("\n");
echo "Secuencia complementaria: $secuenciaComplementaria". nl2br("\n");
?>
