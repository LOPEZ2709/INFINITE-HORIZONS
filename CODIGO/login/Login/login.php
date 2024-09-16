<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infiniteh";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verificar conexión
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Recoger datos del formulario
$email = mysqli_real_escape_string($conn, $_POST['email']);
$contraseña = mysqli_real_escape_string($conn, $_POST['contraseña']);

// Consultar en la base de datos
$sql = "SELECT * FROM seguridad WHERE email_usu = '$email' AND contra_usu = '$contraseña'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    // Inicio de sesión exitoso
    echo json_encode(['success' => true]);
} else {
    // Credenciales incorrectas
    echo json_encode(['success' => false, 'message' => 'El email o la contraseña son incorrectos.']);
}

// Cerrar conexión
mysqli_close($conn);