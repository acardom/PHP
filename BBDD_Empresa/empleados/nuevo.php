<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alta nuevo departamento</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <h1>Alta de un nuevo empleado</h1>

	<form action="nuevo.php">
        <p>nombre empleado:  <input type=text name=nombre size=30 maxlength=50 minlength=3 required></p>
		<p>apellidos:  <input type=text name=apellido size=30 maxlength=150 minlength=3 required></p>
		<p>correo electronico:  <input type=email name=correo size=30 maxlength=120 required></p>
        <p>salario:  <input type=number name=salar size=30 min=0 required placeholder='0.00'></p>
		<p>numero de hijos:  <input type=number name=hijos size=30 min=0 max=10 required></p>

        <select name="departamentos" id="departamentos">
            <option value="0">Eligue departamento</option>
            <?php
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
                $resultado = $conexion->query('select nombre, id from departamentos;');
                while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='".$registro['id']."'>".$registro['nombre']."</option>";
                    }
                    
            ?>
        </select>

        <select name="nacionalidad" id="nacionalidad">
            <option value="0">Eligue nacionalidad</option>
            <?php
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
                $resultado = $conexion->query('select nacionalidad, id from paises;');
                while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo "<option value='".$registro['id']."'>".$registro['nacionalidad']."</option>";
                    }
            ?>
        </select>
        

        <p>
            <input type="submit" value="Guardar">
            <input type="reset" value="Borrar">
        </p>

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

		$valido = false;
        $nombre = recoge("nombre");
        $apellidos = recoge("apellido");
        $correo = recoge("correo");
		$salario = recoge("salar");
        $hijos = recoge("hijos");
        $departamento = recoge("departamentos");
        $nacionalidad = recoge("nacionalidad");

        if ($nombre != "" and $apellidos != "" and $correo != "" and $salario >= 0 and $departamento != 0 and $nacionalidad != 0){
            $valido = true;
        }
 
        if ($valido == true){
            $consulta = $conexion->prepare("insert into empleados (nombre, apellidos, email, salario, hijos, departamento_id, pais_id) values (?,?,?,?,?,?,?)");
            $consulta->bindParam(1, $nombre);
            $consulta->bindParam(2, $apellidos);
            $consulta->bindParam(3, $correo);
            $consulta->bindParam(4, $salario);
            $consulta->bindParam(5, $hijos);
            $consulta->bindParam(6, $departamento);
            $consulta->bindParam(7, $nacionalidad);
            $consulta->execute();
        }

        $conexion = null;
    ?>

	</form>

    <div class="contenedor">
        <div class="enlaces">
            <a href="listado.php">Volver al listado de empleados</a>
        </div>
   </div>
</body>
</html>