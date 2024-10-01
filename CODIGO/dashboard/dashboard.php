<?php
session_start();  // Iniciar la sesión
session_destroy();  // Destruir la sesión
header("Location: ../index.html");  // Redirigir a la página de inicio o login
exit();  // Asegurar que el script termina aquí