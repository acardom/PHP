<?php
if (!empty($_POST['nombre']) && !empty($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    echo "Datos validados correctamente.";
} else {
    echo "Por favor completa todos los campos correctamente.";
}
?>