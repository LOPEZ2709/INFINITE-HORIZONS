<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');
$database = new Database();
$conexion = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $Tipo_Rol = $_POST['Tipo_Rol'];

    $sql = "INSERT INTO rol (Tipo_Rol) VALUES (:Tipo_Rol)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':Tipo_Rol', $Tipo_Rol);

    if ($stmt->execute()) {
        echo "<p>Rol registrado correctamente.</p>";
    } else {
        echo "<p>Error al registrar el rol.</p>";
    }
}
?>

<form method="POST">
    <label for="Tipo_Rol">Tipo de Rol:</label>
    <input type="text" name="Tipo_Rol" required placeholder="Tipo de rol">

    <button type="submit">Registrar Rol</button>
</form>
    