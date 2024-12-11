<?php
include '../../../conexion.php';

if (isset($_GET['id_hoteles'])) {
    $id = intval($_GET['id_hoteles']);

    // Consulta para eliminar el hotel
    $query = "DELETE FROM hoteles WHERE id_hoteles = :id_hoteles";
    $stmt = $conexion->prepare($query);
    $stmt->bindValue(':id_hoteles', $id, PDO::PARAM_INT);
    
    // Ejecutar la consulta
    $response = $stmt->execute();

    if ($response) {
        echo json_encode(['status' => 'success', 'message' => 'Registro eliminado.']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el registro.']);
    }

    $stmt->closeCursor();
} else {
    echo json_encode(['status' => 'error', 'message' => 'ID de hotel no proporcionado.']);
}
?>
