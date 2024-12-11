<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/servidor/estado/estadoDB.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');

$db = new Database();
$conexion = $db->getConnection();
$estadoDB = new EstadoDB($conexion);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id_estado'];
    $estadoDB->eliminarEstado($id);
    header("Location: estado.php"); // Redirige a la lista de estados
}

$id = $_GET['id'];
$estado = $estadoDB->obtenerEstadoPorId($id);
?>

<h2>¿Estás seguro de que deseas eliminar el estado "<?php echo $estado['desc_estado']; ?>"?</h2>
<form method="POST">
    <input type="hidden" name="id_estado" value="<?php echo $estado['id_estado']; ?>">
    <button type="submit">Eliminar</button>
    <a href="estado.php">Cancelar</a>
</form>