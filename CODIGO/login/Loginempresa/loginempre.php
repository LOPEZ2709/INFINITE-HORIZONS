<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "infiniteh";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Recoger datos del formulario
$email = $_POST['email'];
$contraseña = $_POST['password'];

// Usar sentencias preparadas para evitar inyección SQL
$stmt = $conn->prepare("SELECT contra_contacto FROM contacto WHERE correo_con = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $hash_almacenado = $row['contra_contacto']; // Este es el hash almacenado

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
$stmt->close();
$conn->close();