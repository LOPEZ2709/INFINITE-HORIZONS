<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

$conn = new mysqli('localhost', 'root', '', 'destinix');
if ($conn->connect_error) die("Conexión fallida: " . $conn->connect_error);

$sql = "SELECT id_comentario, contenido FROM comentarios";
$result = $conn->query($sql);

$comentarios = [];
while ($row = $result->fetch_assoc()) {
    $comentarios[] = $row;
}

$conn->close();
echo json_encode($comentarios);
?>
