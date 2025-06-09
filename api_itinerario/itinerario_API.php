<?php
require 'conexion.php';

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

ini_set('display_errors', 1);
error_reporting(E_ALL);
file_put_contents('itinerario_log.txt', date('Y-m-d H:i:s')." - Método: $method\n", FILE_APPEND);

function sendResponse($code, $data) {
    http_response_code($code);
    echo json_encode($data);
    exit;
}

try {
    switch ($method) {
        case 'GET':
    
            file_put_contents('itinerario_log.txt', "GET Params: ".print_r($_GET, true)."\n", FILE_APPEND);
            
            $fecha = $_GET['fecha'] ?? null;
            $persona_id = $_GET['persona_id'] ?? null;

            $query = "SELECT i.*, 
                      COALESCE(h.titulo_hotel, r.titulo_restaurante, s.nombre_sitio) AS nombre_actividad,
                      COALESCE(h.img, r.img, s.img_sitio) AS imagen_actividad,
                      CASE 
                        WHEN i.id_hoteles IS NOT NULL THEN 'hotel'
                        WHEN i.id_restaurante IS NOT NULL THEN 'restaurante'
                        WHEN i.id_sitio IS NOT NULL THEN 'sitio'
                        ELSE 'otro'
                      END AS tipo_actividad
                      FROM itinerario i
                      LEFT JOIN hoteles h ON i.id_hoteles = h.id_hoteles
                      LEFT JOIN restaurantes r ON i.id_restaurante = r.id_restaurante
                      LEFT JOIN sitio_turistico s ON i.id_sitio = s.id_sitio
                      WHERE 1=1";

            $params = [];

            if ($fecha) {
                $query .= " AND i.fecha_itinerario = :fecha";
                $params[':fecha'] = $fecha;
            }

            if ($persona_id) {
                $query .= " AND i.persona_id_persona = :persona_id";
                $params[':persona_id'] = $persona_id;
            }

            $query .= " ORDER BY i.fecha_itinerario, i.hora_inicio";

            $stmt = $conn->prepare($query);
            
            foreach ($params as $key => $value) {
                $stmt->bindValue($key, $value);
            }

            $stmt->execute();

            $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
          
            file_put_contents('itinerario_log.txt', "Resultados GET: ".count($resultados)." registros\n", FILE_APPEND);
            
            sendResponse(200, $resultados);
            break;

        case 'POST':
           
$estadoPredeterminado = 1; 

if (!isset($input['estado_id_estado'])) {
    $input['estado_id_estado'] = $estadoPredeterminado;
}


$columns[] = "estado_id_estado";
$values[] = ":estado_id";
$params[':estado_id'] = $input['estado_id_estado'];
            
            file_put_contents('itinerario_log.txt', "POST Input: ".print_r($input, true)."\n", FILE_APPEND);
            
           
            $required = ['fecha_itinerario', 'persona_id_persona', 'hora_inicio', 'hora_fin', 'estado_id_estado'];
            foreach ($required as $field) {
                if (!isset($input[$field]) || $input[$field] === '') {
                    sendResponse(400, ["success" => false, "error" => "Falta el campo obligatorio: $field"]);
                }
            }

            // Validar formato de fecha (YYYY-MM-DD)
            if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $input['fecha_itinerario'])) {
                sendResponse(400, ["success" => false, "error" => "Formato de fecha inválido. Use YYYY-MM-DD"]);
            }

            // Validar formato de horas (HH:MM o HH:MM:SS)
            if (!preg_match('/^\d{2}:\d{2}(:\d{2})?$/', $input['hora_inicio']) || 
                !preg_match('/^\d{2}:\d{2}(:\d{2})?$/', $input['hora_fin'])) {
                sendResponse(400, ["success" => false, "error" => "Formato de hora inválido. Use HH:MM o HH:MM:SS"]);
            }

    
            $hora_inicio = (strlen($input['hora_inicio']) === 5) ? $input['hora_inicio'].':00' : $input['hora_inicio'];
            $hora_fin = (strlen($input['hora_fin']) === 5) ? $input['hora_fin'].':00' : $input['hora_fin'];

            $columns = [
                "fecha_itinerario", 
                "persona_id_persona", 
                "descripcion", 
                "hora_inicio", 
                "hora_fin", 
                "estado_id_estado"
            ];
            
            $values = [
                ":fecha", 
                ":persona_id", 
                ":descripcion", 
                ":hora_inicio", 
                ":hora_fin", 
                ":estado_id"
            ];
            
            $params = [
                ':fecha' => $input['fecha_itinerario'],
                ':persona_id' => $input['persona_id_persona'],
                ':descripcion' => $input['descripcion'] ?? 'Actividad sin descripción',
                ':hora_inicio' => $hora_inicio,
                ':hora_fin' => $hora_fin,
                ':estado_id' => $input['estado_id_estado']
            ];

           
            if (!empty($input['id_hoteles'])) {
                $columns[] = "id_hoteles";
                $values[] = ":hotel_id";
                $params[':hotel_id'] = $input['id_hoteles'];
            } 
            
            if (!empty($input['id_restaurante'])) {
                $columns[] = "id_restaurante";
                $values[] = ":restaurante_id";
                $params[':restaurante_id'] = $input['id_restaurante'];
            } 
            
            if (!empty($input['id_sitio'])) {
                $columns[] = "id_sitio";
                $values[] = ":sitio_id";
                $params[':sitio_id'] = $input['id_sitio'];
            }

            $query = "INSERT INTO itinerario (" . implode(", ", $columns) . ") 
                      VALUES (" . implode(", ", $values) . ")";
            
            file_put_contents('itinerario_log.txt', "Query: $query\nParams: ".print_r($params, true)."\n", FILE_APPEND);
            
            $stmt = $conn->prepare($query);
            
            foreach ($params as $key => $value) {
                $paramType = (is_int($value)) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $stmt->bindValue($key, $value, $paramType);
            }

            if ($stmt->execute()) {
                $id = $conn->lastInsertId();
                
          
                $stmt = $conn->prepare("SELECT * FROM itinerario WHERE id_itinerario = ?");
                $stmt->execute([$id]);
                $newItem = $stmt->fetch(PDO::FETCH_ASSOC);
                
                file_put_contents('itinerario_log.txt', "Nuevo item creado: ".print_r($newItem, true)."\n", FILE_APPEND);
                
                sendResponse(201, [
                    "success" => true, 
                    "id" => $id,
                    "data" => $newItem
                ]);
            } else {
                $errorInfo = $stmt->errorInfo();
                file_put_contents('itinerario_log.txt', "Error en ejecución: ".print_r($errorInfo, true)."\n", FILE_APPEND);
                sendResponse(500, [
                    "success" => false, 
                    "error" => "Error al ejecutar la consulta",
                    "details" => $errorInfo
                ]);
            }
            break;

        case 'PUT':
            
            file_put_contents('itinerario_log.txt', "PUT Input: ".print_r($input, true)."\n", FILE_APPEND);
            
            if (empty($input['id_itinerario'])) {
                sendResponse(400, ["success" => false, "error" => "Se requiere id_itinerario"]);
            }

            $updates = [];
            $params = [':id' => $input['id_itinerario']];

            if (isset($input['fecha_itinerario'])) {
                if (!preg_match('/^\d{4}-\d{2}-\d{2}$/', $input['fecha_itinerario'])) {
                    sendResponse(400, ["success" => false, "error" => "Formato de fecha inválido. Use YYYY-MM-DD"]);
                }
                $updates[] = "fecha_itinerario = :fecha";
                $params[':fecha'] = $input['fecha_itinerario'];
            }

            if (isset($input['hora_inicio'])) {
                if (!preg_match('/^\d{2}:\d{2}(:\d{2})?$/', $input['hora_inicio'])) {
                    sendResponse(400, ["success" => false, "error" => "Formato de hora inválido. Use HH:MM o HH:MM:SS"]);
                }
                $hora_inicio = (strlen($input['hora_inicio']) === 5) ? $input['hora_inicio'].':00' : $input['hora_inicio'];
                $updates[] = "hora_inicio = :hora_inicio";
                $params[':hora_inicio'] = $hora_inicio;
            }

            if (isset($input['hora_fin'])) {
                if (!preg_match('/^\d{2}:\d{2}(:\d{2})?$/', $input['hora_fin'])) {
                    sendResponse(400, ["success" => false, "error" => "Formato de hora inválido. Use HH:MM o HH:MM:SS"]);
                }
                $hora_fin = (strlen($input['hora_fin']) === 5) ? $input['hora_fin'].':00' : $input['hora_fin'];
                $updates[] = "hora_fin = :hora_fin";
                $params[':hora_fin'] = $hora_fin;
            }

            if (isset($input['descripcion'])) {
                $updates[] = "descripcion = :descripcion";
                $params[':descripcion'] = $input['descripcion'];
            }

            if (empty($updates)) {
                sendResponse(400, ["success" => false, "error" => "No hay datos para actualizar"]);
            }

            $query = "UPDATE itinerario SET " . implode(", ", $updates) . 
                     " WHERE id_itinerario = :id";
            
            file_put_contents('itinerario_log.txt', "Query UPDATE: $query\nParams: ".print_r($params, true)."\n", FILE_APPEND);
            
            $stmt = $conn->prepare($query);
            
            foreach ($params as $key => $value) {
                $paramType = (is_int($value)) ? PDO::PARAM_INT : PDO::PARAM_STR;
                $stmt->bindValue($key, $value, $paramType);
            }

            if ($stmt->execute()) {
                sendResponse(200, ["success" => true, "affected_rows" => $stmt->rowCount()]);
            } else {
                $errorInfo = $stmt->errorInfo();
                file_put_contents('itinerario_log.txt', "Error en UPDATE: ".print_r($errorInfo, true)."\n", FILE_APPEND);
                sendResponse(500, ["success" => false, "error" => "Error al actualizar", "details" => $errorInfo]);
            }
            break;

        case 'DELETE':
        
            file_put_contents('itinerario_log.txt', "DELETE Input: ".print_r($input, true)."\n", FILE_APPEND);
            
            $id_itinerario = $input['id_itinerario'] ?? null;
            if (!$id_itinerario) {
                sendResponse(400, ["success" => false, "error" => "Se requiere id_itinerario"]);
            }

            $query = "DELETE FROM itinerario WHERE id_itinerario = :id";
            $stmt = $conn->prepare($query);
            $stmt->bindParam(":id", $id_itinerario, PDO::PARAM_INT);

            if ($stmt->execute()) {
                sendResponse(200, ["success" => true, "affected_rows" => $stmt->rowCount()]);
            } else {
                $errorInfo = $stmt->errorInfo();
                file_put_contents('itinerario_log.txt', "Error en DELETE: ".print_r($errorInfo, true)."\n", FILE_APPEND);
                sendResponse(500, ["success" => false, "error" => "Error al eliminar", "details" => $errorInfo]);
            }
            break;

        case 'OPTIONS':
            sendResponse(200, ["success" => true]);
            break;

        default:
            sendResponse(405, ["success" => false, "error" => "Método no permitido"]);
    }
} catch (PDOException $e) {
    file_put_contents('itinerario_log.txt', "PDOException: ".$e->getMessage()."\n", FILE_APPEND);
    sendResponse(500, ["success" => false, "error" => "Error en el servidor", "details" => $e->getMessage()]);
} catch (Exception $e) {
    file_put_contents('itinerario_log.txt', "Exception: ".$e->getMessage()."\n", FILE_APPEND);
    sendResponse(500, ["success" => false, "error" => "Error general", "details" => $e->getMessage()]);
}
?>