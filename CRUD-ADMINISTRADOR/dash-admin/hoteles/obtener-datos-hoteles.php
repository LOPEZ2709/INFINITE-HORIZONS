<?php
include '../../../conexion.php';

if (isset($_GET['id_restaurante'])) {
    $id_restaurante = intval($_GET['id_restaurante']);
    $sql = "SELECT * FROM restaurantes WHERE id_restaurante = :id_restaurante";
    $stmt = $conexion->prepare($sql);
    $stmt->bindValue(':id_restaurante', $id_restaurante, PDO::PARAM_INT);
    
    if ($stmt->execute()) {
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            echo json_encode($result);
        } else {
            echo json_encode(['error' => 'No se encontró el restaurante.']);
        }
    } else {
        echo json_encode(['error' => 'Error al ejecutar la consulta: ' . $stmt->errorInfo()[2]]);
    }
} else {
    echo json_encode(['error' => 'ID de restaurante no proporcionado.']);
}
?>
