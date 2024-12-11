<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');
$database = new Database();
$conexion = $database->getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre_sitio = $_POST['nombre_sitio'];
    $img_sitio = $_POST['img_sitio'];
    $ubicacion_sitio = $_POST['ubicacion_sitio'];
    $desc_sitio = $_POST['desc_sitio'];
    $id_persona = $_POST['id_persona'];
    $id_estado = $_POST['id_estado'];
    $id_calificacion = $_POST['id_calificacion'];

    $sql = "INSERT INTO sitio_turistico (nombre_sitio, img_sitio, ubicacion_sitio, desc_sitio, id_persona, id_estado, id_calificacion) 
            VALUES (:nombre_sitio, :img_sitio, :ubicacion_sitio, :desc_sitio, :id_persona, :id_estado, :id_calificacion)";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':nombre_sitio', $nombre_sitio);
    $stmt->bindParam(':img_sitio', $img_sitio);
    $stmt->bindParam(':ubicacion_sitio', $ubicacion_sitio);
    $stmt->bindParam(':desc_sitio', $desc_sitio);
    $stmt->bindParam(':id_persona', $id_persona);
    $stmt->bindParam(':id_estado', $id_estado);
    $stmt->bindParam(':id_calificacion', $id_calificacion);

    if ($stmt->execute()) {
        echo "<p>Datos del sitio turístico registrados correctamente.</p>";
    } else {
        echo "<p>Error al registrar los datos del sitio turístico.</p>";
    }
}
?>

<form method="POST">
    <label for="nombre_sitio">Nombre del Sitio:</label>
    <input type="text" name="nombre_sitio" required placeholder="Nombre del sitio turístico">

    <label for="img_sitio">Imagen del Sitio:</label>
    <input type="text" name="img_sitio" required placeholder="Imagen del sitio turístico">

    <label for="ubicacion_sitio">Ubicación del Sitio:</label>
    <input type="text" name="ubicacion_sitio" required placeholder="Ubicación del sitio turístico">

    <label for="desc_sitio">Descripción del Sitio:</label>
    <textarea name="desc_sitio" required placeholder="Descripción del sitio turístico"></textarea>

    <label for="id_persona">ID de Persona:</label>
    <input type="number" name="id_persona" required placeholder="ID de la persona responsable">

    <label for="id_estado">ID de Estado:</label>
    <input type="number" name="id_estado" required placeholder="ID del estado">

    <label for="id_calificacion">ID de Calificación:</label>
    <input type="number" name="id_calificacion" required placeholder="ID de la calificación">

    <button type="submit">Registrar Sitio Turístico</button>
</form>
