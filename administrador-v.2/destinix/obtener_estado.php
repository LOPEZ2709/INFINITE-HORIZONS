<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');

// Conexión a la base de datos
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'destinix';

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consulta para obtener todos los estados
$sql = "SELECT id_estado, desc_estado FROM estado";

$result = $conn->query($sql);

$estados = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $estados[] = $row;
    }
}

$conn->close();

// Devolver el resultado como JSON
echo json_encode($estados);
?>
