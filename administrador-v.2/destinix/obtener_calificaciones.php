<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$conn = new mysqli('localhost', 'root', '', 'destinix');
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$sql = "SELECT id_calificacion, puntuacion FROM calificacion";
$result = $conn->query($sql);

$calificaciones = [];
while ($row = $result->fetch_assoc()) {
    $calificaciones[] = $row;
}

$conn->close();
echo json_encode($calificaciones);
?>
