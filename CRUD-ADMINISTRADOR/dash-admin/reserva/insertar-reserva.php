<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');
$database = new Database();
$conexion = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recibimos los datos del formulario
    $estado_res = $_POST['estado_res'];
    $fecha_res = $_POST['fecha_res'];
    $desc_res = $_POST['desc_res'];
    $metodo_pago = $_POST['metodo_pago'];

    // Preparamos la consulta para insertar los datos
    $sql = "INSERT INTO reserva (estado_res, fecha_res, desc_res, metodo_pago) VALUES (:estado_res, :fecha_res, :desc_res, :metodo_pago)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':estado_res', $estado_res);
    $stmt->bindParam(':fecha_res', $fecha_res);
    $stmt->bindParam(':desc_res', $desc_res);
    $stmt->bindParam(':metodo_pago', $metodo_pago);

    // Ejecutamos la consulta
    if ($stmt->execute()) {
        echo "<p>Reserva registrada correctamente.</p>";
    } else {
        echo "<p>Error al registrar la reserva.</p>";
    }
}
?>

<!-- Formulario para insertar una nueva reserva -->
<form method="POST">
    <!-- Campo para el estado de la reserva -->
    <label for="estado_res">Estado de la Reserva:</label>
    <input type="text" name="estado_res" required placeholder="Estado de la reserva">

    <!-- Campo para la fecha de la reserva -->
    <label for="fecha_res">Fecha de la Reserva:</label>
    <input type="date" name="fecha_res" required>

    <!-- Campo para la descripción de la reserva -->
    <label for="desc_res">Descripción:</label>
    <textarea name="desc_res" required placeholder="Descripción de la reserva"></textarea>

    <!-- Campo para el método de pago -->
    <label for="metodo_pago">Método de Pago:</label>
    <input type="text" name="metodo_pago" required placeholder="Método de pago">

    <!-- Botón de enviar -->
    <button type="submit">Registrar Reserva</button>
</form>
