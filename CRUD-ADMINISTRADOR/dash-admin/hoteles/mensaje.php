<?php
if (isset($_GET['status']) && $_GET['status'] == 'success') {
    echo "Actualización correcta.";
} else {
    echo "Hubo un problema al actualizar los datos.";
}
?>
