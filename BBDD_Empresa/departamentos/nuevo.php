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
    <h1>Alta de un nuevo departamento</h1>

	<form action="nuevo.php">
        <p>nombre departamento:  <input type=text name=nom_dep size=30 maxlength=50 minlength=3 required></p>
        <p>presupuesto:  <input type=number name=presu size=30 min=0 required></p>

        <p> selecciona una de estas sedes 
        <select name="sedes" id="sedes">
            <option value="1">sede central</option>
            <option value="2">sede sur</option>
            <option value="3">sede noreste</option>
        </select>
        </p>
        <p>
            <input type="submit" value="Guardar">
            <input type="reset" value="Borrar">
        </p>
	</form>
    
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
        $nombre = "";
        $presupuesto = 0;
        $sede = 0;
        $nombre = recoge("nom_dep");
        $presupuesto = recoge("presu");
        $sede = recoge("sedes");

        if ($nombre != "" and $presupuesto != 0 and $sede != 0){
            $valido = true;
        }

        if ($nombre != ""){  
            $resultado=$conexion->query("select nombre from departamentos where upper(nombre) like '$nombre'");
            $count = $resultado->fetchColumn();   
            if ($count == $nombre){
                $valido = false;
                echo "nombre $nombre es invalido, esta repetido";
            }else{
                $valido = true;
            }
        }   

        if ($valido == true){
            $consulta = $conexion->prepare("insert into departamentos (nombre, presupuesto, sede_id) values (?,?,?)");
            $consulta->bindParam(1, $nombre);
            $consulta->bindParam(2, $presupuesto);
            $consulta->bindParam(3, $sede);
            $consulta->execute();
            header('Location: listado.php'); 
        }

        $conexion = null;
    ?>

   <div class="contenedor">
        <div class="enlaces">
            <a href="listado.php">Volver al listado de departamentos</a>
        </div>
   </div>
</body>
</html>