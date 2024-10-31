
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de empleados</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <h1>Listado de empleados (filtrar por salario y/o número de hijos)</h1>
    <div style="margin-bottom: 1em">
      <fieldset style="width:50%">
        <legend>Filtrado</legend>
        <form name="filtrar" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
          <p><label for="texto">Texto <input type="text" name="texto"></label>
          </p>
          <p><label for="salarioMinimo">Salario mínimo <input value=0 type="number" step="0.01" name="salarioMinimo" min="0"></label>
          <label for="salarioMaximo">Salario Máximo <input value=0 type="number" step="0.01" name="salarioMaximo" min="0"></label>
          </p>
          <p>Hijos: <select name="hijos" >
            <option value="" >Seleccione el número de hijos</option>
            <?php
              for ($i=0; $i<=10; $i++):
            ?>
                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
            <?php
              endfor;
            ?>
          </select>
          </p>
          <input type="submit" value="Filtrar">
        </form>
      </fieldset>
    </div>
      
        <table border="1" cellpadding="10">
          <thead>
              <th>Nombre</th>
              <th>Apellidos</th>
              <th>Correo electrónico</th>
              <th>Nº hijos</th>
              <th>Salario</th>
              <th>Nacionalidad</th>
              <th>Departamento</th>
              <th>Sede</th>
          </thead>
          
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
            
            $texto = recoge("texto");
            $max = recoge("salarioMaximo");
            $min = recoge("salarioMinimo");
            $hijos = recoge("hijos");

            try{
                $mysql ="mysql:host=localhost;dbname=dwes_tarde_empresa;charset=UTF8";
                $user = "dwes_tarde";
                $password = "dwes_2223";
                $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                $conexion = new PDO($mysql, $user, $password);
            }catch (PDOException $e){
                echo "<p>" .$e->getMessage()."</p>";
                exit();
            }

            if ((recoge("salarioMaximo")==0) and (recoge("hijos") == "")){
              $resultado = $conexion->query("select e.nombre as nombre, e.apellidos as apellidos, e.email as correo, e.hijos as hijos, e.salario as salario, p.nacionalidad as nacionalidad, 
              d.nombre as departamento, s.nombre as sede FROM paises p, departamentos d, sedes s, empleados e where d.sede_id = s.id and e.departamento_id=d.id and e.pais_id = p.id
              and e.salario > '$min' and e.salario < (select max(salario) from empleados) and (e.nombre like '%$texto%' or e.apellidos like '%$texto%' or e.email like '%$texto%') 
              group by e.id");
            } elseif (recoge("salarioMaximo")==0){
              $resultado = $conexion->query("select e.nombre as nombre, e.apellidos as apellidos, e.email as correo, e.hijos as hijos, e.salario as salario, p.nacionalidad as nacionalidad, 
              d.nombre as departamento, s.nombre as sede FROM paises p, departamentos d, sedes s, empleados e where d.sede_id = s.id and e.departamento_id=d.id and e.pais_id = p.id
              and e.salario > '$min' and e.salario < (select max(salario) from empleados) and e.hijos = '$hijos' and (e.nombre like '%$texto%' or e.apellidos like '%$texto%' or e.email like '%$texto%') 
              group by e.id");
            } elseif (recoge("hijos") == ""){
              $resultado = $conexion->query("select e.nombre as nombre, e.apellidos as apellidos, e.email as correo, e.hijos as hijos, e.salario as salario, p.nacionalidad as nacionalidad, 
              d.nombre as departamento, s.nombre as sede FROM paises p, departamentos d, sedes s, empleados e where d.sede_id = s.id and e.departamento_id=d.id and e.pais_id = p.id
              and e.salario > '$min' and e.salario < '$max' and (e.nombre like '%$texto%' or e.apellidos like '%$texto%' or e.email like '%$texto%') 
              group by e.id");
            } else {
              $resultado = $conexion->query("select e.nombre as nombre, e.apellidos as apellidos, e.email as correo, e.hijos as hijos, e.salario as salario, p.nacionalidad as nacionalidad, 
              d.nombre as departamento, s.nombre as sede FROM paises p, departamentos d, sedes s, empleados e where d.sede_id = s.id and e.departamento_id=d.id and e.pais_id = p.id
              and  e.salario > '$min' and e.salario < '$max' and e.hijos = $hijos and (e.nombre like '%$texto%' or e.apellidos like '%$texto%' or e.email like '%$texto%')
              group by e.id");
            }

            while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                echo"<tbody>";
                echo "<th>".$registro['nombre']."</th>";
                echo "<th>".$registro['apellidos']."</th>";
                echo "<th>".$registro['correo']."</th>";
                echo "<th>".$registro['hijos']."</th>";
                echo "<th>".$registro['salario']."</th>";
                echo "<th>".$registro['nacionalidad']."</th>";
                echo "<th>".$registro['departamento']."</th>";
                echo "<th>".$registro['sede']."</th>";
                echo"</tbody>";
            }
            $conexion = null;                      

          ?>

        </table>
      
      <div class="contenedor">
          <div class="enlaces">
              <a href="../index.php">Volver a página de listados</a>
          </div>
      </div>

    <?php

        // Libera el resultado y cierra la conexión
    
    ?>
</body>
</html>
