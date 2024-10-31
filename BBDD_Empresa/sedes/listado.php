<?php

    // Incluye ficheros de variables y funciones

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de sedes</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <h1>Listado de sedes usando fetch (PDO::FETCH_ASSOC)</h1>

    <table border="1" cellpadding="10">
        <thead>
            <th>Nombre</th>
            <th>Dirección</th>
        </thead>
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
                $resultado = $conexion->query('select * FROM sedes');
                while ($registro = $resultado->fetch(PDO::FETCH_ASSOC)) {
                    echo"<tbody>";
                    echo "<th>".$registro['nombre']."</th>";
                    echo "<th>".$registro['direccion']."</th>";
                    echo "<th><a href=modificar.php?idSede=".$registro['id']." class=estilo_enlace>&#9998</a></th>";
                    echo "<th><a href=borrar.php?idSede=".$registro['id']." class=estilo_enlace>borrar</a></th>";
                    echo"</tbody>";
            }
            $conexion = null;       
            ?>
    </table>
    <div class="contenedor">
        <div class="enlaces">
            <a href="../index.php">Volver a página de listados</a>
            <a href="nuevo.php">Crear nueva sede</a>
        </div>
    </div>

    <?php

        // Libera el resultado y cierra la conexión
    
    ?>
</body>
</html>