<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');
$database = new Database();
$conexion = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_sitio = $_POST['id_sitio'];
    $nombre_sitio = $_POST['nombre_sitio'];
    $img_sitio = $_POST['img_sitio'];
    $ubicacion_sitio = $_POST['ubicacion_sitio'];
    $desc_sitio = $_POST['desc_sitio'];
    $id_persona = $_POST['id_persona'];
    $id_estado = $_POST['id_estado'];
    $id_calificacion = $_POST['id_calificacion'];

    $sql = "UPDATE sitio_turistico SET nombre_sitio = :nombre_sitio, img_sitio = :img_sitio, ubicacion_sitio = :ubicacion_sitio, 
            desc_sitio = :desc_sitio, id_persona = :id_persona, id_estado = :id_estado, id_calificacion = :id_calificacion 
            WHERE id_sitio = :id_sitio";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre_sitio', $nombre_sitio);
    $stmt->bindParam(':img_sitio', $img_sitio);
    $stmt->bindParam(':ubicacion_sitio', $ubicacion_sitio);
    $stmt->bindParam(':desc_sitio', $desc_sitio);
    $stmt->bindParam(':id_persona', $id_persona);
    $stmt->bindParam(':id_estado', $id_estado);
    $stmt->bindParam(':id_calificacion', $id_calificacion);
    $stmt->bindParam(':id_sitio', $id_sitio);

    if ($stmt->execute()) {
        echo "<p>Datos del sitio turístico actualizados correctamente.</p>";
    } else {
        echo "<p>Error al actualizar los datos del sitio turístico.</p>";
    }
}

$id_sitio = $_GET['id_sitio'] ?? '';
$sql = "SELECT * FROM sitio_turistico WHERE id_sitio = :id_sitio";
$stmt = $conexion->prepare($sql);
$stmt->bindParam(':id_sitio', $id_sitio);
$stmt->execute();
$sitio = $stmt->fetch(PDO::FETCH_ASSOC);
?>

<form method="POST">
    <label for="id_sitio">ID del Sitio:</label>
    <input type="text" name="id_sitio" value="<?php echo $sitio['id_sitio']; ?>" readonly>

    <label for="nombre_sitio">Nombre del Sitio:</label>
    <input type="text" name="nombre_sitio" value="<?php echo $sitio['nombre_sitio']; ?>" required>

    <label for="img_sitio">Imagen del Sitio:</label>
    <input type="text" name="img_sitio" value="<?php echo $sitio['img_sitio']; ?>" required>

    <label for="ubicacion_sitio">Ubicación del Sitio:</label>
    <input type="text" name="ubicacion_sitio" value="<?php echo $sitio['ubicacion_sitio']; ?>" required>

    <label for="desc_sitio">Descripción del Sitio:</label>
    <textarea name="desc_sitio" required><?php echo $sitio['desc_sitio']; ?></textarea>

    <label for="id_persona">ID de Persona:</label>
    <input type="number" name="id_persona" value="<?php echo $sitio['id_persona']; ?>" required>

    <label for="id_estado">ID de Estado:</label>
    <input type="number" name="id_estado" value="<?php echo $sitio['id_estado']; ?>" required>

    <label for="id_calificacion">ID de Calificación:</label>
    <input type="number" name="id_calificacion" value="<?php echo $sitio['id_calificacion']; ?>" required>

    <button type="submit">Actualizar Sitio Turístico</button>
</form>
