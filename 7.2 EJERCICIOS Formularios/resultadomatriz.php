<!-- resultadoMatriz.php -->
<?php
function verTrayectoria($matriz, $fila, $columna, $direccion) {
    $result = [];
    $size = count($matriz);
    $i = $fila;
    $j = $columna;

    while ($i >= 0 && $i < $size && $j >= 0 && $j < $size) {
        $result[] = $matriz[$i][$j];
        switch ($direccion) {
            case 'arriba': $i--; break;
            case 'abajo': $i++; break;
            case 'izquierda': $j--; break;
            case 'derecha': $j++; break;
            case 'arriba_izquierda': $i--; $j--; break;
            case 'arriba_derecha': $i--; $j++; break;
            case 'abajo_izquierda': $i++; $j--; break;
            case 'abajo_derecha': $i++; $j++; break;
        }
    }
    return $result;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $matriz = $_POST['matriz'];
    $fila = $_POST['fila'];
    $columna = $_POST['columna'];
    $direccion = $_POST['direccion'];

    echo "<h1>Trayectoria:</h1>";
    $trayectoria = verTrayectoria($matriz, $fila, $columna, $direccion);
    echo "<pre>" . implode(" -> ", $trayectoria) . "</pre>";
} else {
    header('Location: matriz1.php');
    exit;
}
?>
