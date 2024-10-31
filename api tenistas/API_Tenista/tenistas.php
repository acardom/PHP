<?php
 /**
 * Ejercicio - API 
 *
 * @author Escriba aquí su nombre
 */

  require_once("../utiles/config.php");
  require_once("../utiles/funciones.php");
  $datos = "";
  $conexion=conectarPDO($database);

  // ESCRIBA AQUI EL CÓDIGO PHP NECESARIO

  if ($_SERVER['REQUEST_METHOD'] == 'GET')
  	{
    	if (isset($_GET['id'])) {
      		$idTenista = $_GET['id'];

          $select = "SELECT t.id as id_tenista, t.nombre as nombre_tenista, 
          t.apellidos as apelldios, t.altura as altura, t.anno_nacimiento as nacimiento,
          ti.anno as anno_titulo
          from tenistas t, titulos ti
          where t.id = ? and ti.tenista_id = t.id
          GROUP by ti.anno";
          
	      	$consulta = $conexion->prepare($select);
	      	$consulta->bindParam(1, $idTenista);
	      	$consulta->execute();
	      
	      	if ($consulta->rowCount() > 0) {
	        	$titulos = [];
            $equipo = [];
	        	while ($TenistasInfo = $consulta->fetch(PDO::FETCH_ASSOC)) {
	          		if ($TenistasInfo["anno_titulo"] != null) {

                  $año_ti = $TenistasInfo["anno_titulo"];
                  $id_ti = $TenistasInfo["id_tenista"];

                  $select2 = "SELECT tor.nombre as tor_n from torneos tor, titulos ti
                  where ti.anno = ? and tor.id = ti.torneo_id and ti.tenista_id = ?";

                  $consulta2 = $conexion->prepare($select2);
                  $consulta2->bindParam(1, $año_ti);
                  $consulta2->bindParam(2, $id_ti);
                  $consulta2->execute();

                  unset($nom_tor);

                  while ($Torneo_nom = $consulta2->fetch(PDO::FETCH_ASSOC)) {
                    $nom_tor[] = $Torneo_nom["tor_n"];
                  }

	            		$titulos[] = [
	                		$TenistasInfo["anno_titulo"]  => $nom_tor
	              		];
	          		}
	          		$equipo = [
	            		"id" => $TenistasInfo["id_tenista"],
	            		"nombre_tenista" => $TenistasInfo["nombre_tenista"],
	            		"apelldios" => $TenistasInfo["apelldios"],
                  "altura" => $TenistasInfo["altura"],
                  "año de nacimiento" => $TenistasInfo["nacimiento"],
	            		"titulos" => $titulos
	          		];
	        	}

	        	$datos = json_encode($equipo);
            echo "Información del tenista";
	        	header($headerJSON);
	        	($codigosHTTP["200"]);
	      	} else {
	        	$datos = json_encode(array('mensaje' => "No se encuentra el tenista recibido."));
            header ($headerJSON);
            header ($codigosHTTP["400"]);
	      	}

	  	} else {
          $datos = json_encode(array('mensaje' => "No se encuentra el tenista recibido."));
          header ($headerJSON);
          header ($codigosHTTP["400"]);
	  	}

    	$conexion = null;
    	print $datos;
    	exit();
  	}


    if ($_SERVER['REQUEST_METHOD'] == 'DELETE')
  	{
    	if (isset($_GET['id'])) {
      		$idTenista = $_GET['id'];

          $select = "SELECT * from tenistas where id=?";
          
	      	$consulta = $conexion->prepare($select);
	      	$consulta->bindParam(1, $idTenista);
	      	$consulta->execute();
	      
	      	if ($consulta->rowCount() > 0) {
	        	
            $delete = "DELETE FROM tenistas where id = ?";
            $consulta = $conexion->prepare($delete);
            $consulta->bindParam(1, $idTenista);
            $consulta->execute();
            
            if ($consulta->rowCount() > 0) {
              $datos = json_encode(array('mensaje' => "Borrado realizado"));
              header ($headerJSON);
              header ($codigosHTTP["200"]);
            } else {
              $datos = json_encode(array('mensaje' => "Error a la hora de borrar un tenista"));
              header ($headerJSON);
              header ($codigosHTTP["400"]);
            }
            
	      	}else{
            $datos = json_encode(array('mensaje' => "No se encuentra el tenista recibido."));
            header ($headerJSON);
            header ($codigosHTTP["404"]);
          }

	  	} else {
          $datos = json_encode(array('mensaje' => "No se encuentra el tenista recibido."));
          header ($headerJSON);
          header ($codigosHTTP["404"]);
	  	}

    	$conexion = null;
    	print $datos;
    	exit();
  	}
  
  /*
    Datos del tenista y una nueva clave con los titulos que tiene, que es una estructura en la que aparecen los nombres de los títulos agrupados por años
  */

  // ESCRIBA AQUI EL CÓDIGO PHP NECESARIO

  /*
    Borrar un tenista
  */

  // ESCRIBA AQUI EL CÓDIGO PHP NECESARIO

//En caso de que ninguna de las opciones anteriores se haya ejecutado
header ($headerJSON);
header ($codigosHTTP["400"]);
echo  $datos;
?>