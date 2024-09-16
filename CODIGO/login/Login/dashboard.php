<?php
session_start(); // Inicia una nueva sesión o reanuda una existente

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header("Location: ../../dashboardd/1.html"); // Redirige al formulario de inicio de sesión si no está autenticado
    exit();
}

echo "<h1>Bienvenido, " . $_SESSION['email'] . "!</h1>";
echo "<p>Has iniciado sesión correctamente.</p>";

session_destroy();
exit();