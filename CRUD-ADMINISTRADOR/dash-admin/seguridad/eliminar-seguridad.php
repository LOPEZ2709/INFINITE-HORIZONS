<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');
$database = new Database();
$conexion = $database->getConnection();

if (isset($_GET['id_seguridad'])) {
    $id_seguridad = $_GET['id_seguridad'];
    $sql = "DELETE FROM seguridad WHERE id_seguridad = :id_seguridad";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id_seguridad', $id_seguridad);

    if ($stmt->execute()) {
        echo "<p>Datos de seguridad eliminados correctamente.</p>";
    } else {
        echo "<p>Error al eliminar los datos de seguridad.</p>";
    }
}
?>
