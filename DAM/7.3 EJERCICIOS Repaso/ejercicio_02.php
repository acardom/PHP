<?php
$dado1 = rand(1, 6);
$dado2 = rand(1, 6);


print "<h3><p>Jugador 1:</p></h3>";  
print "<p><img src=\"img/$dado1.svg\" alt=\"$dado1\" width=\"100\" height=\"100\">";
print "<h3><p>Jugador 2: </p></h3>";
print "<img src=\"img/$dado2.svg\" alt=\"$dado2\" width=\"100\" height=\"100\">";


if ($dado1 > $dado2) {
    print "<p>Ha ganado el jugador 1.</p>";
} elseif ($dado1 < $dado2) {
    print "<p>Ha ganado el jugador 2.</p>";
} else {
    print "<p>Han empatado.</p>";
}