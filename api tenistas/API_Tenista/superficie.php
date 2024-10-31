<?php
 /**
 * Ejercicio - API
 *
 * @author alberto cárdeno domínguez
 */

  require_once("../utiles/config.php");
  require_once("../utiles/funciones.php");
  $datos = "";
  $conexion=conectarPDO($database);

  // ESCRIBA AQUI EL CÓDIGO PHP NECESARIO
  
  if($_SERVER["REQUEST_METHOD"] =="PUT"){

    $datos2=json_decode(file_get_contents("php://input"), true);
    $superficie=$datos2["id"];
    $nombre=$datos2["nombre"];

    $select = "SELECT count(*) from superficies where id = ?";
    $consulta = $conexion->prepare($select);
    $consulta->bindParam(1, $superficie);
    $consulta->execute();
    $validarsuperficie = $consulta->fetchColumn();
    $consulta = null;

    if ($validarsuperficie == 0){
      $datos = json_encode(array('mensaje' => "No se encuentra la superficie recibida."));
      header ($headerJSON);
      header ($codigosHTTP["400"]);
    }else{
      $conexion=conectarPDO($database);
      $consulta= $conexion->prepare("UPDATE superficies SET nombre=? where id=?");
      $consulta->bindParam(1,$nombre);
      $consulta->bindParam(2,$superficie); 
      $consulta->execute();
      json_encode($consulta);
      $datos = json_encode(array('mensaje' => "Actualización correcta."));
      header ($headerJSON);
      header ($codigosHTTP["200"]);
    }
  }

  else{
    header ($headerJSON);
    header ($codigosHTTP["400"]);
    $datos = json_encode(array('mensaje' => "Error en la ejecución de la consulta de actualización."));
  }

  /*
    Actualizar una superfice
  */
  
  
  // ESCRIBA AQUI EL CÓDIGO PHP NECESARIO
  
//En caso de que ninguna de las opciones anteriores se haya ejecutado
header ($headerJSON);
header ($codigosHTTP["400"]);
print $datos;

?>