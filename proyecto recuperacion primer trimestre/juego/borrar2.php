<?php
session_name("registro");
session_start();

$respuesta=$_REQUEST["borra"];
if ($respuesta==1){
  session_destroy();
  header("Location:index.php");
}else{
  header("Location:index.php");

}

?>