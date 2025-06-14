<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$conexion = new mysqli("localhost", "root", "", "destinix");

$host = "localhost";
$db   = "destinix";
$user = "root";
$pass = "";  
$charset = 'utf8mb4';

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $conn = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass, $options);
    
    $conn->query("SELECT 1")->fetch();
    error_log("Conexión a DB exitosa: $db@$host");
    
} catch (PDOException $e) {
    $error = [
        "error" => "Conexión fallida",
        "message" => $e->getMessage(),
        "details" => [
            "host" => $host,
            "db" => $db,
            "user" => $user
        ]
    ];
    error_log(json_encode($error));
    die(json_encode($error));
}
?>