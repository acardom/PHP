<?php
    echo "<h2><p>Ejercicio 2</h2></p>";

    $numero = rand(2,8);
    $dados = [];
    for ($i = 0; $i < $numero; $i++) {
        $dados[$i] = rand(1, 6);
    }

    echo "Tirada de $numero dados:<br/><br/>";

    foreach ($dados as $dado) {
        echo "<img src=dados/$dado.svg alt=$dado width=100 height=100>";
    }
    
    echo "</br>";
    $eliminar = rand(1, 6);

    echo "<br/>Dado a eliminar<br/><br/>";
    print "<img src=dados/$eliminar.svg alt=$eliminar width=80 height=80><br/>";

    for ($i = 0; $i < $numero; $i++) {
        if ($dados[$i] == $eliminar) {
            unset($dados[$i]);
        }
    }

    echo "<br/>Dados restantes<br/><br/>";

    arsort($dados);

    foreach ($dados as $dado) {
        echo "<img src=dados/$dado.svg alt=$dado width=100 height=100>";
    }
  

?>