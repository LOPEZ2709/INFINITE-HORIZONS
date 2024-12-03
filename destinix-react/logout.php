<?php
session_start(); // Inicia o reanuda la sesión
session_unset(); // Elimina todas las variables de sesión
session_destroy(); // Destruye la sesión activa

// Redirige al formulario de inicio de sesión
header("Location: /login");
exit();
?>
