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
$nombre = mysqli_real_escape_string($conn, $_POST['contactName']);
$apellidos = mysqli_real_escape_string($conn, $_POST['contactApe']);
$telefono = mysqli_real_escape_string($conn, $_POST['contactTel']);
$email = mysqli_real_escape_string($conn, $_POST['contactEmail']);
$empresa = mysqli_real_escape_string($conn, $_POST['companyName']);
$contraseña = mysqli_real_escape_string($conn, $_POST['password']);


$hash = password_hash($contraseña, PASSWORD_BCRYPT);

// Insertar el usuario con las claves generadas (también usando el hash de la contraseña)
$sql_contacto = "INSERT INTO contacto (nombre_con, apellido_con, telefono_con, correo_con, nombre_emp, contra_contacto)
                VALUES ('$nombre','$apellidos','$telefono','$email','$empresa','$hash')";

if (mysqli_query($conn, $sql_contacto)) {
    echo "Registro exitoso";
} else {
    die("Error al insertar en la tabla de usuario: " . mysqli_error($conn));
}

// Recoger email y contraseña del formulario de inicio de sesión
$email = mysqli_real_escape_string($conn, $_POST['correo']);
$contraseña = $_POST['contraseña'];

// Buscar el hash de la contraseña en la base de datos
$sql = "SELECT contra_contacto FROM contacto WHERE correo_con = '$email'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $hash_almacenado = $row['contra_contacto']; // Este es el hash almacenado

    // Verificar si la contraseña ingresada en texto plano coincide con el hash almacenado
    if (password_verify($contraseña, $hash_almacenado)) {
        echo "Inicio de sesión exitoso";
        // Aquí puedes iniciar la sesión y redirigir al dashboard
    } else {
        echo "Contraseña incorrecta";
    }
} else {
    echo "Usuario no encontrado";
}
// Cerrar conexión
mysqli_close($conn);