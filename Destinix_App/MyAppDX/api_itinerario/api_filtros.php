<?php

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once 'conexion.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
    $tipo = strtolower(trim($_GET['tipo'] ?? ''));
    $filtro = trim($_GET['filtro'] ?? '');
    
    $tiposPermitidos = ['restaurante', 'hotel', 'sitio'];
    $usarTipo = in_array($tipo, $tiposPermitidos);

    $resultados = [];

    
    function buscarPorTipo($conn, $tipo, $filtro) {
        switch ($tipo) {
            case 'restaurante':
                $query = "SELECT id_restaurante AS id, titulo_restaurante AS nombre, img, desc_restaurantes AS descripcion 
                          FROM restaurantes WHERE estado_id_estado = 1";
                $campoBusqueda = "titulo_restaurante";
                $campoDesc = "desc_restaurantes";
                break;
            case 'hotel':
                $query = "SELECT id_hoteles AS id, titulo_hotel AS nombre, img, descripcion_hotel AS descripcion 
                          FROM hoteles WHERE estado_id_estado = 1";
                $campoBusqueda = "titulo_hotel";
                $campoDesc = "descripcion_hotel";
                break;
            case 'sitio':
                $query = "SELECT id_sitio AS id, nombre_sitio AS nombre, img_sitio AS img, desc_sitio AS descripcion 
                          FROM sitio_turistico WHERE estado_id_estado = 1";
                $campoBusqueda = "nombre_sitio";
                $campoDesc = "desc_sitio";
                break;
            default:
                return [];
        }

        if (!empty($filtro)) {
            $query .= " AND ($campoBusqueda LIKE :filtro OR $campoDesc LIKE :filtro)";
            $paramFiltro = "%" . $filtro . "%";
        }

        $stmt = $conn->prepare($query);
        if (!empty($filtro)) {
            $stmt->bindParam(':filtro', $paramFiltro);
        }
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

      
        return array_map(function($item) use ($tipo) {
            return array_merge($item, ['tipo' => $tipo]);
        }, $datos);
    }

    
    if ($usarTipo) {
        $resultados = buscarPorTipo($conn, $tipo, $filtro);
    } else {
        foreach ($tiposPermitidos as $tipoItem) {
            $resultados = array_merge($resultados, buscarPorTipo($conn, $tipoItem, $filtro));
        }
    }

    echo json_encode([
        'success' => true,
        'data' => $resultados,
        'count' => count($resultados)
    ]);

} catch (PDOException $e) {
    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Error en base de datos',
        'details' => $e->getMessage()
    ]);
}
