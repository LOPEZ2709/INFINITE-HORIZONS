<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/servidor/persona/personaDB.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');

$db = new Database();
$conexion = $db->getConnection();
$personaDB = new PersonaDB($conexion);

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $persona = $personaDB->obtenerPersonaPorId($id);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $personaDB->eliminarPersona($id);
    header("Location: persona.php"); // Redirige a la lista de personas
}
?>

<h2>Eliminar Persona</h2>
<p>¿Estás seguro de que deseas eliminar a <?php echo $persona['nombre_usu'] . ' ' . $persona['apellido_usu']; ?>?</p>
<form method="POST">
    <button type="submit">Eliminar</button>
    <a href="persona.php">Cancelar</a>
</form>