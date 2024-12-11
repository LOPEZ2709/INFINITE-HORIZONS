<?php
include '../../../conexion.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo_restaurante = $_POST['titulo_restaurante'];
    $img = $_FILES['img']['name'];
    $desc_restaurantes = $_POST['desc_restaurantes'];
    $estado_id_estado = $_POST['id_estado'];
    $empresa_id_empresa = $_POST['id_empresa'];
    $calificacion_id_calificacion = $_POST['id_calificacion'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

    // Subir imagen
    $rutaDestino = '../../dashboard/contacto/dash-admin/barra-lateral/restaurantes/img/' . $img;

    if (move_uploaded_file($_FILES['img']['tmp_name'], $rutaDestino)) {
        $sql = "INSERT INTO restaurantes (titulo_restaurante, img, desc_restaurantes, fecha_inicio, fecha_fin, id_estado, id_empresa, id_calificacion) 
                VALUES (:titulo_restaurante, :img, :desc_restaurantes, :fecha_inicio, :fecha_fin, :id_estado, :id_empresa, :id_calificacion)";
        $stmt = $conexion->prepare($sql);

        $stmt->bindParam(':titulo_restaurante', $titulo_restaurante);
        $stmt->bindParam(':img', $img);
        $stmt->bindParam(':desc_restaurantes', $desc_restaurantes);
        $stmt->bindParam(':fecha_inicio', $fecha_inicio);
        $stmt->bindParam(':fecha_fin', $fecha_fin);
        $stmt->bindParam(':id_estado', $estado_id_estado);
        $stmt->bindParam(':id_empresa', $empresa_id_empresa);
        $stmt->bindParam(':id_calificacion', $calificacion_id_calificacion);

        if ($stmt->execute()) {
            echo json_encode(['status' => 'success', 'message' => 'Los datos se han ingresado correctamente.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al agregar el restaurante: ' . $stmt->errorInfo()[2]]);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Error al mover el archivo.']);
    }
    exit;
}
?>
