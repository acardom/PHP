<?php

    // Incluye ficheros de variables y funciones

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de departamentos</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <h1>Listado de departamentos usando fetch (PDO::FETCH_BOUND)</h1>

        <table border="1" cellpadding="10">
            <thead>
                <th>Departamento</th>
                <th>Presupuesto</th>
                <th>Sede</th>
            </thead>

            <?php
                try
                {
                    $mysql ="mysql:host=localhost;dbname=dwes_tarde_empresa;charset=UTF8";
                    $user = "dwes_tarde";
                    $password = "dwes_2223";
                    $opciones = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
                    $conexion = new PDO($mysql, $user, $password);
                }
                catch (PDOException $e)
                {
                    echo "<p>" .$e->getMessage()."</p>";
                    exit();
                }
                $resultado = $conexion->query('select * FROM departamentos d, sedes s where d.sede_id = s.id');
                $resultado->bindColumn(6, $sede);
                $resultado->bindColumn(2, $nombre);
                $resultado->bindColumn(3, $presupuesto);
                $resultado->bindColumn(1, $idDep);
                while ($registro = $resultado->fetch(PDO::FETCH_BOUND)) {
                    echo"<tbody>";
                    echo "<th>$nombre</th>";
                    echo "<th>$presupuesto</th>";
                    echo "<th>$sede</th>";
                    echo "<th><a href=modificar.php?idDepartamento=$idDep class=estilo_enlace>&#9998</a></th>";
                    echo "<th><a href=borrar.php?idDepartamento=$idDep class=estilo_enlace>borrar</a></th>";
                    echo"</tbody>";
                }
                $conexion = null;
            ?>  

            <tbody>
                
                <!-- Muestra los datos -->
                
            </tbody>
        </table>
        <div class="contenedor">
            <div class="enlaces">
                <a href="../index.php">Volver a página de listados</a>
                <a href="nuevo.php">Crear nuevo Departamento</a>
            </div>
        </div>

    
    <?php

        // Libera el resultado y cierra la conexión
    
    ?>
</body>
</html>