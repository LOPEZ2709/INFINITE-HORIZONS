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
$contraseña = $_POST['contraseña'];

// Buscar el hash de la contraseña en la base de datos
$sql = "SELECT contra_usu FROM seguridad WHERE email_usu = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hash_almacenado = $row['contra_usu']; // Este es el hash almacenado

    // Verificar si la contraseña ingresada en texto plano coincide con el hash almacenado
    if (password_verify($contraseña, $hash_almacenado)) {
        echo json_encode(['success' => true]); // Inicio de sesión exitoso
    } else {
        echo json_encode(['success' => false, 'message' => 'Contraseña incorrecta.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Usuario no encontrado.']);
}

// Cerrar conexión
mysqli_close($conn);
