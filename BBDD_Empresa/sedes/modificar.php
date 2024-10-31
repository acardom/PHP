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
    <title>Modificar una sede</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <h1>Modificar una sede</h1>
    <?php

    	$errores = [];
    	$valido = false;
    	$idSede = 0;
    	
    	if (count($_REQUEST) > 0){

		    if (isset($_GET["idSede"])){
            	$idSede = $_GET["idSede"];

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

        		$select = "SELECT nombre, direccion FROM sedes s WHERE s.id = ? ";
		        $consulta = $conexion->prepare($select);
		        $consulta->bindParam(1, $idSede);
		        $consulta->execute();

				if ($consulta->rowCount() == 0){
					$consulta = null;
					$conexion = null;
					header("Location: listado.php");
					exit();
				}else {
			        $registro = $consulta->fetch();
			        $sede = $registro['nombre'];
			        $direccion = $registro['direccion'];
			        $consulta = null;
			        $conexion = null;
				}

        	} else {

        		$valido = true;
        		$minsede = 3;
			    $maxsede = 50;
			    $mindireccion = 10;
			    $maxdireccion = 255;

			    $idSede = obtenerValorCampo("id");
			    $sede = obtenerValorCampo("nombre");
			    $direccion = obtenerValorCampo("direccion");
			    
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

				$select = "SELECT * FROM sedes where id = ?";
				$consulta = $conexion->prepare($select);
				$consulta->bindParam(1, $idSede); 
				$consulta->execute();

				if ($consulta->rowCount() == 0){
					$consulta = null;
					$conexion = null;
					header("Location: listado.php");
					exit();
				}

				$consulta = null;
        		$conexion = null;

		        if (!validarLongitudCadena($sede, $minsede ,$maxsede)) {
		            $errores["sede"] = "La sede de la empresa tiene que tener una longitud mínima de $minsede y máxima de $maxsede caracteres.";
		        }
				if (!validarLongitudCadena($direccion, $mindireccion, $maxdireccion)) {
		            $errores["direccion"] = "La direccion de la empresa tiene que tener una longitud mínima de $mindireccion y máxima de $maxdireccion caracteres.";
		        }
        	}  
    	} 
    	else {
  			header("Location: listado.php");
  			exit();
    	}
  	?>

  	<?php
  		if (!$valido || count($errores) > 0):
  	?>
  		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
  			<input type="hidden" name="id" value="<?php echo $idSede ?>">
	    	<p>
	            <input type="text" name="nombre" placeholder="Sede" value="<?php echo $sede ?>">
	            <?php
	            	if (isset($errores["sede"])):
	            ?>
	            	<p class="error"><?php echo $errores["sede"] ?></p>
	            <?php
	            	endif;
	            ?>
	        </p>
	        <p>
	            <input type="text" name="direccion" placeholder="Dirección" value="<?php echo $direccion ?>">
	            <?php
	            	if (isset($errores["direccion"])):
	            ?>
	            	<p class="error"><?php echo $errores["direccion"] ?></p>
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
			$update = "update sedes set nombre = ?, direccion = ? where id = ?";
			$consulta = $conexion->prepare($update);
			
			$consulta->bindParam(1, $sede); 
			$consulta->bindParam(2, $direccion); 
			$consulta->bindParam(3, $idSede);

			$consulta->execute();
			$consulta = null;
        	$conexion = null;
  			header("Location: listado.php");	
    	endif;
    ?>
    <div class="contenedor">
        <div class="enlaces">
            <a href="listado.php">Volver al listado de sedes</a>
        </div>
   	</div>
    
</body>
</html>