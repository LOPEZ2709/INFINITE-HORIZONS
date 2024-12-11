<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');
$database = new Database();
$conexion = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_seguridad = $_POST['id_seguridad'];
    $email_usu = $_POST['email_usu'];
    $contra_usu = $_POST['contra_usu'];

    $sql = "UPDATE seguridad SET email_usu = :email_usu, contra_usu = :contra_usu WHERE id_seguridad = :id_seguridad";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':email_usu', $email_usu);
    $stmt->bindParam(':contra_usu', $contra_usu);
    $stmt->bindParam(':id_seguridad', $id_seguridad);

    if ($stmt->execute()) {
        echo "<p>Datos de seguridad actualizados correctamente.</p>";
    } else {
        echo "<p>Error al actualizar los datos de seguridad.</p>";
    }
}

$id_seguridad = $_GET['id_seguridad'] ?? '';
$sql = "SELECT * FROM seguridad WHERE id_seguridad = :id_seguridad";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id_seguridad', $id_seguridad);
$stmt->execute();
$seguridad = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="POST">
    <label for="id_seguridad">ID de Seguridad:</label>
    <input type="text" name="id_seguridad" value="<?php echo $seguridad['id_seguridad']; ?>" readonly>

    <label for="email_usu">Email:</label>
    <input type="email" name="email_usu" value="<?php echo $seguridad['email_usu']; ?>" required>

    <label for="contra_usu">Contraseña:</label>
    <input type="password" name="contra_usu" value="<?php echo $seguridad['contra_usu']; ?>" required>

    <button type="submit">Actualizar Seguridad</button>
</form>
