<?php 

    echo  "<strong>Ejercicio 1:</strong> Cálculo de área y perímetro de un rectángulo. Escribe un script que calcule el área y el perímetro de un rectángulo dados el ancho y el alto.".nl2br("\n\n");
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ancho = $_POST['ancho'];
        $alto = $_POST['alto'];
        // Validar que los valores sean numéricos positivos
        if (!is_numeric($ancho) || !is_numeric($alto) || $ancho <= 0 || $alto <= 0) {
            echo "Por favor, introduce valores válidos y positivos para el ancho y el alto.".nl2br("\n");
        } else {
            // Convertir a float
            $ancho = (float)$ancho;
            $alto = (float)$alto;
            // Cálculos
            $area = $ancho * $alto;
            $perimetro = 2 * ($ancho + $alto);
            // Mostrar resultados
            echo "El área del rectángulo es: $area<br>";
            echo "El perímetro del rectángulo es: $perimetro<br>".nl2br("\n");
        }
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
    <form method="post">
        <label for="ancho">Ancho:</label>
        <input type="text" id="ancho" name="ancho" required><br><br>
        
        <label for="alto">Alto:</label>
        <input type="text" id="alto" name="alto" required><br><br>
        
        <input type="submit" value="Calcular">
    </form>
</body>
</html>
    
    
<?php 

    echo nl2br("\n\n")."<strong>Ejercicio 2:</strong> Calcular el resto y cociente de dos números. Dado dos números enteros, calcula el cociente y el resto de la división.".nl2br("\n\n");
    function calcularCocienteResto($dividendo, $divisor) {
        if ($divisor == 0) {
            return "Error: División por cero no es permitida.";
        }
        $cociente = intdiv($dividendo, $divisor);
        $resto = $dividendo % $divisor;
        return [$cociente, $resto];
    }
    // Establecer los valores de dividendo y divisor
    $dividendo = 10;  // Cambia este valor según sea necesario
    $divisor = 3;     // Cambia este valor según sea necesario
    // Calcular cociente y resto
    $resultado = calcularCocienteResto($dividendo, $divisor);
    
    if (is_array($resultado)) {
        list($cociente, $resto) = $resultado;
        echo "Cociente: $cociente, Resto: $resto\n";
    } else {
        echo $resultado . "\n"; // Mensaje de error
    }


    
    echo nl2br("\n\n\n")."<strong>Ejercicio 3:</strong> Pre-incremento y post-incremento. Crea un script que muestre la diferencia entre el pre-incremento y el post-incremento.".nl2br("\n\n");
    // Inicializamos una variable con un valor entero
    $numero = 5;
    // Mostramos el valor original de la variable
    echo "Valor original: $numero".nl2br("\n");
    // Ejemplo de pre-incremento
    $preIncremento = ++$numero; // Se incrementa primero y luego se asigna
    echo "Valor después del pre-incremento: $preIncremento".nl2br("\n"); // Muestra el nuevo valor
    echo "Valor de la variable tras el pre-incremento: $numero".nl2br("\n"); // Confirma el cambio en la variable
    // Reiniciamos la variable para la siguiente demostración
    $numero2 = 5; // Restablecemos a su valor original
    // Mostramos el valor original de la variable
    echo "Valor original: $numero2".nl2br("\n");
    // Ejemplo de post-incremento
    $postIncremento = $numero2++; // Asigna el valor actual y luego incrementa
    echo "Valor después del post-incremento: $postIncremento".nl2br("\n"); // Muestra el valor antes de incrementar
    echo "Valor de la variable tras el post-incremento: $numero2".nl2br("\n"); // Muestra el nuevo valor después del incremento



    echo nl2br("\n\n\n")."<strong>Ejercicio 4:</strong> Redondeo de un número. Utiliza la función round() para redondear un número a 2 decimales.".nl2br("\n\n");
    // Definimos un número con decimales
    $numero = 5.6789;
    // Mostramos el valor original
    echo "Número original: $numero".nl2br("\n");
    // Redondeamos el número a 2 decimales
    $numeroRedondeado = round($numero, 2);
    // Mostramos el resultado del redondeo
    echo "Número redondeado a 2 decimales: $numeroRedondeado".nl2br("\n");



    echo nl2br("\n\n\n")."<strong>Ejercicio 5:</strong> Calcular potencias. Escribe un script que calcule y muestre el valor de 3 elevado a la 4ta potencia usando el operador **.".nl2br("\n\n");
    // Definimos la base y el exponente
    $base = 3;
    $exponente = 4;
    // Calculamos la potencia
    $resultado = $base ** $exponente;
    // Mostramos el resultado
    echo "$base elevado a la $exponente es: $resultado".nl2br("\n");



    echo nl2br("\n\n\n")."<strong>Ejercicio 6:</strong> Número aleatorio. Genera un número aleatorio entre 1 y 50 usando mt_rand().".nl2br("\n\n");
    // Generar un número aleatorio entre 1 y 50
    $numeroAleatorio = mt_rand(1, 50);
    // Mostrar el número aleatorio generado
    echo "Número aleatorio generado entre 1 y 50: $numeroAleatorio".nl2br("\n");



    echo nl2br("\n\n\n")."<strong>Ejercicio 7:</strong> Conversión de tipos con operadores de comparación. Compara un número entero con una cadena de texto usando === y == para mostrar la diferencia.".nl2br("\n\n");
    // Definimos un número entero y una cadena de texto
    $numero = 5;
    $cadena = "5";
    // Comparación usando ==
    $igualdad = ($numero == $cadena);
    echo "Comparación con '= =': $numero = = $cadena es " . ($igualdad ? 'verdadero' : 'falso') . nl2br("\n");
    // Comparación usando ===
    $identidad = ($numero === $cadena);
    echo "Comparación con '= = =': $numero = = = $cadena es " . ($identidad ? 'verdadero' : 'falso') . nl2br("\n");



    echo nl2br("\n\n\n")."<strong>Ejercicio 8:</strong> Formatear un número con separador de miles y decimales. Usa number_format() para mostrar un número con separador de miles y 3 decimales.".nl2br("\n\n");
    // Definimos un número
    $numero = 1234567.89123;
    // Formateamos el número con separador de miles y 3 decimales
    $numeroFormateado = number_format($numero, 3, ',', '.');
    // Mostramos el resultado
    echo "Número formateado: $numeroFormateado". nl2br("\n");



    echo nl2br("\n\n\n")."<strong>Ejercicio 9:</strong> Evaluar expresiones con operadores lógicos. Usa operadores lógicos para determinar si un número está entre 10 y 20.".nl2br("\n\n");
    // Definimos un número
    $numero = 15; // Cambia este valor para probar otros números
    // Evaluar si el número está entre 10 y 20
    if ($numero >= 10 && $numero <= 20) {
        echo "El número $numero está entre 10 y 20.". nl2br("\n");
    } else {
        echo "El número $numero no está entre 10 y 20.". nl2br("\n");
    }



    echo nl2br("\n\n\n")."<strong>Ejercicio 10:</strong> Incremento de caracteres. Muestra cómo se comporta el incremento en caracteres con el operador ++.".nl2br("\n\n");
    // Definimos un carácter inicial
    $caracter = 'a';
    // Mostramos el carácter original
    echo "original: $caracter". nl2br("\n");
    // Incremento del carácter
    $caracterIncrementado = ++$caracter;
    // Mostramos el carácter después del incremento
    echo "después del incremento: $caracterIncrementado". nl2br("\n");
    // Incremento de nuevo para mostrar el siguiente carácter
    $caracterIncrementado = ++$caracter;
    // Mostramos el carácter después del segundo incremento
    echo "segundo incremento: $caracterIncrementado". nl2br("\n");

?>
