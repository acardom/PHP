<?php
$numero = 4;

print "<h3>Jugador 1</h3>\n";

// Guardamos los valores del Jugador 1 en la matriz $dados1
$dados1 = [];
for ($i = 0; $i < $numero; $i++) {
    $dados1[$i] = rand(1, 6);
}

// Mostramos los resultados obtenidos por el Jugador 1
foreach ($dados1 as $dado) {
    print "<img src=\"img/$dado.svg\" alt=\"$dado\" width=\"100\" height=\"100\">";
}

print "  <h3>Jugador 2</h3>\n";

// Guardamos los valores del Jugador 2 en la matriz $dados2
$dados2 = [];
for ($i = 0; $i < $numero; $i++) {
    $dados2[$i] = rand(1, 6);
}
// Mostramos los resultados obtenidos por el Jugador 2
foreach ($dados2 as $dado) {
    print "<img src=\"img/$dado.svg\" alt=\"$dado\" width=\"100\" height=\"100\">\n";
}

// En los acumuladores $gana1 $gana2 y $empate contamos cuántas partidas ha ganado cada uno
print "  <h3>Resultado</h3>";

$gana1 = 0;
$gana2 = 0;
$empate = 0;
for ($i = 0; $i < $numero; $i++) {
    if ($dados1[$i] > $dados2[$i]) {
        $gana1++;
    } elseif ($dados1[$i] < $dados2[$i]) {
        $gana2++;
    } else {
        $empate++;
    }
}

// Mostramos cuántas partidas ha ganado cada uno
print "<p>El jugador 1 ha ganado <strong>$gana1</strong> ";
print $gana1 != 1 ? "veces" : " vez";
print ", el jugador 2 ha ganado <strong>$gana2</strong>";
print $gana2 != 1 ? " veces" : " vez";
print " y los jugadores han empatado <strong>$empate</strong>";
print $empate != 1 ? " veces" : " vez";
print ".</p>\n";
print "\n";

// Mostramos quién ha ganado la partida
if ($gana1 > $gana2) {
    print "<p>El que más veces ha ganado ha sido el <strong> jugador 1</strong>.</p>\n";
} elseif ($gana1 < $gana2) {
    print "<p>El que más veces ha ganado ha sido el <strong> jugador 2</strong>.</p>\n";
} else {
    print "<p>Han empatado siempre.</p>\n";
}
?>