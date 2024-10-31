<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="juego.css">
  <meta charset="UTF-8">
  <title>Juego</title>
</head>

<body>
  <nav class="todo">
    <h1>Introduzca sus datos</h1>

    <?php
    session_name("registro");
    session_start();


    echo "<form action=\"inicio2.php\" method=\"get\">";
    echo "<p>Escriba su usuario:  "."  <input type=\"text\" name=\"usuario\" size=\"20\" maxlength=\"20\">"; 
    echo "<form action=\"inicio2.php\" method=\"get\">";
    echo "<p>Escriba su contraseña:  "."  <input type=\"password\" name=\"contraseña\" size=\"20\" maxlength=\"20\">";
    echo "<form action=\"inicio2.php\" method=\"get\">";
    echo "<p>Escriba su gmail:  "."  <input type=\"email\" name=\"gmail\" size=\"20\" maxlength=\"20\">";

    if (isset($_SESSION["UsuarioIncorrecto"])) {
        print "</br></br><class=\"aviso\">$_SESSION[UsuarioIncorrecto]</p>\n";
    } 

    ?>
      <p>
        <input type="submit" value="Iniciar">
        <input type="reset" value="Borrar">
      </p>
    </form>

    <p><a href="index.php">Volver al inicio.</a></p>
  </nav>  
</body>
</html>