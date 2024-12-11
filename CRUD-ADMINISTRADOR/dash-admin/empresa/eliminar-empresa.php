<?php
// Incluir el archivo de la clase EmpresaDB
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/servidor/empresa/empresaDB.php');

// Verificar si se recibió el parámetro de ID por la URL
if (isset($_GET['id'])) {
    $id_empresa = $_GET['id'];

    // Crear una instancia de la clase EmpresaDB
    $empresaDB = new EmpresaDB();

    // Eliminar la empresa
    if ($empresaDB->eliminarEmpresa($id_empresa)) {
        echo "Empresa eliminada correctamente.";
    } else {
        echo "Error al eliminar la empresa.";
    }
} else {
    echo "No se proporcionó un ID válido.";
}
?>
