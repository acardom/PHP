<?php
// Función para tirar un dado
function tirarDado() {
    return rand(1, 6); // Genera un número aleatorio entre 1 y 6
}

// Realizamos el ejercicio de los dados
for ($tirada1 = 1; $tirada1 <= 3; $tirada1++) {
    $dado1 = tirarDado();
    echo "Sentencia del primer dado, tirada $tirada1 incluyendo el valor: $dado1".nl2br("\n\n");
    
    // Tiramos el segundo dado tantas veces como el valor del primero
    for ($tirada2 = 1; $tirada2 <= $dado1; $tirada2++) {
        $dado2 = tirarDado();
        echo "Sentencia del segundo dado incluyendo el valor: $dado2".nl2br("\n");
    }

    echo nl2br("\n\n");
}
?>
