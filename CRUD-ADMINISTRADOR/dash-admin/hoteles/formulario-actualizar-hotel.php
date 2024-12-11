<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Hotel</title>
    <link rel="stylesheet" href="restaurantes.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<?php
include '../../../conexion.php';

if (isset($_GET['id_hoteles'])) {
    $id_hoteles = intval($_GET['id_hoteles']);
    
    // Consulta para obtener los datos del hotel
    $sql = "SELECT * FROM hoteles WHERE id_hoteles = :id_hoteles";
    $stmt = $conexion->prepare($sql);
    $stmt->bindValue(':id_hoteles', $id_hoteles, PDO::PARAM_INT);
    $stmt->execute();
    $hotel = $stmt->fetch(PDO::FETCH_ASSOC);
    
    if (!$hotel) {
        echo "<script>
            Swal.fire({
                title: 'Error!',
                text: 'No se encontró el hotel.',
                icon: 'error'
            }).then(() => {
                window.location.href = 'hoteles.php';
            });
        </script>";
        exit;
    }
    
    // Consultas para obtener los estados, empresas y calificaciones
    $query_estado = "SELECT id_estado, desc_estado FROM estado";
    $query_empresa = "SELECT id_empresa, nombre_emp FROM empresa";
    $query_calificacion = "SELECT id_calificacion, puntuacion FROM calificacion";

    $result_estado = $conexion->query($query_estado);
    $result_empresa = $conexion->query($query_empresa);
    $result_calificacion = $conexion->query($query_calificacion);

    // Verificación de errores en las consultas
    if (!$result_estado) {
        die("Error en la consulta de estados: " . $conexion->errorInfo()[2]);
    }
    if (!$result_empresa) {
        die("Error en la consulta de empresas: " . $conexion->errorInfo()[2]);
    }
    if (!$result_calificacion) {
        die("Error en la consulta de calificaciones: " . $conexion->errorInfo()[2]);
    }
} else {
    echo "<script>
        Swal.fire({
            title: 'Error!',
            text: 'No se proporcionó un ID de hotel.',
            icon: 'error'
        }).then(() => {
            window.location.href = 'hoteles.php';
        });
    </script>";
    exit;
}
?>

<form action="actualizar-hoteles.php" method="POST">
    <input type="hidden" name="id_hoteles" value="<?php echo $hotel['id_hoteles']; ?>">
    
    <label for="titulo_hotel">Título Hotel:</label>
    <input type="text" name="titulo_hotel" id="titulo_hotel" value="<?php echo htmlspecialchars($hotel['titulo_hotel']); ?>" required><br>

    <label for="img">Imagen:</label>
    <input type="text" name="img" id="img" value="<?php echo htmlspecialchars($hotel['img']); ?>"><br>

    <label for="desc_hotel">Descripción:</label>
    <textarea name="desc_hotel" id="desc_hotel" required><?php echo htmlspecialchars($hotel['desc_hotel']); ?></textarea><br>

    <label for="id_estado">Estado:</label>
    <select name="id_estado" id="id_estado" required>
        <?php while ($estado = $result_estado->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php echo $estado['id_estado']; ?>" <?php echo $hotel['id_estado'] == $estado['id_estado'] ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($estado['desc_estado']); ?>
            </option>
        <?php } ?>
    </select><br>

    <label for="fecha_inicio">Fecha de Inicio:</label>
    <input type="date" name="fecha_inicio" id="fecha_inicio" value="<?php echo $hotel['fecha_inicio']; ?>"><br>

    <label for="fecha_fin">Fecha de Fin:</label>
    <input type="date" name="fecha_fin" id="fecha_fin" value="<?php echo $hotel['fecha_fin']; ?>"><br>

    <label for="id_empresa">Empresa:</label>
    <select name="id_empresa" id="id_empresa" required>
        <?php while ($empresa = $result_empresa->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php echo $empresa['id_empresa']; ?>" <?php echo $hotel['id_empresa'] == $empresa['id_empresa'] ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($empresa['nombre_emp']); ?>
            </option>
        <?php } ?>
    </select><br>

    <label for="id_calificacion">Calificación:</label>
    <select name="id_calificacion" id="id_calificacion" required>
        <?php while ($calificacion = $result_calificacion->fetch(PDO::FETCH_ASSOC)) { ?>
            <option value="<?php echo $calificacion['id_calificacion']; ?>" <?php echo $hotel['id_calificacion'] == $calificacion['id_calificacion'] ? 'selected' : ''; ?>>
                <?php echo htmlspecialchars($calificacion['puntuacion']); ?>
            </option>
        <?php } ?>
    </select><br>

    <input type="submit" value="Actualizar">
</form>
</body>
</html>
