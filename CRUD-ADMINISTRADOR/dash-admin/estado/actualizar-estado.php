<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/servidor/estado/estadoDB.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');

$db = new Database();
$conexion = $db->getConnection();
$estadoDB = new EstadoDB($conexion);

$id = $_GET['id'];
$estado = $estadoDB->obtenerEstadoPorId($id);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $descripcion = $_POST['desc_estado'];
    $estadoDB->actualizarEstado($id, $descripcion);
    header("Location: estado.php"); // Redirige a la lista de estados
}
?>

<h2>Actualizar Estado</h2>
<form method="POST">
    <label for="desc_estado">Descripción del Estado:</label>
    <input type="text" name="desc_estado" value="<?php echo $estado['desc_estado']; ?>" required>
    <button type="submit">Actualizar Estado</button>
</form>