<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de empleados</title>
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
    <script type="text/javascript">
        function ordenarListado(campo, orden)
        {
            location.href = "listado_ordenar.php?orden="+campo+"&sentido="+orden;
            $campoOrdenar = campo;
            $sentidoOrdenar = orden;
        }
    </script>
</head>
<body>
    <h1>Listado de departamentos usando fetch (PDO::FETCH_OBJ)</h1>

        <table border="1" cellpadding="10">
            <thead>
                <th>Nombre <a href="javascript: void(0);" onclick="ordenarListado('nombre', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('nombre', 'DESC')">&#8595</a></th>
                <th>Apellidos <a href="javascript: void(0);" onclick="ordenarListado('apellidos', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('apellidos', 'DESC')">&#8595</a></th>
                <th>Correo electrónico <a href="javascript: void(0);" onclick="ordenarListado('email', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('email', 'DESC')">&#8595</a></th>
                <th>Nº hijos <a href="javascript: void(0);" onclick="ordenarListado('hijos', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('hijos', 'DESC')">&#8595</a></th>
                <th>Salario <a href="javascript: void(0);" onclick="ordenarListado('salario', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('salario', 'DESC')">&#8595</a></th>
                <th>Nacionalidad <a href="javascript: void(0);" onclick="ordenarListado('nacionalidad', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('nacionalidad', 'DESC')">&#8595</a></th>
                <th>Departamento <a href="javascript: void(0);" onclick="ordenarListado('departamento', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('departamento', 'DESC')">&#8595</a></th>
                <th>Sede <a href="javascript: void(0);" onclick="ordenarListado('sede', 'ASC')">&#8593</a> <a href="javascript: void(0);" onclick="ordenarListado('sede', 'DESC')">&#8595</a></th>
            </thead>

            <?php

                $camposOrdenacion = ["nombre", "apellidos", "email", "hijos", "salario", "nacionalidad", "departamento", "sede"];
                if (isset($_GET["orden"])) 
                {
                    $campoOrdenar = $_GET["orden"];
                    if (!in_array($campoOrdenar,$camposOrdenacion)) 
                    {
                        $campoOrdenar = $camposOrdenacion[0];
                    }
                } else {
                    $campoOrdenar = $camposOrdenacion[0];
                }

                $sentidosOrdenacion = ["ASC","DESC"];
                if (isset($_GET["sentido"])) 
                {
                    $sentidoOrdenar = $_GET["sentido"];
                    if (!in_array($sentidoOrdenar,$sentidosOrdenacion)) 
                    {
                        $sentidoOrdenar = $sentidosOrdenacion[0];
                    }
                } else {
                    $sentidoOrdenar = $sentidosOrdenacion[0];
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
                
                $resultado = $conexion->query("select e.nombre as nombre, e.apellidos as apellidos, e.email as correo, e.hijos as hijos, e.salario as salario, p.nacionalidad as nacionalidad, 
                d.nombre as departamento, s.nombre as sede FROM paises p, departamentos d, sedes s, empleados e where d.sede_id = s.id and e.departamento_id=d.id and e.pais_id = p.id
                order by $campoOrdenar $sentidoOrdenar;");

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