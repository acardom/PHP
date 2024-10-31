<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta nueva sede</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <h1>Alta de una nueva sede</h1>

	<form action="nuevo.php">
        <p>nombre sede:  <input type=text name=nombre size=30 maxlength=50 minlength=3 required></p>
		<p>dirección:  <input type=text name=direccion size=30 maxlength=255 minlength=10 required></p>
        <p>
            <input type="submit" value="Guardar">
            <input type="reset" value="Borrar">
        </p>

		<?php

			function recoge($var, $m = "")
			{
				$tmp = is_array($m) ? [] : "";
				if (isset($_REQUEST[$var])) {
					if (!is_array($_REQUEST[$var]) && !is_array($m)) {
						$tmp = trim(htmlspecialchars($_REQUEST[$var]));
					} elseif (is_array($_REQUEST[$var]) && is_array($m)) {
						$tmp = $_REQUEST[$var];
						array_walk_recursive($tmp, function (&$valor) {
							$valor = trim(htmlspecialchars($valor));
						});
					}
				}
				return $tmp;
			}        

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

			$valido = false;
			$nombre = recoge("nombre");
			$direccion = recoge("direccion");

			if ($nombre != "" and $direccion != ""){
				$valido = true;
			}

			if ($valido == true){
				$consulta = $conexion->prepare("insert into sedes (nombre, direccion) values (?,?)");
				$consulta->bindParam(1, $nombre);
				$consulta->bindParam(2, $direccion);
				$consulta->execute();
				header('Location: listado.php'); 
			}

			$conexion = null;
		?>

	</form>
	
   <div class="contenedor">
        <div class="enlaces">
            <a href="listado.php">Volver al listado de sedes</a>
        </div>
   </div>
</body>
</html>