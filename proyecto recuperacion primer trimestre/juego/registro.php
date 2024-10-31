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

    if (isset($_SESSION["usuario"])) {
        print "  <p>Usted ya ha escrito que su nombre es: <strong>$_SESSION[usuario]</strong></p>\n";
    }
    echo "<form action=\"registro2.php\" method=\"get\">";
    echo "<p>Escriba su usuario:  "."  <input type=\"text\" name=\"usuario\" size=\"20\" maxlength=\"20\">";
    if (isset($_SESSION["avisoUsuario"])) {
        print "  <class=\"aviso\">$_SESSION[avisoUsuario]</p>\n";
    } 


    if (isset($_SESSION["contraseña"])) {
        print "  <p>Usted ya ha escrito que su contraseña es: <strong>$_SESSION[contraseña]</strong></p>\n";
    }
    echo "<form action=\"registro2.php\" method=\"get\">";
    echo "<p>Escriba su contraseña:  "."  <input type=\"password\" name=\"contraseña\" size=\"20\" maxlength=\"20\">";
    if (isset($_SESSION["avisoContraseña"])) {
        print "  <class=\"aviso\">$_SESSION[avisoContraseña]</p>\n";
    } 


    if (isset($_SESSION["gmail"])) {
        print "  <p>Usted ya ha escrito que su gmail es: <strong>$_SESSION[gmail]</strong></p>\n";
    }
    echo "<form action=\"registro2.php\" method=\"get\">";
    echo "<p>Escriba su gmail:  "."  <input type=\"email\" name=\"gmail\" size=\"20\" maxlength=\"20\">";
    if (isset($_SESSION["avisoGmail"])) {
        print "  <class=\"aviso\">$_SESSION[avisoGmail]</p>\n";
    } 

    ?>
      <p>
        <input type="submit" value="Guardar">
        <input type="reset" value="Borrar">
      </p>
    </form>

    <p><a href="index.php" >Volver al inicio.</a></p>
  
  </nav>

</body>
</html>