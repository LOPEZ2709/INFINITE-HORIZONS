<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$conn = new mysqli('localhost', 'root', '', 'destinix');
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$sql = "SELECT id_categoria, nombre_categoria FROM categoria";
$result = $conn->query($sql);

$categorias = [];
while ($row = $result->fetch_assoc()) {
    $categorias[] = $row;
}

$conn->close();
echo json_encode($categorias);
?>
