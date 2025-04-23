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

// Consulta para obtener todas las personas
$sql = "SELECT id_persona, documento FROM persona";


$result = $conn->query($sql);

$personas = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $personas[] = $row;
    }
}

$conn->close();

// Devolver el resultado como JSON
echo json_encode($personas);
?>
