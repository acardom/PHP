<?php 

// ej1
function calcularVolumenCilindro($h, $r) {
    $volumen = pi() * pow($r, 2) * $h;
    return $volumen;
}

$altura = 20;
$radio = 5;
echo nl2br("Actividad 1\n");
echo "El volumen del cilindro con un radio de ".$radio." y una altura de ".$altura." es de:  " . calcularVolumenCilindro($altura, $radio);
echo nl2br("\n\n");


// ej2
function sumarTresNumeros($a, $b, $c) {
    return $a + $b + $c;
}
function multiplicarTresNumeros($a, $b, $c) {
    return $a * $b * $c;
}

$num1 = 3;
$num2 = 4;
$num3 = 5;

echo nl2br("Actividad 2\n");
echo nl2br("La suma de los tres números es: " . sumarTresNumeros($num1, $num2, $num3) . "\n");
echo "El producto de los tres números es: " . multiplicarTresNumeros($num1, $num2, $num3);
echo nl2br("\n\n");


//ej3
function eliminarNumerosAleatorios(array &$array, int $cantidad = 1): bool {

    if ($cantidad > count($array)) {
        return false; 
    } else if (count($array) < 1){
        return false; 
    }else if ($cantidad <= 0){
        $cantidad = 1;
    }

    for ($i = 0; $i < $cantidad; $i++) {
        $indiceAleatorio = array_rand($array);
        unset($array[$indiceAleatorio]); 
    }

    return true;
}

$Array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
$Eliminar = 4;

echo nl2br("Actividad 3\n");

if (eliminarNumerosAleatorios($Array, $Eliminar)) {
    echo nl2br("Se eliminaron $Eliminar elementos.\n");
    print_r($Array);
} else {
    echo "No se pudieron eliminar los elementos.";
}



?>