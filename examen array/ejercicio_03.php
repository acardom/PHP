<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<h2>Ejercicio 3</h2>

	<p>Ganas si ningún número de carta coincide con el número escrito encima de ella. En caso contario habrás perdido.</p>

	<?php

	$num_cartas = rand(5,10);
	$cartas = range(1,10);
	$gana = true;
  	shuffle ($cartas);
 	$partida = array_slice($cartas, 0, $num_cartas);
	$posicion = 0;

	echo "<table>";
	echo "<tr>";
	foreach ($partida as $key => $value) {
		  
		$posicion = $posicion + 1;
		echo "<td text-aling= center>";
		echo "<p style=font-size: 2em; text-align: center;> ". $posicion ."</p>";
		echo "</td>";
		if ($posicion == $value){
			$gana = false;
		}
	}
	echo "</tr>";
	echo "<tr>";
	foreach ($partida as $key => $value) {
		  
		$posicion = $posicion + 1;
		echo "<td>";
		echo "<img src=cartas/$value.svg  width=100>";
		echo "</td>";
	}
	echo "<tr>";
	echo "</table>";

	if ($gana){
		echo "<br/> ¡Enhorabuena has ganado!";
	} 
	else {
		echo "<br/> Lo siento has perdido";
	}

	?>
	</div>

</body>
</html>