
    <?php

    // Cadena
    $cadena1 = "Hola, mundo!";
    echo "Cadena: " . $cadena1 . "<br>";

    // Obtener la longitud de la cadena
    $longitud = strlen($cadena1);
    echo "La longitud de la cadena es: $longitud <br/>";

    // Convertir la cadena a mayúsculas
    $cadenaMayusculas = strtoupper($cadena1);
    echo "La cadena en mayúsculas es: $cadenaMayusculas <br/>";

    // Concatenar con otra cadena
    $cadena2 = " Bienvenidos a PHP.";
    $cadenaConcatenada = $cadena1 . $cadena2;
    echo "La cadena concatenada es: $cadenaConcatenada\n";

    ?>
