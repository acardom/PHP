<?php
include 'funciones.php';

$pelicula_id = $_GET['pelicula_id'];
$sesion_id = $_GET['sesion_id'];
$_SESSION['pelicula_id'] = $pelicula_id;
$_SESSION['sesion_id'] = $sesion_id;
$asientos = obtenerAsientosDisponibles($pelicula_id, $sesion_id);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Selección de Asientos</title>
    <link rel="stylesheet" href="style.css">
    <script>
        // Función para habilitar o deshabilitar el botón "Reservar Asientos"
        function validarAsientos() {
            const checkboxes = document.querySelectorAll('input[name="asientos[]"]:checked');
            const btnReservar = document.getElementById('btnReservar');
            btnReservar.disabled = checkboxes.length === 0;  // Si no hay asientos seleccionados, deshabilitar el botón
        }

        // Verifica si se han seleccionado asientos al enviar el formulario
        function validarFormulario(event) {
            const checkboxes = document.querySelectorAll('input[name="asientos[]"]:checked');
            if (checkboxes.length === 0) {
                alert("Debes seleccionar al menos un asiento.");
                event.preventDefault();  // Prevenir el envío del formulario
            }
        }
    </script>
</head>
<body>
    <div class="container">
        <h1>Selecciona tus Asientos</h1>
        <form action="pago.php" method="post" onsubmit="validarFormulario(event)">
            <?php foreach ($asientos as $fila => $asientos_fila): ?>
                <h2></h2>
                <div class="asientos">
                    <?php foreach ($asientos_fila as $asiento): ?>
                        <label>
                            <input type="checkbox" name="asientos[]" value="<?php echo $asiento; ?>" onchange="validarAsientos()"> <?php echo $asiento; ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
            <br/>
            <input type="submit" id="btnReservar" value="Reservar Asientos" disabled>
        </form>
    </div>
</body>
</html>
