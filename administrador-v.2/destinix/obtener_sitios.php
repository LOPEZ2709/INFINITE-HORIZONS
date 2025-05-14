<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$conn = new mysqli('localhost', 'root', '', 'destinix');
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$sql = "SELECT id_sitio, nombre_sitio FROM sitio_turistico";
$result = $conn->query($sql);

$sitios = [];
while ($row = $result->fetch_assoc()) {
    $sitios[] = $row;
}

$conn->close();
echo json_encode($sitios);
?>
