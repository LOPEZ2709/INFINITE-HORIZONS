<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: http://localhost:3000"); 
header("Access-Control-Allow-Methods: POST, GET, OPTIONS"); 
header("Access-Control-Allow-Headers: Content-Type, Authorization"); 




$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infiniteh";

$conn = mysqli_connect($servername, $username, $password, $dbname);


if (!$conn) {
    echo json_encode(['success' => false, 'message' => 'Error de conexión con la base de datos.']);
    exit;
}


$email = mysqli_real_escape_string($conn, $_POST['email']);
$contraseña = $_POST['password'];


$sql = "SELECT contra_usu FROM seguridad WHERE email_usu = ?";
$stmt = mysqli_prepare($conn, $sql);

if ($stmt) {

    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $hash_almacenado = $row['contra_usu'];


        if (password_verify($contraseña, $hash_almacenado)) {
            echo json_encode(['success' => true, 'message' => 'Inicio de sesión exitoso.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Contraseña incorrecta.']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Usuario no encontrado.']);
    }


    mysqli_stmt_close($stmt);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al preparar la consulta.']);
}


mysqli_close($conn);
