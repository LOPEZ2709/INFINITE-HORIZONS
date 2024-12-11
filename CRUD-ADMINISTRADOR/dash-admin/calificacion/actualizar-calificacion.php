<?php
include('../../conexion.php');

if (isset($_GET['id_reserva'])) {
    $id_reserva = $_GET['id_reserva'];
    
    // Obtener los datos de la reserva
    $sql = "SELECT * FROM reservas WHERE id_reserva = '$id_reserva'";
    $result = mysqli_query($conexion, $sql);
    $reserva = mysqli_fetch_assoc($result);
}

if (isset($_POST['actualizar'])) {
    $estado_res = $_POST['estado_res'];
    $fecha_res = $_POST['fecha_res'];
    $desc_res = $_POST['desc_res'];
    $metodo_pago = $_POST['metodo_pago'];

    $updateSql = "UPDATE reservas SET estado_res='$estado_res', fecha_res='$fecha_res', desc_res='$desc_res', metodo_pago='$metodo_pago' WHERE id_reserva='$id_reserva'";

    if (mysqli_query($conexion, $updateSql)) {
        header('Location: reserva.php?mensaje=Actualización exitosa');
    } else {
        echo "Error: " . mysqli_error($conexion);
    }
}
?>

<form action="actualizar-reserva.php?id_reserva=<?php echo $id_reserva; ?>" method="POST">
    <label for="estado_res">Estado de la Reserva</label>
    <input type="text" name="estado_res" value="<?php echo $reserva['estado_res']; ?>" required>
    
    <label for="fecha_res">Fecha de la Reserva</label>
    <input type="date" name="fecha_res" value="<?php echo $reserva['fecha_res']; ?>" required>
    
    <label for="desc_res">Descripción</label>
    <textarea name="desc_res" required><?php echo $reserva['desc_res']; ?></textarea>
    
    <label for="metodo_pago">Método de Pago</label>
    <input type="text" name="metodo_pago" value="<?php echo $reserva['metodo_pago']; ?>" required>
    
    <button type="submit" name="actualizar">Actualizar</button>
</form>
