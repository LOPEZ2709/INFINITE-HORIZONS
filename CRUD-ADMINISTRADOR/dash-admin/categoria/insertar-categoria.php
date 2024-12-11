<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/servidor/categoria/categoriaDB.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php'); 


$database = new Database();
$dbConnection = $database->getConnection(); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $nombre_cate = $_POST['nombre_cate'];
    $desc_cate = $_POST['desc_cate'];

  
    $categoria = new CategoriaDB($dbConnection);

    // Insertar la nueva categoría
    if ($categoria->insertarCategoria($nombre_cate, $desc_cate)) { // Asegúrate de que el método se llame correctamente
        header('Location: categoria.php');
        exit();
    } else {
        echo "Error al insertar la categoría.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Categoría</title>
</head>
<body>
    <h1>Agregar Categoría</h1>

    <form action="insertar-categoria.php" method="POST">
        <label for="nombre_cate">Nombre de la categoría:</label>
        <input type="text" name="nombre_cate" id="nombre_cate" required><br><br>
        <label for="desc_cate">Descripción:</label>
        <input type="text" name="desc_cate" id="desc_cate" required><br><br>
        <button type="submit">Agregar Categoría</button>
    </form>
</body>
</html>