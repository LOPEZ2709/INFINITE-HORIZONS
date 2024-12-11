<?php
// Incluir el archivo de conexión
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');

// Crear una instancia de la clase Database para obtener la conexión
$database = new Database();
$conn = $database->getConnection();

// Verificar si se ha recibido el ID de la categoría a eliminar
if (isset($_GET['id'])) {
    $id_categoria = $_GET['id'];

    try {
        // Iniciar una transacción
        $conn->beginTransaction();

        // Eliminar las filas relacionadas en la tabla empresa
        $queryDeleteEmpresa = "DELETE FROM empresa WHERE id_categoria = :id_categoria";
        $stmt = $conn->prepare($queryDeleteEmpresa);
        $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
        $stmt->execute();

        // Eliminar la categoría de la tabla categoria
        $queryDeleteCategoria = "DELETE FROM categoria WHERE id_categoria = :id_categoria";
        $stmt = $conn->prepare($queryDeleteCategoria);
        $stmt->bindParam(':id_categoria', $id_categoria, PDO::PARAM_INT);
        $stmt->execute();

        // Confirmar la transacción
        $conn->commit();

        // Redirigir a la página principal de categorías después de eliminar
        header('Location: categoria.php');
        exit();
    } catch (PDOException $e) {
        // En caso de error, hacer rollback de la transacción
        $conn->rollBack();
        echo "Error al eliminar la categoría: " . $e->getMessage();
    }
} else {
    echo "No se recibió el ID de la categoría.";
}
?>
