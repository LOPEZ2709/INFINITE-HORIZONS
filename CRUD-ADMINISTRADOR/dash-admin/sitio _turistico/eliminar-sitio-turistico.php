<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');
$database = new Database();
$conexion = $database->getConnection();

if (isset($_GET['id_sitio'])) {
    $id_sitio = $_GET['id_sitio'];
    $sql = "DELETE FROM sitio_turistico WHERE id_sitio = :id_sitio";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id_sitio', $id_sitio);

    if ($stmt->execute()) {
        echo "<p>Sitio turístico eliminado correctamente.</p>";
    } else {
        echo "<p>Error al eliminar el sitio turístico.</p>";
    }
}
?>
