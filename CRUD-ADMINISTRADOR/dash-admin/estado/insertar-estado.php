<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/servidor/estado/estadoDB.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');

$db = new Database();
$conexion = $db->getConnection();
$estadoDB = new EstadoDB($conexion);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descripcion = $_POST['desc_estado'];
    $estadoDB->insertarEstado($descripcion);
    header("Location: estado.php"); // Redirige a la lista de estados
}
?>

<h2>Agregar Nuevo Estado</h2>
<form method="POST">
    <label for="desc_estado">Descripción del Estado:</label>
    <input type="text" name="desc_estado" required>
    <button type="submit">Agregar Estado</button>
</form>