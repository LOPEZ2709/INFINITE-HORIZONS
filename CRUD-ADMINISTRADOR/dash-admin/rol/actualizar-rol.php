<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');
$database = new Database();
$conexion = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idRol = $_POST['idRol'];
    $Tipo_Rol = $_POST['Tipo_Rol'];

    $sql = "UPDATE rol SET Tipo_Rol = :Tipo_Rol WHERE idRol = :idRol";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':Tipo_Rol', $Tipo_Rol);
    $stmt->bindParam(':idRol', $idRol);

    if ($stmt->execute()) {
        echo "<p>Rol actualizado correctamente.</p>";
    } else {
        echo "<p>Error al actualizar el rol.</p>";
    }
}

$idRol = $_GET['idRol'] ?? '';
$sql = "SELECT * FROM rol WHERE idRol = :idRol";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':idRol', $idRol);
$stmt->execute();
$rol = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="POST">
    <label for="idRol">ID del Rol:</label>
    <input type="text" name="idRol" value="<?php echo $rol['idRol']; ?>" readonly>

    <label for="Tipo_Rol">Tipo de Rol:</label>
    <input type="text" name="Tipo_Rol" value="<?php echo $rol['Tipo_Rol']; ?>" required>

    <button type="submit">Actualizar Rol</button>
</form>
