<?php
// Incluir el archivo de conexión
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/servidor/empresa/empresaDB.php');

// Crear una instancia de la clase Empresa
$empresa = new EmpresaDB();

// Obtener la empresa a actualizar
if (isset($_GET['id'])) {
    $id_empresa = $_GET['id'];
    $empresaData = $empresa->obtenerEmpresaPorId($id_empresa);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener los datos del formulario
        $nombre_emp = $_POST['nombre_emp'];
        $direccion_emp = $_POST['direccion_emp'];
        $correo_empresa = $_POST['correo_empresa'];
        $telefono_empresa = $_POST['telefono_empresa'];
        $persona_id_persona = $_POST['persona_id_persona'];
        $id_categoria = $_POST['id_categoria'];

        // Actualizar la empresa
        if ($empresa->actualizarEmpresa($id_empresa, $nombre_emp, $direccion_emp, $correo_empresa, $telefono_empresa, $persona_id_persona, $id_categoria)) {
            header('Location: empresa.php');
            exit();
        } else {
            echo "Error al actualizar la empresa.";
        }
    }
} else {
    echo "No se recibió el ID de la empresa.";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Empresa</title>
</head>
<body>
    <h1>Actualizar Empresa</h1>

    <form action="actualizar-empresa.php?id=<?php echo $empresaData['id_empresa']; ?>" method="POST">
        <label for="nombre_emp">Nombre de la empresa:</label>
        <input type="text" name="nombre_emp" value="<?php echo $empresaData['nombre_emp']; ?>" required><br><br>
        <label for="direccion_emp">Dirección:</label>
        <input type="text" name="direccion_emp" value="<?php echo $empresaData['direccion_emp']; ?>" required><br><br>
        <label for="correo_empresa">Correo:</label>
        <input type="email" name="correo_empresa" value="<?php echo $empresaData['correo_empresa']; ?>" required><br><br>
        <label for="telefono_empresa">Teléfono:</label>
        <input type="text" name="telefono_empresa" value="<?php echo $empresaData['telefono_empresa']; ?>" required><br><br>
        <label for="persona_id_persona">ID Persona:</label>
        <input type="number" name="persona_id_persona" value="<?php echo $empresaData['persona_id_persona']; ?>" required><br><br>
        <label for="id_categoria">ID Categoría:</label>
        <input type="number" name="id_categoria" value="<?php echo $empresaData['id_categoria']; ?>" required><br><br>
        <button type="submit">Actualizar Empresa</button>
    </form>
</body>
</html>
