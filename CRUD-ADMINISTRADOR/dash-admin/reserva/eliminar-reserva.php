<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');
$database = new Database();
$conexion = $database->getConnection();

if (isset($_GET['id_reserva'])) {
    $id_reserva = $_GET['id_reserva'];

    $sql = "DELETE FROM reserva WHERE id_reserva = :id_reserva";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id_reserva', $id_reserva, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "Reserva eliminada correctamente.";
    } else {
        echo "Error al eliminar la reserva.";
    }
}
?>

<!-- Enlace para eliminar reserva -->
<a href="eliminar-reserva.php?id_reserva=<?php echo $id_reserva; ?>" onclick="return confirm('¿Estás seguro de eliminar esta reserva?')">Eliminar Reserva</a>
