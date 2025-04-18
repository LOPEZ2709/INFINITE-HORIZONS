<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/Estado.php';

// Crear instancia de Database y obtener conexión
$database = new Database();
$db = $database->getConnection();

$estado = new Estado($db);

try {
    $method = $_SERVER['REQUEST_METHOD'];
    
    switch ($method) {
        case 'GET':
            $stmt = $estado->read();
            $num = $stmt->rowCount();

            if ($num > 0) {
                $estados_arr = [];
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    $estados_arr[] = $row;
                }
                http_response_code(200);
                echo json_encode([
                    'success' => true,
                    'data' => $estados_arr
                ]);
            } else {
                http_response_code(404);
                echo json_encode([
                    'success' => false,
                    'message' => 'No se encontraron estados'
                ]);
            }
            break;

        case 'POST':
            $data = json_decode(file_get_contents("php://input"));
            
            if (!empty($data->desc_estado)) {
                $estado->desc_estado = $data->desc_estado;
                
                if ($estado->create()) {
                    http_response_code(201);
                    echo json_encode([
                        'success' => true,
                        'message' => 'Estado creado exitosamente',
                        'id_estado' => $db->lastInsertId()
                    ]);
                } else {
                    http_response_code(503);
                    echo json_encode([
                        'success' => false,
                        'message' => 'Error al crear el estado'
                    ]);
                }
            } else {
                http_response_code(400);
                echo json_encode([
                    'success' => false,
                    'message' => 'Datos incompletos'
                ]);
            }
            break;

        case 'PUT':
            $data = json_decode(file_get_contents("php://input"));
            
            if (!empty($data->id_estado) && !empty($data->desc_estado)) {
                $estado->id_estado = $data->id_estado;
                $estado->desc_estado = $data->desc_estado;
                
                if ($estado->update()) {
                    http_response_code(200);
                    echo json_encode([
                        'success' => true,
                        'message' => 'Estado actualizado exitosamente'
                    ]);
                } else {
                    http_response_code(503);
                    echo json_encode([
                        'success' => false,
                        'message' => 'Error al actualizar el estado'
                    ]);
                }
            } else {
                http_response_code(400);
                echo json_encode([
                    'success' => false,
                    'message' => 'Datos incompletos'
                ]);
            }
            break;

        case 'DELETE':
            $data = json_decode(file_get_contents("php://input"));
            
            if (!empty($data->id_estado)) {
                $estado->id_estado = $data->id_estado;
                
                if ($estado->delete()) {
                    http_response_code(200);
                    echo json_encode([
                        'success' => true,
                        'message' => 'Estado eliminado exitosamente'
                    ]);
                } else {
                    http_response_code(503);
                    echo json_encode([
                        'success' => false,
                        'message' => 'Error al eliminar el estado'
                    ]);
                }
            } else {
                http_response_code(400);
                echo json_encode([
                    'success' => false,
                    'message' => 'ID no proporcionado'
                ]);
            }
            break;

        default:
            http_response_code(405);
            echo json_encode([
                'success' => false,
                'message' => 'Método no permitido'
            ]);
            break;
    }
    
} catch (Exception $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'message' => 'Error en el servidor: ' . $e->getMessage()
    ]);
}
?>