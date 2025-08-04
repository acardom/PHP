<?php
// Bucle exterior
for ($i = 1; $i <= 3; $i++) {
    echo "Sentencia de la variable $i incluyendo el valor:".nl2br("\n\n");
    // Bucle interior
    for ($j = 'a'; $j <= 'd'; $j++) {
        echo "Sentencia de la variable $i incluyendo el valor: $j".nl2br("\n");
    }

    echo nl2br("\n\n");
}
?>
