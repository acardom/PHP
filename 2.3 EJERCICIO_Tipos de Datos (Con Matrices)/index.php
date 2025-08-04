<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios PHP</title>
    <link rel="stylesheet" href="style.css"> <!-- Importa el CSS -->
</head>

<?php
// 1. Matriz de colores
$colores = array("Rojo", "Verde", "Azul", "Amarillo", "Naranja");
echo "· El tercer color es: " . $colores[2] . nl2br("\n\n"); // Imprime "Azul"

// 2. Matriz asociativa de un coche
$coche = array(
    "marca" => "Toyota",
    "modelo" => "Corolla",
    "año" => 2020
);
echo "· El modelo del coche es: " . $coche["modelo"] . nl2br("\n\n"); // Imprime "Corolla"

// 3. Matriz multidimensional de estudiantes
$estudiantes = array(
    array("nombre" => "Juan", "edad" => 20, "nota" => 8.5),
    array("nombre" => "Ana", "edad" => 22, "nota" => 9.0),
    array("nombre" => "Luis", "edad" => 21, "nota" => 7.5)
);
echo "· El nombre del segundo estudiante es: " . $estudiantes[1]["nombre"] . nl2br("\n\n"); // Imprime "Ana"

// 4. Imprimir días de la semana
$dias = array("Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado", "Domingo");
echo "· Días de la semana:";
print_r($dias); // Imprime todos los días de la semana
echo "<br/><br/>";

// 5. Añadir elementos a una matriz
$numeros = array(1, 2, 3);
array_push($numeros, 4, 5); // Añade 4 y 5
echo "· Números después de añadir: ";
print_r($numeros); // Imprime la matriz de números
echo nl2br("\n\n");

// 6. Unión de matrices
$frutas = array("Manzana", "Banana", "Naranja");
$verduras = array("Zanahoria", "Brócoli", "Espinaca");
$comida = array_merge($frutas, $verduras);
echo "· Comida combinada (frutas y verduras): ";
print_r($comida); // Imprime la matriz combinada
echo nl2br("\n\n");

// 7. Contar elementos en una matriz
$valores = array("Uno", "Dos", "Tres");
echo "· Cantidad de elementos en valores: " . count($valores) . "\n"; // Imprime 3
echo nl2br("\n\n");

// 8. Eliminar un elemento de una matriz
$numeros = array(10, 20, 30, 40, 50);
unset($numeros[2]); // Elimina el tercer número (30)
echo "· Números después de eliminar el tercer elemento: ";
print_r($numeros); // Imprime la matriz de números
echo nl2br("\n\n");

// 9. Copiar una matriz
$original = array(1, 2, 3);
$copia = $original; // Copia la matriz
echo "· Copia de la matriz original: ";
print_r($copia); // Imprime la copia
echo nl2br("\n\n");

// 10. Definir una constante
define("VELOCIDAD_LUZ", 299792458);
echo "· La velocidad de la luz es: " . VELOCIDAD_LUZ . " m/s"; // Imprime 299792458
echo nl2br("\n\n");

// 11. Definir y mostrar una constante
define("NOMBRE_APLICACION", "Mi Aplicación Web");
echo "· Nombre de la aplicación: " . NOMBRE_APLICACION ; // Imprime "Mi Aplicación Web"
echo nl2br("\n\n");

// 12. Usar una constante predefinida
echo "· La versión de PHP es: " . PHP_VERSION; // Imprime la versión actual de PHP
echo nl2br("\n\n");

// 13. Mostrar constantes predefinidas
echo "· Constantes predefinidas disponibles:".nl2br("\n");
print_r(get_defined_constants()); // Muestra todas las constantes definidas
echo nl2br("\n\n");

?>
