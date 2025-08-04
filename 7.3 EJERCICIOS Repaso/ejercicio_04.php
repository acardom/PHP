<?php
$numero = 6;
$dados = [];
for ($i = 0; $i < $numero; $i++) {
    $dados[$i] = rand(1, 6);
}

// Mostramos las imágenes de los dados obtenidos
    print "<h2>Tirada de $numero dados:</h2>\n";

foreach ($dados as $dado) {
    print "<img src=\"img/$dado.svg\" alt=\"$dado\" width=\"100\" height=\"100\">\n";
}

// Guardamos el valor del dado a descartar
$eliminar = rand(1, 6);

// Mostramos el dado a descartar
print "<h2>Dado a eliminar</h2>\n";
print "<img src=\"img/$eliminar.svg\" alt=\"$eliminar\" width=\"80\" height=\"80\">\n";

// Eliminamos el dado de la matriz
for ($i = 0; $i < $numero; $i++) {
    if ($dados[$i] == $eliminar) {
        unset($dados[$i]);
    }
}
// Mostramos las imágenes de los dados restantes
print "<h2>Dados restantes</h2>\n";

if (count($dados) == 0) {
    print "<p>No quedan dados.</p>\n";
} else {
    print "  <p>\n";
    foreach ($dados as $dado) {
        print "<img src=\"img/$dado.svg\" alt=\"$dado\" width=\"100\" height=\"100\">\n";
    }
}

?>