<?php
if (isset($_POST['valor'])) {
    if (is_numeric($_POST['valor'])) {
        echo "El valor es numérico.";
    } elseif (ctype_digit($_POST['valor'])) {
        echo "El valor contiene solo dígitos.";
    } elseif (ctype_alpha($_POST['valor'])) {
        echo "El valor contiene solo letras.";
    } elseif (filter_var($_POST['valor'], FILTER_VALIDATE_EMAIL)) {
        echo "El valor es un correo válido.";
    }
}
?>