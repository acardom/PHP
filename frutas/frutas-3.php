<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" title="Color">
</head>

<body>
  <h2>Fruta preferida (Formulario)</h2>

  <form action="frutas-4.php" method="get">
  
  <p><h3>¿Le gusta la fruta?</h3>
      <label><input type="radio" name="gusta" value="si" required> Sí</label><br>
      <label><input type="radio" name="gusta" value="no" required> No</label><br>

 <p><h3>Selecciona sus frutas favoritas (usa la tecla CTRL):</h3>
  <p><select name="frutas[]" size="6" multiple>
  <option value="cerezas">Cereza</option> 
  <option value="fresa">Fresa</option>
  <option value="limon">Limón</option>
  <option value="manzana">Manzana</option>
  <option value="naranja">Naranja</option>
  <option value="pera">Pera</option>
</select>

<p><h3>De las que no están en la lista, enumere otras frutas que le gusten: </h3></p>
  <input type="text" name="otras" size="40" maxlength="20"></p>

</p>
<p>
      <input type="submit" value="Enviar">
      <input type="reset" value="Borrar">
    </p>
  </form>

</body>
</html>
