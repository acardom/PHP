<!-- resultado.php -->
<?php
function permutacionAleatoria($array) {
    shuffle($array); // Mezcla aleatoriamente los elementos del array
    return $array;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $elementos = $_POST['elementos'];
    echo "<h1>Elementos enviados:</h1>";
    echo "<pre>" . implode(", ", $elementos) . "</pre>";

    echo "<h1>Permutación aleatoria:</h1>";
    $permutacion = permutacionAleatoria($elementos);
    echo "<pre>" . implode(", ", $permutacion) . "</pre>";
} else {
    header('Location: formulario1.php');
    exit;
}
?>
