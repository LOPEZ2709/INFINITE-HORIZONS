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
$usuario = 'ADMINIFHT'; // Usuario estático, o usar $_POST['usuario'] si se desea recoger del formulario
$contraseña = $_POST['contraseña'];

// Buscar el registro único por nombre de usuario
$sql = "SELECT contra_admin FROM administrador WHERE usu_admin = '$usuario' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hash_almacenado = $row['contra_admin']; // Hash de la contraseña almacenada

    // Verificar si la contraseña ingresada coincide con el hash almacenado
    if (password_verify($contraseña, $hash_almacenado)) {
        // Inicio de sesión exitoso
        header('Location: dashboardadmin.html');
        exit(); // Asegúrate de finalizar el script después de header()
    } else {
        // Contraseña incorrecta
        echo "<p>Contraseña incorrecta.</p>";
    }
} else {
    // Usuario no encontrado
    echo "<p>Usuario no encontrado.</p>";
}

// Cerrar conexión
mysqli_close($conn);