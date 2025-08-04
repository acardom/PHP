<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios de Formularios</title>
</head>
<body>

    <h1>Ejercicio 1: Formularios Básicos con Método GET</h1>
    <form action="procesar.php" method="GET">
        Nombre: <input type="text" name="nombre"><br>
        Email: <input type="email" name="email"><br>
        Edad: <input type="number" name="edad"><br>
        <input type="submit" value="Enviar">
    </form>

    <h1>Ejercicio 1: Formularios Básicos con Método POST</h1>
    <form action="procesar.php" method="POST">
        Nombre: <input type="text" name="nombre"><br>
        Email: <input type="email" name="email"><br>
        Edad: <input type="number" name="edad"><br>
        <input type="submit" value="Enviar">
    </form>


    <h1>Ejercicio 2: Uso de Distintos Controles de Formulario</h1>
    <form action="procesar.php" method="POST">
        Nombre: <input type="text" name="nombre"><br>
        Comentario: <textarea name="comentario"></textarea><br>
        Contraseña: <input type="password" name="password"><br>
        Suscripción: <input type="checkbox" name="suscripcion[]" value="newsletter"> Newsletter<br>
        Género: 
        <input type="radio" name="genero" value="masculino" required> Masculino
        <input type="radio" name="genero" value="femenino" required> Femenino<br>
        País: 
        <select name="pais">
            <option value="usa">USA</option>
            <option value="esp">España</option>
            <option value="arg">Argentina</option>
        </select><br>
        <input type="submit" value="Enviar">
    </form>


    <h1>Ejercicio 3: Manejo de Archivos con input type="file"</h1>
    <form action="subir.php" method="POST" enctype="multipart/form-data">
        Seleccionar archivo: <input type="file" name="archivo"><br>
        <input type="submit" value="Subir">
    </form>


    <h1>Ejercicio 4: Formulario con Múltiples Botones de Envío</h1>
    <form action="procesar.php" method="POST">
        <input type="text" name="nombre" placeholder="Nombre"><br>
        <input type="submit" name="boton1" value="Enviar 1">
        <input type="submit" name="boton2" value="Enviar 2">
    </form>

    <h1>Ejercicio 5: Validación de Campos y Gestión de Errores</h1>
    <form action="validacion.php" method="POST">
        Nombre: <input type="text" name="nombre" ><br>
        Email: <input type="email" name="email"><br>
        <input type="submit" value="Enviar">
    </form>

    <h1>Ejercicio 6: Comprobación de números con is_numeric() y ctype_digit()</h1>
    <form action="validaciones.php" method="POST">
        Valor: <input type="text" name="valor"><br>
        <input type="submit" value="Validar">
    </form>

    <h1>Ejercicio 7: Comprobación de tipos de datos con funciones is_</h1>
    <form action="validaciones.php" method="POST">
        Valor: <input type="text" name="valor"><br>
        <input type="submit" value="Validar Tipo">
    </form>

    <h1>Ejercicio 8: Validación con funciones ctype_</h1>
    <form action="validaciones.php" method="POST">
        Valor: <input type="text" name="valor"><br>
        <input type="submit" value="Validar">
    </form>

    <h1>Ejercicio 9: Validación con filter_var()</h1>
    <form action="validaciones.php" method="POST">
        Correo Electrónico: <input type="email" name="email"><br>
        URL: <input type="url" name="url"><br>
        <input type="submit" value="Validar">
    </form>

</body>
</html>
