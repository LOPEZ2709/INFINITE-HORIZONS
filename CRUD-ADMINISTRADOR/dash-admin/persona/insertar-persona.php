<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/servidor/persona/personaDB.php');
include_once($_SERVER['DOCUMENT_ROOT'] . '/CODIGO/dashboard/dash-admin/barra-lateral/config.php');

$db = new Database();
$conexion = $db->getConnection();
$personaDB = new PersonaDB($conexion);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre_usu'];
    $apellido = $_POST['apellido_usu'];
    $tipo_documento = $_POST['tipo_documento'];
    $documento = $_POST['documento'];
    $email = $_POST['email_usu'];
    $telefono = $_POST['telefono_usu'];
    $genero = $_POST['genero'];
    $localidad = $_POST['localidad'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $contraseña = $_POST['contraseña'];
    $id_estado = $_POST['id_estado'];
    $id_seguridad = $_POST['id_seguridad'];
    $rol_id = $_POST['rol_idRol'];

    $personaDB->insertarPersona($nombre, $apellido, $tipo_documento, $documento, $email, $telefono, $genero, $localidad, $fecha_nacimiento, $contraseña, $id_estado, $id_seguridad, $rol_id);
    header("Location: persona.php"); 
}
?>

<h2>Agregar Nueva Persona</h2>
<form method="POST">
    <label for="nombre_usu">Nombre:</label>
    <input type="text" name="nombre_usu" required>
    
    <label for="apellido_usu">Apellido:</label>
    <input type="text" name="apellido_usu" required>
    
    <label for="tipo_documento">Tipo de Documento:</label>
    <input type="text" name="tipo_documento" required>
    
    <label for="documento">Documento:</label>
    <input type="text" name="documento" required>
    
    <label for="email_usu">Email:</label>
    <input type="email" name="email_usu" required>
    
    <label for="telefono_usu">Teléfono:</label>
    <input type="text" name="telefono_usu" required>
    
    <label for="genero">Género:</label>
    <input type="text" name="genero" required>
    
    <label for="localidad">Localidad:</label>
    <input type="text" name="localidad" required>
    
    <label for ="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" required>
    
    <label for="contraseña">Contraseña:</label>
    <input type="password" name="contraseña" required>
    
    <label for="id_estado">ID Estado:</label>
    <input type="number" name="id_estado" required>
    
    <label for="id_seguridad">ID Seguridad:</label>
    <input type="number" name="id_seguridad" required>
    
    <label for="rol_idRol">Rol ID:</label>
    <input type="number" name="rol_idRol" required>
    
    <button type="submit">Agregar Persona</button>
</form>