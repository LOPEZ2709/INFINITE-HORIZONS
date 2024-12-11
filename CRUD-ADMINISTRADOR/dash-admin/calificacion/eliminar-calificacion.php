<?php
include('../../conexion.php');

if (isset($_GET['id_reserva'])) {
    $id_reserva = $_GET['id_reserva'];

    $sql = "DELETE FROM reservas WHERE id_reserva = '$id_reserva'";

    if (mysqli_query($conexion, $sql)) {
        header('Location: reserva.php?mensaje=Reserva eliminada');
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>
