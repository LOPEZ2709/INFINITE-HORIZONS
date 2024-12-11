<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');
$database = new Database();
$conexion = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email_usu = $_POST['email_usu'];
    $contra_usu = $_POST['contra_usu'];

    $sql = "INSERT INTO seguridad (email_usu, contra_usu) VALUES (:email_usu, :contra_usu)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':email_usu', $email_usu);
    $stmt->bindParam(':contra_usu', $contra_usu);

    if ($stmt->execute()) {
        echo "<p>Datos de seguridad registrados correctamente.</p>";
    } else {
        echo "<p>Error al registrar los datos de seguridad.</p>";
    }
}
?>

<form method="POST">
    <label for="email_usu">Email:</label>
    <input type="email" name="email_usu" required placeholder="Email del usuario">

    <label for="contra_usu">Contraseña:</label>
    <input type="password" name="contra_usu" required placeholder="Contraseña del usuario">

    <button type="submit">Registrar Seguridad</button>
</form>
    