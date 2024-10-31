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
    <h1>Modificar departamento</h1>
    <?php

    	$errores = [];
    	$valido = false;
    	$idDepartamento = 0;
    	
    	if (count($_REQUEST) > 0) {
    		if (isset($_GET["idDepartamento"])) {

            	$idDepartamento = $_GET["idDepartamento"];

            	try{
                    $mysql ="mysql:host=localhost;dbname=dwes_tarde_empresa;charset=UTF8";
                    $user = "dwes_tarde";
            		$password = "dwes_2223";
                    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                    $conexion = new PDO($mysql, $user, $password);
                }catch (PDOException $e){
                    echo "<p>" .$e->getMessage()."</p>";
                    exit();
                }

        		$select = "SELECT nombre, presupuesto, sede_id FROM departamentos WHERE id = ?";
		        $consulta = $conexion->prepare($select);
		        $consulta->bindParam(1, $idDepartamento); 
		        $consulta->execute();

				if ($consulta->rowCount() == 0){
					$consulta = null;
					$conexion = null;
					header("Location: listado.php");
					exit();
				}else {
			        $registro = $consulta->fetch();
			        
			        $departamento = $registro['nombre'];
			        $presupuesto = $registro['presupuesto'];
			        $sede = $registro['sede_id'];
			        
			        $consulta = null;
			        $conexion = null;
				}

            } else {
		    
			    $valido = true;
			    $mindep = 3;
				$maxdep = 100;
			    
			    $idDepartamento = obtenerValorCampo("id");
			    $departamento = obtenerValorCampo("nombre");
			    $presupuesto = obtenerValorCampo("presupuesto");
			    $sede = obtenerValorCampo("sede");

	        	try{
                    $mysql ="mysql:host=localhost;dbname=dwes_tarde_empresa;charset=UTF8";
                    $user = "dwes_tarde";
            		$password = "dwes_2223";
                    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                    $conexion = new PDO($mysql, $user, $password);
                }catch (PDOException $e){
                    echo "<p>" .$e->getMessage()."</p>";
                    exit();
                }

				$select = "SELECT * FROM departamentos where id = ?";
				$consulta = $conexion->prepare($select);
				$consulta->bindParam(1, $idDepartamento); 
				$consulta->execute();

				if ($consulta->rowCount() == 0){
					$consulta = null;
					$conexion = null;
					header("Location: listado.php");
					exit();
				}

				$consulta = null;
        		$conexion = null;

		        if (!validarLongitudCadena($departamento, $mindep ,$maxdep)) {
		            $errores["departamento"] = "El nombre del departamento tiene que tener una longitud mínima de $mindep y máxima de $maxdep caracteres.";
		            $departamento = "";
		        } else {

		        	try{
						$mysql ="mysql:host=localhost;dbname=dwes_tarde_empresa;charset=UTF8";
						$user = "dwes_tarde";
           			 	$password = "dwes_2223";
						$opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
						$conexion = new PDO($mysql, $user, $password);
					}catch (PDOException $e){
						echo "<p>" .$e->getMessage()."</p>";
						exit();
					}
					$select = "SELECT * FROM departamentos where nombre = ? AND  id != ?";
					$consulta = $conexion->prepare($select);
					$consulta->bindParam(1, $departamento); 
					$consulta->bindParam(2, $idDepartamento); 
					$consulta->execute();

					if ($consulta->rowCount() > 0){
						$errores["departamento"] = "Ya existe un departamento con ese nombre.";
					}

					$consulta = null;
	        		$conexion = null;
		        }

		        if (!validarEnteroPositivo($presupuesto)) {
		            $errores["presupuesto"] = "El presupuesto debe ser un número entero positivo.";
		            $presupuesto = "";
		        } 

		        if (!validarEnteroPositivo($sede)){
		            $errores["sede"] = "El nombre de la sede es obligatoria.";
		            $sede = "";
		        }		       
			}   
    	} 
    	
  	?>

  	<?php
  		if (!$valido || count($errores) > 0):
  
  	?>
  		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
	    	<input type="hidden" name="id" value="<?php echo $idDepartamento ?>">
	    	<p>
	            <input type="text" name="nombre" placeholder="Departamento" value="<?php echo $departamento ?>">
	            <?php
	            	if (isset($errores["departamento"])):
	            ?>
	            	<p class="error"><?php echo $errores["departamento"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <input type="number" name="presupuesto" placeholder="Presupuesto" value="<?php echo $presupuesto ?>">
	            <?php
	            	if (isset($errores["presupuesto"])):
	            ?>
	            	<p class="error"><?php echo $errores["presupuesto"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <select id="sede" name="sede">
	            	<option value="">Seleccione Sede</option>
	            <?php
	            	try{
						$mysql ="mysql:host=localhost;dbname=dwes_tarde_empresa;charset=UTF8";
						$user = "dwes_tarde";
            			$password = "dwes_2223";
						$opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
						$conexion = new PDO($mysql, $user, $password);
					}catch (PDOException $e){
						echo "<p>" .$e->getMessage()."</p>";
						exit();
					}
	            	$consulta = "SELECT id, nombre FROM sedes";
	            	$resultado = resultadoConsulta($conexion, $consulta);
  					while ($row = $resultado->fetch(PDO::FETCH_ASSOC)){
						echo("<option value=".$row["id"].">".$row["nombre"]."</option>");
					}
  				
					$resultado = null;
        			$conexion = null;
  				?>
  				</select>
  				
	            <?php
	            	if (isset($errores["sede"])):
	            ?>
	            	<p class="error"><?php echo $errores["sede"] ?></p>
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
			try{
				$mysql ="mysql:host=localhost;dbname=dwes_tarde_empresa;charset=UTF8";
				$user = "dwes_tarde";
            	$password = "dwes_2223";
				$opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
				$conexion = new PDO($mysql, $user, $password);
			}catch (PDOException $e){
				echo "<p>" .$e->getMessage()."</p>";
				exit();
			}

			$insert = "update departamentos set nombre = ?, presupuesto = ?, sede_id = ? WHERE id = ?";
			$consulta = $conexion->prepare($insert);
			$consulta->bindParam(1, $departamento); 
			$consulta->bindParam(2, $presupuesto);
			$consulta->bindParam(3, $sede); 
			$consulta->bindParam(4, $idDepartamento); 
		
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
            <a href="listado.php">Volver al listado de departamentos</a>
        </div>
   	</div>
    
</body>
</html>