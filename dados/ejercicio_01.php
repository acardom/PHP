<?php
$numero = rand(1, 10);
$pares = 0;
$impares = 0;

if ($numero == 1) {
    print "  <h3>$numero dado</h3>";
} else {
    print "  <h3>$numero dados</h3>";
}

for ($i = 0; $i < $numero; $i++) {
    $dado = rand(1, 6);
    print "<img src=img/$dado.svg alt=$dado width= 100 height= 100>\n";
    if ($dado % 2) {
        $impares += 1;
    } else {
        $pares += 1;
    }
}
print "  <p>Han salido ";
if ($pares < 2) {
    print "$pares número par y ";
} else {
    print "$pares números pares y ";
}
if ($impares < 2) {
    print "$impares número impar.</p>";
} else {
    print "$impares números impares.</p>";
}
?>