<meta charset="utf-8">
<?php
require_once("validaciones.php");
session_name("registro");
session_start();

$usuario = obtenerValorCampo("usuario");
$contraseña = obtenerValorCampo("contraseña");
$gmail = obtenerValorCampo("gmail");
$volver = false;

if ($usuario == "") {
    $_SESSION["avisoUsuario"] = "No ha escrito su usuario";
    header("Location:registro.php");
    exit;
}else{
    $volver = true;
}

if ($contraseña == "") {
    $_SESSION["avisoContraseña"] = "No ha escrito su Contraseña";
    header("Location:registro.php");
    exit;
}else{
    $volver = true;
}
if ($gmail == "") {
    $_SESSION["avisoGmail"] = "No ha escrito su gmail";
    
    exit;
}else{
    $volver = true;
}


if ($volver = true) {
    unset($_SESSION["avisoUsuario"]);
    $_SESSION["usuario"] = $usuario;
    unset($_SESSION["avisoContraseña"]);
    $_SESSION["contraseña"] = $contraseña;
    unset($_SESSION["avisoGmail"]);
    $_SESSION["gmail"] = $gmail;
    header("Location:index.php");
    exit;
}

?>
