<?php
if ($_FILES['archivo']['error'] == UPLOAD_ERR_OK) {
    $nombreArchivo = $_FILES['archivo']['name'];
    echo "Archivo subido exitosamente.";
} else {
    echo "Error en la subida del archivo.";
}
?>