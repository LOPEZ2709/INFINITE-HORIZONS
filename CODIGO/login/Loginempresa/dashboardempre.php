<?php
session_start(); // Inicia una nueva sesión o reanuda una existente

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['email'])) {
    header("Location: ../../Loginempresa/dashboardempre.html");
    exit();
}

echo "<h1>Bienvenido, " . $_SESSION['email'] . "!</h1>";
echo "<p>Has iniciado sesión correctamente.</p>";

session_destroy();
exit();