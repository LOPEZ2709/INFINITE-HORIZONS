<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');
$database = new Database();
$conexion = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_reserva = $_POST['id_reserva'];
    $estado_res = $_POST['estado_res'];
    $fecha_res = $_POST['fecha_res'];
    $desc_res = $_POST['desc_res'];
    $metodo_pago = $_POST['metodo_pago']; // Asegúrate de que esta variable esté definida

    $sql = "UPDATE reserva SET estado_res = :estado_res, fecha_res = :fecha_res, desc_res = :desc_res, metodo_pago = :metodo_pago WHERE id_reserva = :id_reserva";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':estado_res', $estado_res);
    $stmt->bindParam(':fecha_res', $fecha_res);
    $stmt->bindParam(':desc_res', $desc_res);
    $stmt->bindParam(':metodo_pago', $metodo_pago);
    $stmt->bindParam(':id_reserva', $id_reserva);

    if ($stmt->execute()) {
        echo "Reserva actualizada correctamente.";
    } else {
        echo "Error al actualizar la reserva.";
    }
}

// Si el formulario no se ha enviado aún, obtenemos los datos para mostrar en el formulario.
if (isset($_GET['id_reserva'])) {
    $id_reserva = $_GET['id_reserva'];
    $sql = "SELECT * FROM reserva WHERE id_reserva = :id_reserva";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id_reserva', $id_reserva);
    $stmt->execute();
    $reserva = $stmt->fetch(PDO::FETCH_ASSOC);

    // Asignamos los valores para el formulario.
    $estado_res = $reserva['estado_res'];
    $fecha_res = $reserva['fecha_res'];
    $desc_res = $reserva['desc_res'];
    $metodo_pago = $reserva['metodo_pago']; // Aquí obtenemos el valor de la base de datos
}
?>

<!-- Formulario de actualización -->
<form method="POST">
    <input type="hidden" name="id_reserva" value="<?php echo $id_reserva; ?>">
    <input type="text" name="estado_res" value="<?php echo $estado_res; ?>" required placeholder="Estado de la reserva">
    <input type="date" name="fecha_res" value="<?php echo $fecha_res; ?>" required>
    <textarea name="desc_res" required placeholder="Descripción de la reserva"><?php echo $desc_res; ?></textarea>
    <input type="text" name="metodo_pago" value="<?php echo $metodo_pago; ?>" required placeholder="Método de pago">
    <button type="submit">Actualizar Reserva</button>
</form>
