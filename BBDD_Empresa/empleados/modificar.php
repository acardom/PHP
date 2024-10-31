<?php
    require_once("../utiles/variables.php");
    require_once("../utiles/funciones.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar departamento</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
<body>
    <h1>Modificar empleado</h1>
    <?php

    	$errores = [];
    	$comprobarValidacion = false;
    	$limiteInferiorHijos = 0;
    	$limiteSuperiorHijos = 10;
    	$longitudMinimaNombre = 3;
		$longitudMaximaNombre = 50;
    	$longitudMinimaApellidos = 3;
		$longitudMaximaApellidos = 150;
    	$longitudMaximaEmail = 120;
    	$idEmpleado = 0;
    	
    	if (count($_REQUEST) > 0) {
    		if (isset($_GET["idEmpleado"])) {
            	$idEmpleado = $_GET["idEmpleado"];

            	$conexion = conectarPDO($host, $user, $password, $bbdd);

        		$select = "SELECT nombre, apellidos, email, salario, hijos,   pais_id, departamento_id FROM empleados WHERE id = ? ";
		        $consulta = $conexion->prepare($select);
		        $consulta->bindParam(1, $idEmpleado); 
		        $consulta->execute();

				if ($consulta->rowCount() == 0){
					$consulta = null;
					$conexion = null;
					header("Location: listado.php");
					exit();
				}else {
			        $registro = $consulta->fetch();
			        $nombre = $registro['nombre'];
			        $apellidos = $registro['apellidos'];
			        $email = $registro['email'];
			        $salario = $registro['salario'];
			        $hijos = $registro['hijos'];
			        $nacionalidad = $registro['pais_id'];
			        $departamento = $registro['departamento_id'];
			        $consulta = null;
			        $conexion = null;
				}

            } else {

    			$comprobarValidacion = true;
			    $idEmpleado = obtenerValorCampo("id");
			    $nombre = obtenerValorCampo("nombre");
			    $apellidos = obtenerValorCampo("apellidos");
			    $email = obtenerValorCampo("email");
			    $salario = obtenerValorCampo("salario");
			    $hijos = obtenerValorCampo("numeroHijos");
			    $nacionalidad = obtenerValorCampo("nacionalidad");
			    $departamento = obtenerValorCampo("departamento");
			
	        	$conexion = conectarPDO($host, $user, $password, $bbdd);

				$select = "SELECT * FROM empleados where id = ?";
				$consulta = $conexion->prepare($select);
				$consulta->bindParam(1, $idEmpleado); 
				$consulta->execute();

				if ($consulta->rowCount() == 0){
					$consulta = null;
					$conexion = null;
					header("Location: listado.php");
					exit();
				}
		        if (!validarLongitudCadena($nombre, $longitudMinimaNombre ,$longitudMaximaNombre)) {
		            $errores["nombre"] = "El nombre del empleado tiene que tener una longitud mínima de $longitudMinimaNombre y máxima de $longitudMaximaNombre caracteres.";
		        	$nombre = "";
		        }
		        if (!validarLongitudCadena($apellidos, $longitudMinimaApellidos, $longitudMaximaApellidos)){
		            $errores["apellidos"] = "Los apellidos del empleado tienen que tener una longitud mínima de $longitudMinimaApellidos y máxima de $longitudMaximaApellidos caracteres.";
		            $apellidos = "";
		        }
		        if (!validarEmail($email)){
		            $errores["email"] = "El correo electrónico del empleado no es válido.";
		            $email = "";
		        }elseif (strlen($email)>$longitudMaximaEmail){
					$errores["email"] = "El correo electrónico del empleado no puede superar los longitudMaximaEmail caracteres.";
		            $email = "";
		        }
		        if (!validarEnteroLimites($hijos, $limiteInferiorHijos,$limiteSuperiorHijos)){
		            $errores["hijos"] = "El número de hijos del empleado debe estar entre $limiteInferiorHijos y $limiteSuperiorHijos.";
		            $hijos = "";
		        }
		        if (!validarDecimalPositivo($salario)){
		            $errores["salario"] = "El salario debe ser un número decimal positivo.";
		            $salario = "";
		        } 
		        if (!validarEnteroPositivo($departamento)){
		            $errores["departamento"] = "El nombre del departamento es obligatoria.";
		            $sede = "";
		        }
		        if (!validarEnteroPositivo($nacionalidad)){
		            $errores["nacionalidad"] = "La nacionalidad del empleado es obligatoria.";
		            $nacionalidad = "";
		        }
		    }
    	}
  	?>

  	<?php
  		if (!$comprobarValidacion || count($errores) > 0):
  
  	?>
  		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  			<input type="hidden" name="id" value="<?php echo $idEmpleado ?>">
	    	<p>
	            <input type="text" name="nombre" placeholder="Nombre" value="<?php echo $nombre ?>">
	            <?php
	            	if (isset($errores["nombre"])):
	            ?>
	            	<p class="error"><?php echo $errores["nombre"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <input type="text" name="apellidos" placeholder="Apellidos" value="<?php echo $apellidos ?>">
	            <?php
	            	if (isset($errores["apellidos"])):
	            ?>
	            	<p class="error"><?php echo $errores["apellidos"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <input type="text" name="email" placeholder="Correo electrónico" value="<?php echo $email ?>">
	            <?php
	            	if (isset($errores["email"])):
	            ?>
	            	<p class="error"><?php echo $errores["email"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <input type="number" step="0.01" name="salario" placeholder="Salario" value="<?php echo $salario ?>">
	            <?php
	            	if (isset($errores["salario"])):
	            ?>
	            	<p class="error"><?php echo $errores["salario"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <input type="number" name="numeroHijos" placeholder="Número de hijos" value="<?php echo $hijos ?>">
	            <?php
	            	if (isset($errores["hijos"])):
	            ?>
	            	<p class="error"><?php echo $errores["hijos"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <select id="nacionalidad" name="nacionalidad">
	            	<option value="">Seleccione Nacionalidad</option>
	            <?php
	            	$conexion = conectarPDO($host, $user, $password, $bbdd);

	            	$consulta = "SELECT id, nacionalidad FROM paises ORDER BY nacionalidad";
	            	$resultado = resultadoConsulta($conexion, $consulta);
  					while ($row = $resultado->fetch(PDO::FETCH_ASSOC)):
  				?>
  					<option value="<?php echo $row["id"]; ?>" <?php echo $row["id"] == $nacionalidad ? "selected" : "" ?>><?php echo $row["nacionalidad"]; ?></option>
  				<?php
  					endwhile;

  					$consulta = null;
        			$conexion = null;
  				?>
  				</select>
  				
	            <?php
	            	if (isset($errores["nacionalidad"])):
	            ?>
	            	<p class="error"><?php echo $errores["nacionalidad"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <select id="departamento" name="departamento">
	            	<option value="">Seleccione Departamento</option>
	            <?php
	            	$conexion = conectarPDO($host, $user, $password, $bbdd);

	            	$consulta = "SELECT id, nombre FROM departamentos ORDER BY nombre";
	            	$resultado = resultadoConsulta($conexion, $consulta);
  					while ($row = $resultado->fetch(PDO::FETCH_ASSOC)):
  				?>
  					<option value="<?php echo $row["id"]; ?>" <?php echo $row["id"] == $departamento ? "selected" : ""?>><?php echo $row["nombre"]; ?></option>
  				<?php
  					endwhile;
  					
  					$consulta = null;
        			$conexion = null;
  				?>
  				</select>
  				
	            <?php
	            	if (isset($errores["departamento"])):
	            ?>
	            	<p class="error"><?php echo $errores["departamento"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <input type="submit" value="Guadar">
	        </p>
	    </form>
  	<?php
  		else:
			$conexion = conectarPDO($host, $user, $password, $bbdd);

			$insert = "update empleados set nombre = ?, apellidos = ?, email = ?, salario = ?, hijos = ?, pais_id = ?, departamento_id = ? WHERE id = ?";
			$consulta = $conexion->prepare($insert);
			$consulta->bindParam(1, $nombre);
			$consulta->bindParam(2, $apellidos); 
			$consulta->bindParam(3, $email);
			$consulta->bindParam(4, $salario); 
			$consulta->bindParam(5, $hijos);
			$consulta->bindParam(6, $nacionalidad); 
			$consulta->bindParam(7, $departamento);
			$consulta->bindParam(8, $idEmpleado); 

			try {
				$consulta->execute();
			}catch (PDOException $exception){
           		exit($exception->getMessage());
        	}

			$consulta = null;
        	$conexion = null;
  			header("Location: listado.php");
  			
    	endif;
    ?>
    <div class="contenedor">
        <div class="enlaces">
            <a href="listado.php">Volver al listado de empleados</a>
        </div>
   	</div>
    
</body>
</html>