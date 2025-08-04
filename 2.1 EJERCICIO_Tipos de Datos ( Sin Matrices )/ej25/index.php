<?php
// Declaramos una variable booleana
$es_mayor_de_edad = true;

// Usamos la variable como condicional
if ($es_mayor_de_edad) {
    echo "La persona es mayor de edad.\n";
} else {
    echo "La persona es menor de edad.\n";
}

// Cambiamos el valor de la variable
$es_mayor_de_edad = false;

// Usamos la variable nuevamente como condicional
if ($es_mayor_de_edad) {
    echo "La persona es mayor de edad.\n";
} else {
    echo "La persona es menor de edad.\n";
}
?>
