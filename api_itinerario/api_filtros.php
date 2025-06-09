<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
require_once 'conexion.php';


ini_set('display_errors', 1);
error_reporting(E_ALL);

try {
 
    $tipo = strtolower(trim($_GET['tipo'] ?? ''));
    $filtro = trim($_GET['filtro'] ?? '');
    $localidad = trim($_GET['localidad'] ?? '');
    $categoria = trim($_GET['categoria'] ?? '');
    $limite = min((int)($_GET['limite'] ?? 20), 50); 
    
    
    $tiposPermitidos = ['restaurante', 'hotel', 'sitio'];
    $usarTipo = in_array($tipo, $tiposPermitidos);

   
    $resultados = [];
    
    
    function buscarPorTipo($conn, $tipo, $filtro, $localidad, $categoria, $limite) {
      
        switch ($tipo) {
            case 'restaurante':
                $query = "SELECT r.id_restaurante AS id, r.titulo_restaurante AS nombre, r.img, r.desc_restaurantes AS descripcion, e.nombre_emp AS empresa,
                         cat.nombre_cate AS categoria FROM restaurantes r JOIN empresa e ON r.empresa_id_empresa = e.id_empresa JOIN categoria cat ON e.id_categoria = cat.id_categoria
                         WHERE r.estado_id_estado = 0"; 

                $campoBusqueda = "r.titulo_restaurante";
                $campoDesc = "r.desc_restaurantes";
                $tipoRetorno = "restaurante";
                break;
                
            case 'hotel':
                $query = "SELECT h.id_hoteles AS id, h.titulo_hotel AS nombre, h.img,  h.descripcion_hotel AS descripcion, e.nombre_emp AS empresa,
                          cat.nombre_cate AS categoria FROM hoteles h JOIN empresa e ON h.empresa_id_empresa = e.id_empresa JOIN categoria cat ON e.id_categoria = cat.id_categoria
                          WHERE h.estado_id_estado = 0"; 

                $campoDesc = "h.descripcion_hotel";
                $tipoRetorno = "hotel";
                break;
                
            case 'sitio':
                $query = "SELECT s.id_sitio AS id, s.nombre_sitio AS nombre, 
                                 s.img_sitio AS img, 
                                 s.desc_sitio AS descripcion,
                                 'Destino turístico' AS empresa,
                                 'Sitio turistico' AS categoria,
                                 s.ubicacion_sitio AS localidad
                          FROM sitio_turistico s
                          WHERE s.estado_id_estado = 0"; 
                $campoBusqueda = "s.nombre_sitio";
                $campoDesc = "s.desc_sitio";
                $tipoRetorno = "sitio";
                break;
                
            default:
                return [];
        }

        
        $params = [];
        
        // Filtro de texto
        if (!empty($filtro)) {
            $query .= " AND (LOWER($campoBusqueda) LIKE :filtro OR LOWER($campoDesc) LIKE :filtro)";
            $params[':filtro'] = '%' . strtolower($filtro) . '%';
        }
        
        // Filtro por localidad (solo para sitios turísticos)
        if (!empty($localidad) && $tipo == 'sitio') {
            $query .= " AND LOWER(s.ubicacion_sitio) LIKE :localidad";
            $params[':localidad'] = '%' . strtolower($localidad) . '%';
        }
        
        // Filtro por categoría (para hoteles y restaurantes)
        if (!empty($categoria) && in_array($tipo, ['hotel', 'restaurante'])) {
            $query .= " AND LOWER(cat.nombre_cate) LIKE :categoria";
            $params[':categoria'] = '%' . strtolower($categoria) . '%';
        }
        
        
        $query .= " LIMIT :limite";
        $params[':limite'] = $limite;

      
        $stmt = $conn->prepare($query);
        
        foreach ($params as $key => &$val) {
            if ($key == ':limite') {
                $stmt->bindParam($key, $val, PDO::PARAM_INT);
            } else {
                $stmt->bindParam($key, $val);
            }
        }
        
        $stmt->execute();
        $datos = $stmt->fetchAll(PDO::FETCH_ASSOC);

       
        return array_map(function($item) use ($tipoRetorno) {
            return array_merge($item, ['tipo' => $tipoRetorno]);
        }, $datos);
    }

    
    if ($usarTipo) {
        
        $resultados = buscarPorTipo($conn, $tipo, $filtro, $localidad, $categoria, $limite);
    } else {
       
        foreach ($tiposPermitidos as $tipoItem) {
            $resultados = array_merge(
                $resultados, 
                buscarPorTipo($conn, $tipoItem, $filtro, $localidad, $categoria, $limite)
            );
        }
    }

    if (count($resultados) > 1) {
        usort($resultados, function($a, $b) {
            return strcmp($a['nombre'], $b['nombre']);
        });
    }


    echo json_encode([
        'success' => true,
        'data' => $resultados,
        'count' => count($resultados),
        'filters' => [
            'tipo' => $tipo,
            'texto' => $filtro,
            'localidad' => $localidad,
            'categoria' => $categoria
        ]
    ]);

} catch (PDOException $e) {

    http_response_code(500);
    echo json_encode([
        'success' => false,
        'error' => 'Error en base de datos',
        'details' => $e->getMessage()
    ]);
}
?>