<?php
// Iniciar la sesión si aún no se ha iniciado
session_start();

// Destruir la sesión
session_destroy();

// Redirigir al usuario a la página de inicio de sesión o a donde desees
header("Location: ../index.php"); // Cambia "inicio_sesion.php" por la URL de tu página de inicio de sesión
exit(); // Asegurarse de que no se ejecute más código después de la redirección
?>
