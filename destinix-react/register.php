<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Authorization, Content-Type");
header("Content-Type: application/json; charset=UTF-8");

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infiniteh";


$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    die(json_encode(["message" => "Connection failed: " . mysqli_connect_error()]));
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $nombre = isset($_POST['nombre']) ? mysqli_real_escape_string($conn, $_POST['nombre']) : '';
    $apellidos = isset($_POST['apellidos']) ? mysqli_real_escape_string($conn, $_POST['apellidos']) : '';
    $telefono = isset($_POST['telefono']) ? mysqli_real_escape_string($conn, $_POST['telefono']) : '';
    $email = isset($_POST['email']) ? mysqli_real_escape_string($conn, $_POST['email']) : '';
    $documento = isset($_POST['documento']) ? mysqli_real_escape_string($conn, $_POST['documento']) : '';
    $localidad = isset($_POST['localidad']) ? mysqli_real_escape_string($conn, $_POST['localidad']) : '';
    $genero = isset($_POST['genero']) ? mysqli_real_escape_string($conn, $_POST['genero']) : '';
    $fecha = isset($_POST['fecha']) ? mysqli_real_escape_string($conn, $_POST['fecha']) : '';
    $contraseña = isset($_POST['contraseña']) ? mysqli_real_escape_string($conn, $_POST['contraseña']) : '';


    if (empty($nombre) || empty($apellidos) || empty($telefono) || empty($email) || empty($documento) || empty($localidad) || empty($genero) || empty($fecha) || empty($contraseña)) {
        echo json_encode(["message" => "Todos los campos son obligatorios."]);
        exit();
    }


    if (strlen($documento) !== 10 || !ctype_digit($documento)) {
        echo json_encode(["message" => "Documento de identidad inválido"]);
        exit();
    }

    if (
        !preg_match('/[A-Z]/', $contraseña) ||
        !preg_match('/[a-z]/', $contraseña) ||
        !preg_match('/[0-9]/', $contraseña) ||
        !preg_match('/[\W_]/', $contraseña) ||
        strlen($contraseña) < 8
    ) {
        echo json_encode(["message" => "La contraseña debe tener al menos 8 caracteres, incluyendo mayúsculas, minúsculas, números y caracteres especiales."]);
        exit();
    }

    $hash = password_hash($contraseña, PASSWORD_BCRYPT);

    $sql_verificar_telefono = "SELECT telefono_usu FROM usuario where telefono_usu = '$telefono'";
    $resultado = mysqli_query($conn, $sql_verificar_telefono);
    
    if (mysqli_num_rows($resultado) > 0) {
        echo json_encode(["message" => "El teléfono ya está registrado"]);
        exit();
    }

    $sql_verificar_documento = "SELECT documento FROM usuario WHERE documento = '$documento'";
    $result = mysqli_query($conn, $sql_verificar_documento);

    if (mysqli_num_rows($result) > 0) {
        echo json_encode(["message" => "El documento de identidad ya está registrado"]);
        exit();
    }

    $fecha_nacimiento = DateTime::createFromFormat('Y-m-d', $fecha);
    $hoy = new DateTime();
    $edad = $hoy->diff($fecha_nacimiento)->y;

    if ($edad < 18) {
        echo json_encode(["message" => "Debes tener al menos 18 años para registrarte"]);
        exit();
    }

    $sql_estado = "INSERT INTO estado (desc_estado) VALUES ('activo')";
    if (mysqli_query($conn, $sql_estado)) {
        $id_estado = mysqli_insert_id($conn);
    } else {
        echo json_encode(["message" => "Error al insertar en la tabla de estados: " . mysqli_error($conn)]);
        exit();
    }


    $sql_seguridad = "INSERT INTO seguridad (email_usu, contra_usu) VALUES ('$email', '$hash')";
    if (mysqli_query($conn, $sql_seguridad)) {
        $id_seguridad = mysqli_insert_id($conn);
    } else {
        echo json_encode(["message" => "Error al insertar en la tabla de seguridad: " . mysqli_error($conn)]);
        exit();
    }


    $sql_usuario = "INSERT INTO usuario (nombre_usu, apellido_usu, telefono_usu, email_usu, fecha_registro, estado, genero, localidad, fecha_nacimiento, contra_usu, documento, id_estado, id_seguridad)
                    VALUES ('$nombre', '$apellidos', '$telefono', '$email', NOW(), 'activo', '$genero', '$localidad', '$fecha', '$hash', '$documento', '$id_estado', '$id_seguridad')";
    if (mysqli_query($conn, $sql_usuario)) {
        echo json_encode(["message" => "Registro exitoso"]);
    } else {
        echo json_encode(["message" => "Error al insertar en la tabla de usuario: " . mysqli_error($conn)]);
    }
} else {
    echo json_encode(["message" => "Método no permitido."]);
}


mysqli_close($conn);
