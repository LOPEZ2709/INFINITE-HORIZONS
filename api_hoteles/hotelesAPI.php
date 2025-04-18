<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "destinix");

// Verificamos si hay error de conexión
if ($conexion->connect_error) {
    http_response_code(500);
    echo json_encode(["error" => "Error de conexión"]);
    exit();
}

// Consulta: Solo columnas hasta calificación
$sql = "SELECT id_hoteles, titulo_hotel, img, descripcion_hotel, calificacion_id_calificacion FROM hoteles";
$resultado = $conexion->query($sql);

$hoteles = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $hoteles[] = $fila;
    }
    echo json_encode($hoteles);
} else {
    echo json_encode([]);
}

$conexion->close();
?>
