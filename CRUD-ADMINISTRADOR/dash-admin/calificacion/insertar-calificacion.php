<?php
include('../../conexion.php');

$sql = "SELECT * FROM reservas";
$result = mysqli_query($conexion, $sql);
?>

<table>
    <thead>
        <tr>
            <th>ID Reserva</th>
            <th>Estado</th>
            <th>Fecha</th>
            <th>Descripción</th>
            <th>Método de Pago</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($reserva = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?php echo $reserva['id_reserva']; ?></td>
                <td><?php echo $reserva['estado_res']; ?></td>
                <td><?php echo $reserva['fecha_res']; ?></td>
                <td><?php echo $reserva['desc_res']; ?></td>
                <td><?php echo $reserva['metodo_pago']; ?></td>
                <td>
                    <a href="actualizar-reserva.php?id_reserva=<?php echo $reserva['id_reserva']; ?>">Actualizar</a>
                    <a href="eliminar-reserva.php?id_reserva=<?php echo $reserva['id_reserva']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>
