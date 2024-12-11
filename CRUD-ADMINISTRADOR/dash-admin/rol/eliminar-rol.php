<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');
$database = new Database();
$conexion = $database->getConnection();

if (isset($_GET['idRol'])) {
    $idRol = $_GET['idRol'];
    $sql = "DELETE FROM rol WHERE idRol = :idRol";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':idRol', $idRol);

    if ($stmt->execute()) {
        echo "<p>Rol eliminado correctamente.</p>";
    } else {
        echo "<p>Error al eliminar el rol.</p>";
    }
}
?>
