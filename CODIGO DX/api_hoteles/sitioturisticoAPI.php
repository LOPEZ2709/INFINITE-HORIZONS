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


$sql = "SELECT id_sitio, nombre_sitio, img_sitio,ubicacion_sitio, desc_sitio, calificacion_id_calificacion FROM sitio_turistico";
$resultado = $conexion->query($sql);

$sitioturistico = [];

if ($resultado->num_rows > 0) {
    while ($fila = $resultado->fetch_assoc()) {
        $sitioturistico[] = $fila;
    }
    echo json_encode($sitioturistico);
} else {
    echo json_encode([]);
}

$conexion->close();
?>
