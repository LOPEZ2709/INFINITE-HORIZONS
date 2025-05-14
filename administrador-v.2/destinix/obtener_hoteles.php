<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$conn = new mysqli('localhost', 'root', '', 'destinix');
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$sql = "SELECT id_hoteles, titulo_hotel FROM hoteles";
$result = $conn->query($sql);

$hoteles = [];
while ($row = $result->fetch_assoc()) {
    $hoteles[] = $row;
}

$conn->close();
echo json_encode($hoteles);
?>
