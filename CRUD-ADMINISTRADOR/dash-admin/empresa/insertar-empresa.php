<?php
// Incluir el archivo de conexión
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/servidor/empresa/empresaDB.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Obtener los datos del formulario
    $nombre_emp = $_POST['nombre_emp'];
    $direccion_emp = $_POST['direccion_emp'];
    $correo_empresa = $_POST['correo_empresa'];
    $telefono_empresa = $_POST['telefono_empresa'];
    $persona_id_persona = $_POST['persona_id_persona'];
    $id_categoria = $_POST['id_categoria'];

    // Crear una instancia de la clase Empresa
    $empresa = new EmpresaDB();

    // Insertar la nueva empresa
    if ($empresa->insertarEmpresa($nombre_emp, $direccion_emp, $correo_empresa, $telefono_empresa, $persona_id_persona, $id_categoria)) {
        header('Location: empresa.php');
        exit();
    } else {
        echo "Error al insertar la empresa.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Empresa</title>
</head>
<body>
    <h1>Agregar Empresa</h1>

    <!-- Formulario para agregar nueva empresa -->
    <form action="insertar-empresa.php" method="POST">
        <label for="nombre_emp">Nombre de la empresa:</label>
        <input type="text" name="nombre_emp" id="nombre_emp" required><br><br>
        <label for="direccion_emp">Dirección:</label>
        <input type="text" name="direccion_emp" id="direccion_emp" required><br><br>
        <label for="correo_empresa">Correo:</label>
        <input type="email" name="correo_empresa" id="correo_empresa" required><br><br>
        <label for="telefono_empresa">Teléfono:</label>
        <input type="text" name="telefono_empresa" id="telefono_empresa" required><br><br>
        <label for="persona_id_persona">ID Persona:</label>
        <input type="number" name="persona_id_persona" id="persona_id_persona" required><br><br>
        <label for="id_categoria">ID Categoría:</label>
        <input type="number" name="id_categoria" id="id_categoria" required><br><br>
        <button type="submit">Agregar Empresa</button>
    </form>
</body>
</html>
