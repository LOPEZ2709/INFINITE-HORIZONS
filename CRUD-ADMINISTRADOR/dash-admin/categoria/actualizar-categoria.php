<?php

include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/servidor/categoria/categoriaDB.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php'); 


$database = new Database();
$dbConnection = $database->getConnection(); 


$categoria = new CategoriaDB($dbConnection); 


if (isset($_GET['id'])) {
    $id_categoria = $_GET['id'];
    $categoriaData = $categoria->obtenerCategoriaPorId($id_categoria);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $nombre_cate = $_POST['nombre_cate'];
        $desc_cate = $_POST['desc_cate'];


        if ($categoria->actualizarCategoria($id_categoria, $nombre_cate, $desc_cate)) {
            header('Location: categoria.php');
            exit();
        } else {
            echo "Error al actualizar la categoría.";
        }
    }
} else {
    echo "No se recibió el ID de la categoría.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Categoría</title>
</head>
<body>
    <h1>Actualizar Categoría</h1>

    <form action="actualizar-categoria.php?id=<?php echo $categoriaData['id_categoria']; ?>" method="POST">
        <label for="nombre_cate">Nombre de la categoría:</label>
        <input type="text" name="nombre_cate" value="<?php echo htmlspecialchars($categoriaData['nombre_cate']); ?>" required><br><br>
        <label for="desc_cate">Descripción:</label>
        <input type="text" name="desc_cate" value="<?php echo htmlspecialchars($categoriaData['desc_cate']); ?>" required><br><br>
        <button type="submit">Actualizar Categoría</button>
    </form>
</body>
</html>