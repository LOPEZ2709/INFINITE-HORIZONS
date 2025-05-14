<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$conn = new mysqli('localhost', 'root', '', 'destinix');
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$sql = "SELECT id_restaurante, titulo_restaurante FROM restaurantes";
$result = $conn->query($sql);

$restaurantes = [];
while ($row = $result->fetch_assoc()) {
    $restaurantes[] = $row;
}

$conn->close();
echo json_encode($restaurantes);
?>
