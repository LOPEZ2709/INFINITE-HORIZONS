<?php
include '../../../conexion.php'; // Asegúrate de que la ruta sea correcta

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_hotel = intval($_POST['id_hoteles']);
    $titulo_hotel = trim($_POST['titulo_hotel']);
    $img = trim($_POST['img']);
    $descripcion_hotel = trim($_POST['desc_hotel']);
    $fecha_inicio = trim($_POST['fecha_inicio']);
    $fecha_fin = trim($_POST['fecha_fin']);
    $id_estado = intval($_POST['id_estado']);
    $id_empresa = intval($_POST['id_empresa']);
    $id_calificacion = intval($_POST['id_calificacion']);

    // Verificar que $config (o $conexion) es válido
    if (!isset($conexion) || $conexion === null) {
        die("Error: La conexión a la base de datos no se ha establecido.");
    }
    
    // Consultas para verificar la existencia de los IDs
    $query_estado = "SELECT id_estado FROM estado WHERE id_estado = :id_estado";
    $stmt_estado = $conexion->prepare($query_estado);
    $stmt_estado->bindValue(':id_estado', $id_estado, PDO::PARAM_INT);
    $stmt_estado->execute();
    $result_estado = $stmt_estado->fetchAll();

    $query_empresa = "SELECT id_empresa FROM empresa WHERE id_empresa = :id_empresa";
    $stmt_empresa = $conexion->prepare($query_empresa);
    $stmt_empresa->bindValue(':id_empresa', $id_empresa, PDO::PARAM_INT);
    $stmt_empresa->execute();
    $result_empresa = $stmt_empresa->fetchAll();

    $query_calificacion = "SELECT id_calificacion FROM calificacion WHERE id_calificacion = :id_calificacion";
    $stmt_calificacion = $conexion->prepare($query_calificacion);
    $stmt_calificacion->bindValue(':id_calificacion', $id_calificacion, PDO::PARAM_INT);
    $stmt_calificacion->execute();
    $result_calificacion = $stmt_calificacion->fetchAll();

    if (count($result_estado) === 0 || count($result_empresa) === 0 || count($result_calificacion) === 0) {
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'Uno o más datos relacionados no son válidos.',
                icon: 'error'
            }).then(() => {
                window.location.href = 'hoteles.php';
            });
        </script>";
        exit;
    }

    // Actualizar hotel
    $sql = "UPDATE hoteles 
            SET titulo_hotel = :titulo_hotel, 
                img = :img, 
                desc_hotel = :desc_hotel, 
                fecha_inicio = :fecha_inicio, 
                fecha_fin = :fecha_fin, 
                id_estado = :id_estado, 
                id_empresa = :id_empresa, 
                id_calificacion = :id_calificacion 
            WHERE id_hoteles = :id_hoteles";

    $stmt = $conexion->prepare($sql);
    $stmt->bindValue(':titulo_hotel', $titulo_hotel);
    $stmt->bindValue(':img', $img);
    $stmt->bindValue(':desc_hotel', $descripcion_hotel);
    $stmt->bindValue(':fecha_inicio', $fecha_inicio);
    $stmt->bindValue(':fecha_fin', $fecha_fin);
    $stmt->bindValue(':id_estado', $id_estado, PDO::PARAM_INT);
    $stmt->bindValue(':id_empresa', $id_empresa, PDO::PARAM_INT);
    $stmt->bindValue(':id_calificacion', $id_calificacion, PDO::PARAM_INT);
    $stmt->bindValue(':id_hoteles', $id_hotel, PDO::PARAM_INT);

    if ($stmt->execute()) {
        echo "<script>
            Swal.fire({
                title: 'Éxito!',
                text: 'Hotel actualizado correctamente.',
                icon: 'success'
            }).then(() => {
                window.location.href = 'hoteles.php';
            });
        </script>";
    } else {
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'No se pudo actualizar el hotel.',
                icon: 'error'
            }).then(() => {
                window.location.href = 'hoteles.php';
            });
        </script>";
    }
}
?>
