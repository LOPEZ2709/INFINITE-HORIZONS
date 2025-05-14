<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$conn = new mysqli('localhost', 'root', '', 'destinix');
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$sql = "SELECT id_rol, nombre_rol FROM rol";
$result = $conn->query($sql);

$roles = [];
while ($row = $result->fetch_assoc()) {
    $roles[] = $row;
}

$conn->close();
echo json_encode($roles);
?>
