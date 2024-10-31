<meta charset="utf-8">
<?php
require_once("validaciones.php");
require_once("empresa.php");
session_name("array");
session_start();

$nombre = obtenerValorCampo("nombre");
$existe = false;
$planta = "";
$responsable = "";
$empleados = array();
$_SESSION["empleados"] = $empleados;

foreach ($trabajadores as $key => $value) {
    if ($nombre == $key){
        array_push($_SESSION["empleados"], "<br/> Empleados: <br/>");
        foreach ($trabajadores["$nombre"] as $key => $value) {
            if ($key == "planta"){
                $planta = $value;
                $existe = true;
            }elseif ($key == "responsable"){
                $responsable = $value;
                $existe = true;
            }
        }
    }else{
        $existe = false;
    }
}

foreach ($trabajadores["$nombre"]["empleados"] as $key => $value) {
    foreach ($value as $key => $val) {
        if ($key == "año"){
            array_push($_SESSION["empleados"], "<br/>Año: $val");
        }elseif ($key == "genero"){
            array_push($_SESSION["empleados"], "<br/>Genero: $val");
        }elseif ($key == "nombre"){
            array_push($_SESSION["empleados"], "<br/>Nombre: $val");
        }elseif ($key == "sueldo"){
            array_push($_SESSION["empleados"], "<br/>Sueldo: $val");
        }elseif ($key == "formación"){
            array_push($_SESSION["empleados"], "<br/>Formación: $val");
        }elseif ($key == "localidad"){
            array_push($_SESSION["empleados"], "<br/>Localidad: $val");
        }
    }
    array_push($_SESSION["empleados"], "<br/>");
}


if($planta != "" or $responsable != ""){
    $_SESSION["mostrar"] = "Nombre: $nombre 
    <br/> Responsable: $responsable 
    <br/> Planta: $planta $tod";
    header("Location:index.php");
}else{
    $_SESSION["mostrar"] = "El departamento  $nombre  no existe";
    header("Location:index.php");
}
 

?>