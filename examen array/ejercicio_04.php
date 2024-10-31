
	<?php
		require_once("empresa.php");
	
	echo "<h2>Parte 1: Datos de los géneros de los trabajadores de un departamento al azar ordenados de mayor a menor número de empleados:</h2>";
	
	$departamentoAleatorio = array_rand($trabajadores);
	
	$dpto = $departamentoAleatorio;

	foreach ($trabajadores["$departamentoAleatorio"] as $key => $value) {
		if ($key == "planta"){
			$planta = $value;
		}elseif ($key == "responsable"){
			$responsable = $value;
		}
	}

	$femenino=0;
	$masculino=0;

	foreach ($trabajadores["$departamentoAleatorio"]["empleados"] as $key => $value) {
		foreach ($value as $key => $val) {
			if ($val == "masculino"){
				$masculino = $masculino + 1;
			}elseif ($val == "femenino"){
				$femenino = $femenino + 1;
			}
		}
	}

	echo "El $dpto situado en la planta nº $planta y cuyo responsable es $responsable y el reparto de género entre los empleados es el siguiente:<br/><br/>";
	
	if ($masculino < $femenino){
		echo "· Femenino: $femenino empleado/s<br/>";
		echo "· Masculino: $masculino empleado/s<br/>";
	}else{
		echo "· Masculino: $masculino empleado/s<br/>";
		echo "· Femenino: $femenino empleado/s<br/>";
	}


	echo "<h2>Parte 2: Información sobre el mayor sueldo y el sueldo medio de cada departamento.</h2>";


	foreach ($trabajadores as $key => $value) {

		$salariomax = 0;
		$suma = 0;
		$dpto = $key;
		$num = 0;

		foreach ($value["empleados"] as $key => $value) {
			foreach ($value as $key => $val) {
				if ($key == "sueldo"){
					if ($val>$salariomax){
						$salariomax = $val;
					}
					$suma = $suma+$val;
					$num = $num + 1;
				}
			}
		}
		$sueldo_medio = $suma/$num;
		echo "El empleado con mayor sueldo del $dpto, cobra anualmente $salariomax € y el sueldo medio anual del departamento es de $sueldo_medio €<br/>";
	}
	
	?>