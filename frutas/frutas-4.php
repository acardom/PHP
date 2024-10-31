<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"  title="Color">
</head>

<body>
  <h2>Fruta preferida</h2>

  <p><h3>Este es el resultado de la encuesta</p></h3>

  <?php
function recoge($var, $m = "")
{
    $tmp = is_array($m) ? [] : "";
    if (isset($_REQUEST[$var])) {
        if (!is_array($_REQUEST[$var]) && !is_array($m)) {
            $tmp = trim(htmlspecialchars($_REQUEST[$var]));
        } elseif (is_array($_REQUEST[$var]) && is_array($m)) {
            $tmp = $_REQUEST[$var];
            array_walk_recursive($tmp, function (&$valor) {
                $valor = trim(htmlspecialchars($valor));
            });
        }
    }
    return $tmp;
}

$fruta = recoge("frutas", []);
$gusta = recoge("gusta");
$otras = recoge("otras");

if($gusta=="si"){
  if(count($fruta)==0)
  {
    if(!$otras=="" && $gusta=="si")
    {
      Echo "<p>Te gustan estas frutas: $otras.";
    }
    elseif($otras=="" && $gusta=="si")
    {
    echo "<p>Debes elegir al menos una fruta</p>";
    }
  }
    else{
          echo "<p>Tus frutas favoritas son: </p>";
          foreach($fruta as $tipo)
          {
            $name = $tipo;
            print "<img src=\"img/$name.svg\" width=\"50\">";
          }
          if(!$otras==""){
          Echo "<p>Tambié te gustan estas frutas: $otras.";
          }
        }       
}

else{
  echo "<p>No te gustan las frutas</p>";
}




?>

  <p><a href="frutas-3.php">Volver al formulario.</a></p>
</body>
</html>
