<?php

    // Incluye ficheros de variables y funciones

?>
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
    <h1>Listado de departamentos usando fetch (PDO::FETCH_ASSOC)</h1>
        
    <table border="1" cellpadding="10" style="margin-bottom: 10px;">
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
                try{
                    $mysql ="mysql:host=localhost;dbname=dwes_tarde_empresa;charset=UTF8";
                    $user = "root";
                    $password = "";
                    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                    $conexion = new PDO($mysql, $user, $password);
            }catch (PDOException $e){
                    echo "<p>" .$e->getMessage()."</p>";
                    exit();
                }
                $resultado = $conexion->query('select e.id as id, e.nombre as nombre, e.apellidos as apellidos, e.email as correo, e.hijos as hijos, e.salario as salario, p.nacionalidad as nacionalidad, 
                d.nombre as departamento, s.nombre as sede FROM paises p, departamentos d, sedes s, empleados e where d.sede_id = s.id and e.departamento_id=d.id and e.pais_id = p.id;');
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
                    echo "<th><a href=modificar.php?idEmpleado=".$registro['id']." class=estilo_enlace>&#9998</a></th>";
                    echo "<th><a href=borrar.php?idEmpleado=".$registro['id']." class=estilo_enlace>borrar</a></th>";
                    echo"</tbody>";
            }
            $conexion = null;       
        ?>

    </table>
        
    <div class="contenedor">
        <div class="enlaces">
            <a href="../index.php">Volver a página de listados</a>
            <a href="nuevo.php">Crear nuevo empleado</a>
        </div>
    </div>
    <?php

        // Libera el resultado y cierra la conexión
    
    ?>
</body>
</html>