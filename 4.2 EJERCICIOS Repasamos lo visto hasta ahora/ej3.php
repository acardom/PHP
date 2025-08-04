<?php
// Función para calcular el factorial usando un bucle for
function calcularFactorial($numero) {
    $factorial = 1;
    for ($i = 1; $i <= $numero; $i++) {
        $factorial *= $i;
    }
    return $factorial;
}

// Ejemplo de uso
$numero = rand(1, 10); // Puedes cambiar el número aquí
echo "El factorial de $numero es: " . calcularFactorial($numero) .nl2br("\n");
?>
