<?php
    require_once("../utiles/variables.php");
    require_once("../utiles/funciones.php");
?>
<?php
if (count($_REQUEST) > 0){
    if (isset($_GET["idEmpleado"])){
        $idEmp = $_GET["idEmpleado"];
            $conexion = conectarPDO($host, $user, $password, $bbdd);
            $delete = "DELETE FROM sedes where id = ?";
            $consulta = $conexion->prepare($delete);
			$consulta->bindParam(1, $idEmp); 
			try {
				$consulta->execute();
				$exito = true;
			} catch (PDOException $exception) {
				$exito = false;
			}
			$consulta = null;
			$conexion = null;
        	if ($exito) {
        		echo "<h2>Registro eliminado con éxito.</h2>";
        	} else {
        		echo "<h2>No se ha podido eliminar el registro.</h2>";
                echo ("<a href=listado.php>Volver al listado de empleados</a>");
        	}
    } else {
  		header("Location: listado.php");
	}
}else{
      header("Location: listado.php");
} 
?>