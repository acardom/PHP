<?php
    echo "<h2><p>Ejercicio 1</h2></p>";
    echo "<h3>Parte 1</h3></p>";

    $segundos = 195803;
    $seg = $segundos%60;
    $minutos = ($segundos-$seg)/60;
    $min = $minutos%60;
    $horas = ($minutos-$min)/60;
    $hor = $horas%24;
    $dias = ($horas-$hor)/24;

    echo "$segundos segundos equivalen a $dias dias, $hor horas, $min minutos y $seg segundos ";
  
    echo "<h3>Parte 2</h3></p>";

    $tiradas = 0;

    do{ 
        $dado = rand(1,6);
        echo "dado: $dado <br/>";
        $tiradas = $tiradas + 1;
    }while ($dado < 6);

    if ($tiradas%2 == 0){
        echo "<br/>lo consiguio en un numero par de veces PERDIO<br/>";
    }else{
        echo "<br/>lo consiguio en un numero inpar de veces GANÓ<br/>";
    }

    echo "<h3>Parte 3</h3></p>";

    $tiradas = 0;
    $suma = 0;

    do{
        $tiradas = $tiradas + 1;
        $dado = rand(1,6);
        echo "tirada nº $tiradas: $dado <br/>";
        $suma = $suma + $dado;
    }while($tiradas < 100);

    echo "<br/>la suma total es de: $suma<br/>";
    $media = $suma/100;
    echo "<br/>la media es de: $media<br/>";
?>