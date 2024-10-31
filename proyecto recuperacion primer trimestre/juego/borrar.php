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
    <h1>Datos Borrados</h1>
    <?php
    session_name("registro");
    session_start();

    echo "<form action=\"borrar2.php\" method=\"get\">";
    echo "¿Está seguro de borrar los datos? <p> ";
    echo "<label><input type=\"radio\" name=\"borra\" value=\"1\">Sí</label><br>";
    echo "<label><input type=\"radio\" name=\"borra\" value=\"2\">No</label><br><br>";

    echo "<input type=\"submit\" value=\"Enviar\">";
    ?>
  </nav>
  
</body>
</html>