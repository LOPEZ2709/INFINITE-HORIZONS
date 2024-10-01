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
$nombre = mysqli_real_escape_string($conn, $_POST['nombre']);
$apellidos = mysqli_real_escape_string($conn, $_POST['apellidos']);
$telefono = mysqli_real_escape_string($conn, $_POST['telefono']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$documento = mysqli_real_escape_string($conn, $_POST['documento']);
$localidad = mysqli_real_escape_string($conn, $_POST['localidad']);
$genero = mysqli_real_escape_string($conn, $_POST['genero']);
$fecha = mysqli_real_escape_string($conn, $_POST['fecha']);
$contraseña = mysqli_real_escape_string($conn, $_POST['contraseña']);

$hash = password_hash($contraseña, PASSWORD_BCRYPT);


// Insertar en la tabla de estados y obtener el ID
$sql_estado = "INSERT INTO estado (desc_estado) VALUES ('activo')";
if (mysqli_query($conn, $sql_estado)) {
    $id_estado = mysqli_insert_id($conn);
} else {
    die("Error al insertar en la tabla de estados: " . mysqli_error($conn));
}

// Insertar en la tabla de seguridad y obtener el ID (usando el hash de la contraseña)
$sql_seguridad = "INSERT INTO seguridad (email_usu, contra_usu) VALUES ('$email', '$hash')";
if (mysqli_query($conn, $sql_seguridad)) {
    $id_seguridad = mysqli_insert_id($conn);
} else {
    die("Error al insertar en la tabla de seguridad: " . mysqli_error($conn));
}

// Insertar el usuario con las claves generadas (también usando el hash de la contraseña)
$sql_usuario = "INSERT INTO usuario (nombre_usu, apellido_usu, telefono_usu, email_usu, fecha_registro, estado, genero, localidad, fecha_nacimiento, contra_usu, documento, id_estado, id_seguridad)
                VALUES ('$nombre', '$apellidos', '$telefono', '$email', NOW(), 'activo', '$genero', '$localidad', '$fecha', '$hash', '$documento', '$id_estado', '$id_seguridad')";

if (mysqli_query($conn, $sql_usuario)) {
    echo "Registro exitoso";
} else {
    die("Error al insertar en la tabla de usuario: " . mysqli_error($conn));
}

// Recoger email y contraseña del formulario de inicio de sesión
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