<?php
session_start();

function obtenerPeliculas() {
    return [
        ['id' => 1, 'titulo' => 'Torrente'],
        ['id' => 2, 'titulo' => 'Spiderman'],
        ['id' => 3, 'titulo' => 'Doraemon']
    ];
}

function obtenerSesiones($pelicula_id) {
    $sesiones = [
        1 => [['id' => 1, 'hora' => '16:00'], ['id' => 2, 'hora' => '18:00'], ['id' => 3, 'hora' => '20:00']],
        2 => [['id' => 4, 'hora' => '17:00'], ['id' => 5, 'hora' => '19:00'], ['id' => 6, 'hora' => '21:00']],
        3 => [['id' => 7, 'hora' => '15:00'], ['id' => 8, 'hora' => '17:00'], ['id' => 9, 'hora' => '19:00']]
    ];
    return $sesiones[$pelicula_id];
}

function obtenerAsientosDisponibles($pelicula_id, $sesion_id) {
    // Simulación de asientos disponibles
    return [
        1 => ['A1', 'A2', 'A3', 'A4', 'A5', 'A6'],
        2 => ['B1', 'B2', 'B3', 'B4', 'B5', 'B6'],
        3 => ['C1', 'C2', 'C3', 'C4', 'C5', 'C6'],
        4 => ['D1', 'D2', 'D3', 'D4', 'D5', 'D6'],
        5 => ['E1', 'E2', 'E3', 'E4', 'E5', 'E6']
    ];
}

function calcularTotal($asientos) {
    return count($asientos) * 5; // 5€ por asiento
}

function obtenerTituloPelicula($pelicula_id) {
    $peliculas = obtenerPeliculas();
    foreach ($peliculas as $pelicula) {
        if ($pelicula['id'] == $pelicula_id) {
            return $pelicula['titulo'];
        }
    }
    return '';
}

function obtenerHoraSesion($sesion_id) {
    $sesiones = [
        1 => '16:00', 2 => '18:00', 3 => '20:00',
        4 => '17:00', 5 => '19:00', 6 => '21:00',
        7 => '15:00', 8 => '17:00', 9 => '19:00'
    ];
    return $sesiones[$sesion_id];
}

function procesarPago() {
    $_SESSION['pago_realizado'] = true;
    generarEntradas($_SESSION['pelicula_id'], $_SESSION['sesion_id'], $_SESSION['asientos']);
}

function generarEntradas($pelicula_id, $sesion_id, $asientos) {
    $entradas = "Película: " . obtenerTituloPelicula($pelicula_id) . "\n";
    $entradas .= "Sesión: " . obtenerHoraSesion($sesion_id) . "\n";
    $entradas .= "Asientos: " . implode(', ', $asientos) . "\n";
    file_put_contents('entradas.txt', $entradas);
}
?>