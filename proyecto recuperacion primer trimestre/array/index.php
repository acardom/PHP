<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="array.css">
  <meta charset="UTF-8">
  <title>Juego</title>
</head>

<body>
  <nav class="todo">
    <h1>Buscar en array</h1>

    <?php
    session_name("array");
    session_start();


    echo "<form action=\"array.php\" method=\"get\">";
    echo "<p>Introduce el nombre del departamento: <br/><br/> "."  <input type=\"text\" name=\"nombre\" size=\"20\" maxlength=\"20\">"; 


    if (isset($_SESSION["mostrar"])) {
        print "</br></br><class=\"aviso\">$_SESSION[mostrar]</p>\n";

        if (isset($_SESSION["empleados"])){
          foreach ($_SESSION["empleados"] as $key ) {
            print "$key";
          }
        }
    } 

    ?>
      <p>
        <input type="submit" value="buscas">
        <input type="reset" value="Borrar">
      </p>
    </form>

  </nav>  
</body>
</html>