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

  if($_SERVER["REQUEST_METHOD"] == "POST"){

    $datos=json_decode(file_get_contents("php://input"), true);
    $id_torneo=$datos["torneo_id"];
    $id_tenista=$datos["tenista_id"];
    $anno_titulo=$datos["anno"];

    $select = "SELECT * FROM titulos where anno = ? and torneo_id = ?";
    $consulta = $conexion->prepare($select);
    $consulta->bindParam(1, $anno_titulo);
    $consulta->bindParam(2, $id_torneo);
    $consulta->execute();
    $validartitulo = $consulta->fetchColumn();
    $consulta = null;

    if ($validartitulo == 0){
      $conexion=conectarPDO($database);
      $consulta= $conexion->prepare("INSERT INTO titulos (anno, torneo_id, tenista_id) values (?,?,?)");
      $consulta->bindParam(1,$anno_titulo);
      $consulta->bindParam(2,$id_torneo); 
      $consulta->bindParam(3,$id_tenista); 
      $consulta->execute();

      header ($headerJSON);
      header ($codigosHTTP["200"]);
    }else{
      $datos = json_encode(array('mensaje' => "Ya hay un tenista que ha ganado ese torneo en ese año"));
      header ($headerJSON);
      header ($codigosHTTP["400"]);     
    }
  }

  else{
    header ($headerJSON);
    header ($codigosHTTP["400"]);
    $datos = json_encode(array('mensaje' => "Error en la ejecución de la consulta."));
  }

  // ESCRIBA AQUI EL CÓDIGO PHP NECESARIO

  /*
    Insertar título tenista
  */

  // ESCRIBA AQUI EL CÓDIGO PHP NECESARIO

//En caso de que ninguna de las opciones anteriores se haya ejecutado
header ($headerJSON);

?>