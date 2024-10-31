<meta charset="utf-8">
<?php
require_once("validaciones.php");
session_name("registro");
session_start();

$usuario = obtenerValorCampo("usuario");
$contraseña = obtenerValorCampo("contraseña");
$gmail = obtenerValorCampo("gmail");
$volver = false;

if ($_SESSION["usuario"] = $usuario and $_SESSION["contraseña"] = $contraseña and $_SESSION["gmail"] = $gmail) {
    header("Location:juego.php");
}else{
    $_SESSION["UsuarioIncorrecto"] = "Datos no validos";
    header("Location:inicio.php");
}

?>