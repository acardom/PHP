<?php 
$lineasMetro = [
    [
        "linea" => "Línea 1",
        "longitud_km" => 23.9,
        "max_trenes" => 30,
        "paradas" => [
            [
                "nombre" => "Sol",
                "subidas" => 1200,
                "bajadas" => 1100,
                "transbordo" => true
            ],
            [
                "nombre" => "Gran Vía",
                "subidas" => 950,
                "bajadas" => 1020,
                "transbordo" => true
            ],
            [
                "nombre" => "Cuatro Caminos",
                "subidas" => 700,
                "bajadas" => 650,
                "transbordo" => false
            ]]],
    [
        "linea" => "Línea 2",
        "longitud_km" => 14.5,
        "max_trenes" => 25,
        "paradas" => [
            [
                "nombre" => "Retiro",
                "subidas" => 800,
                "bajadas" => 750,
                "transbordo" => false
            ],
            [
                "nombre" => "Goya",
                "subidas" => 1000,
                "bajadas" => 1200,
                "transbordo" => true
            ],
            [
                "nombre" => "Ventas",
                "subidas" => 600,
                "bajadas" => 500,
                "transbordo" => false
            ]
        ]]];


// Actividad 1: Mostrar información básica de las líneas de metro.
function mostrarInformacionlineasMetro($lineasMetro) {
    echo nl2br("<h2>Actividad 1: Mostrar información básica de las líneas de metro.</h2>");
    foreach ($lineasMetro as $linea) {
        echo nl2br("Linea: " . $linea['linea'] . "\n");
        echo nl2br("Longitud_km: " . $linea['longitud_km'] . " km\n");
        // count para contar la cantidad de paradas
        echo nl2br("Total paradas: " . count($linea['paradas']) . "\n\n");
    }
}


// Actividad 2: Calcular el total de subidas y bajadas en todas las líneas.
function calcularNivelSubidasBajadasLineas($lineasMetro) {
    echo nl2br("<h2>Actividad 2: Calcular el total de subidas y bajadas en todas las líneas.</h2>");
    $totalSubidas = 0;
    $totalBajadas = 0;
    foreach ($lineasMetro as $linea) {
        $bajadas = 0;
        $subidas = 0;

        foreach ($linea['paradas'] as $parada) {
            $bajadas = $bajadas + $parada['bajadas'];
            $subidas = $subidas + $parada['subidas'];
            //sumamos todas las subidas y bajadas
        }

        echo nl2br("Linea: " . $linea['linea'] . "\n");
        echo nl2br("Total bajadas: " . $bajadas . "\n");
        echo nl2br("Total subidas: " . $subidas . "\n");

        if ($bajadas > $totalBajadas){
            //coparamos cual tiene mas en total
            $totalBajadas = $bajadas;
            $lineaBajadas = $linea['linea'];
        }

        if ($subidas > $totalSubidas){
            //coparamos cual tiene mas en total
            $totalSubidas = $subidas;
            $lineasubidas = $linea['linea'];
        }
    }
    echo nl2br("\nLa linea que tuvo mas subidas : " . $lineasubidas . " con un total de ".$totalSubidas." subidas \n");
    echo nl2br("La linea que tuvo mas bajadas : " . $lineaBajadas . " con un total de ".$totalBajadas." bajadas \n\n");
}


// Actividad 3: Mostrar paradas donde se puede hacer transbordo.
function mostrarParadasTransbordos($lineasMetro) {
    echo nl2br("<h2>Actividad 3: Mostrar paradas donde se puede hacer transbordo.</h2>");
    foreach ($lineasMetro as $linea) {
        echo nl2br("Linea: " . $linea['linea'] . "\n");

        foreach ($linea['paradas'] as $parada) {
            if ($parada['transbordo']){
                //comprobamos transbordo
                echo nl2br("Nombre de la parada: " . $parada['nombre'] . " tiene transbordo\n");
            }
        }

        echo nl2br( "\n");
    }
}


// Actividad 4: Ordenar las líneas de metro según su longitud.
function ordenarSegunLongitud($lineasMetro) {
    echo nl2br("<h2>Actividad 4: Ordenar las líneas de metro según su longitud.</h2>");
//las ordenamos descendentes segun su longitud si fuera ascendente sera solo cambiar los valores $a y $b
    usort($lineasMetro, function ($a, $b) {
        return $b['longitud_km'] <=> $a['longitud_km'];
    });

    foreach ($lineasMetro as $linea) {
        echo nl2br("Linea: " . $linea['linea'] . "\n");
        echo nl2br("Longitud_km: " . $linea['longitud_km'] . " km\n");
        //contamos el numero de paradas
        echo nl2br("Total paradas: " . count($linea['paradas']) . "\n\n");
    }
}


// Actividad 5: Crear un reporte tabular de las líneas y sus paradas
function crearReporteTabularLineasParadas($lineasMetro) {
    echo nl2br("<h2>Actividad 5: Crear un reporte tabular de las líneas y sus paradas</h2>");
    foreach ($lineasMetro as $linea) {
        $bajadas = 0;
        $subidas = 0;

        echo nl2br("Linea: " . $linea['linea'] . "\n\n");

        foreach ($linea['paradas'] as $parada) {
            //comprobamos si tiene transbordo
            if ($parada['transbordo']){
                $EstadoTransbordo = 'si';
            }else{
                $EstadoTransbordo = 'no';
            }

            echo nl2br("Nombre parada: " . $parada['nombre'] . " con subida de: ". $parada['subidas']. " y con bajada de: ". $parada['bajadas'] . " transbordos: ". $EstadoTransbordo . " tiene \n");

            //sumamos todas las bajadas y subidas
            $bajadas = $bajadas + $parada['bajadas'];
            $subidas = $subidas + $parada['subidas'];
        }

        echo nl2br("\nBajadas totales: " . $bajadas . " \n");
        echo nl2br("Subidas totales: " . $subidas . "\n\n");
    }
}


// Actividad 6: Permitir buscar información sobre una parada específica.
function buscarSobreParadaEspecifica($lineasMetro, $ParadaEspecifica) {

    foreach ($lineasMetro as $linea) {
        $lineaActual= $linea['linea'];

        foreach ($linea['paradas'] as $parada) {
            if (strtolower($parada['nombre']) === strtolower($ParadaEspecifica)){
                //comprobamos si son iguales pasandolo antes los 2 al mismo formato
                echo nl2br("Linea: " . $lineaActual . "\n");
                echo nl2br("Bajadas: " . $parada['bajadas'] . "\n");
                echo nl2br("Subidas: " . $parada['subidas'] . "\n");
                //comprobamos si tiene transbordo
                if ($parada['transbordo']){
                    echo nl2br("tiene transbordo\n");
                }else{
                    echo nl2br("no tiene transbordo\n");
                }
            }
        }
    }

}


// Actividad 7: Calcular y mostrar el promedio de personas que suben y bajan en cada línea.
function calcularMostrarPromedioPersonas($lineasMetro) {
    echo nl2br("<h2>\nActividad 7: Calcular y mostrar el promedio de personas que suben y bajan en cada línea.</h2>");
    foreach ($lineasMetro as $linea) {
        //valores por defecto
        $bajadas = 0;
        $subidas = 0;
        $paradasTotales = 0;

        echo nl2br("Linea: " . $linea['linea'] . "\n");

        foreach ($linea['paradas'] as $parada) {
            //contamos el numero de paradas y el total de subidas y bajadas por linea
            $paradasTotales ++;
            $bajadas = $bajadas + $parada['bajadas'];
            $subidas = $subidas + $parada['subidas'];
        }

        //mostramos los datos redondeados porque son personas
        echo nl2br("Promedio de subidas: " . round($subidas/$paradasTotales) . "\n");
        echo nl2br("Promedio de bajadas: " . round($bajadas/$paradasTotales) . "\n\n");

    }
}


// Actividad 8: Identificar la línea con mayor cantidad de personas (subidas + bajadas).
function lineaMayorSubidasBajadas($lineasMetro) {
    echo nl2br("<h2>Actividad 8: Identificar la línea con mayor cantidad de personas (subidas + bajadas).</h2>");
    $total = 0;
    foreach ($lineasMetro as $linea) {
        $TotalRecorriendo = 0;
        foreach ($linea['paradas'] as $parada) {
            //sumamos todas las subidas y bajadas de la linea
            $TotalRecorriendo = $TotalRecorriendo + $parada['subidas'] + $parada['bajadas'];
        }

        //comprobamos cual es mayor
        if($TotalRecorriendo > $total){
            $total = $TotalRecorriendo;
            $lineaTotal = $linea['linea'];
        }
    }

    echo nl2br("Linea con mayor (subidas y bajadas) es : " . $lineaTotal . " con un total de ".$total." subidas y bajadas\n\n");
}


// Actividad 9: Calcular cuántas paradas permiten transbordo en cada línea.
function calcularCuantasParadasPermitenTransbordosPorLiena($lineasMetro) {
    echo nl2br("<h2>Actividad 9: Calcular cuántas paradas permiten transbordo en cada línea.</h2>");
    foreach ($lineasMetro as $linea) {
        $totalTransbordos = 0;
        
        foreach ($linea['paradas'] as $parada) {
            if ($parada['transbordo']){
                $totalTransbordos ++;
            }
        }

        echo nl2br("Linea: " . $linea['linea'] . " tiene un total de ".$totalTransbordos." paradas con transbordo\n");
    }
}


// Actividad 10: Resumir toda la información en estadísticas globales.
function informacionEstadisticasGlobales($lineasMetro) {
    echo nl2br("<h2>\nActividad 10: Resumir toda la información en estadísticas globales.</h2>");
    //variables recoger los datos
    $lineasTotales = 0;
    $paradasTotales = 0;
    $longitudTotal = 0;
    $lineaCorta = 0;
    $lineaLarga = 0;

    foreach ($lineasMetro as $linea) {
        $lineasTotales ++;
        $longitudTotal = $longitudTotal + $linea['longitud_km'];

        foreach ($linea['paradas'] as $parada) {
            $paradasTotales++;
        }

        if ($linea['longitud_km'] > $lineaLarga){
            $lineaLarga = $linea['longitud_km'];
            $nombreLarga = $linea['linea'];
        }

        if ($linea['longitud_km'] <= $lineaLarga){
            $lineaCorta = $linea['longitud_km'];
            $nombreCorta = $linea['linea'];
        }
    }

    //calculamos el promedio
    $longitudPromedio = $longitudTotal/$lineasTotales;

    echo nl2br("Lineas totales: " . $lineasTotales . "\n");
    echo nl2br("Paradas totales: " . $paradasTotales . "\n");
    echo nl2br("Promedio de longitud de las lineas: " . $longitudPromedio . "km\n");
    echo nl2br("Linea mas larga: " . $nombreLarga . " con un total de ".$lineaLarga."km\n");
    echo nl2br("Linea mas corta: " . $nombreCorta . " con un total de ".$lineaCorta."km\n");

}



mostrarInformacionlineasMetro($lineasMetro);
calcularNivelSubidasBajadasLineas($lineasMetro);
mostrarParadasTransbordos($lineasMetro);
ordenarSegunLongitud($lineasMetro);
crearReporteTabularLineasParadas($lineasMetro);

// vamos a crear un post para recoger datos
echo nl2br("<h2>Actividad 6: Permitir buscar información sobre una parada específica.</h2>");
?>
<form method="post">
    <label for="parada">Introduce una parada:</label>
    <input type="text" name="parada" id="parada">
    <button type="submit">Buscar</button>
</form>
<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $parada = $_POST['parada'] ?? '';
    if ($parada) {
        buscarSobreParadaEspecifica($lineasMetro, $parada);
    }
}

calcularMostrarPromedioPersonas($lineasMetro);
lineaMayorSubidasBajadas($lineasMetro);
calcularCuantasParadasPermitenTransbordosPorLiena($lineasMetro);
informacionEstadisticasGlobales($lineasMetro);
?>