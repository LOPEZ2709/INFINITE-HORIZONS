// C:\xampp\htdocs\api_estados\index.php
<?php
require_once __DIR__.'/config/database.php';
require_once __DIR__.'/controllers/EstadoController.php';

$database = new Database();
$db = $database->getConnection();


$controller = new EstadoController($db);
$request_uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (preg_match('/\/api_estados\/controllers\/EstadoController.php$/', $request_uri)) {
    $controller = new EstadoController($pdo);
} else {
    http_response_code(404);
    echo json_encode(["message" => "Endpoint no encontrado"]);
}
?>