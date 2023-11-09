<?php
session_start();

// Destruir todas las variables de sesión
session_destroy();

// Redirigir al inicio de sesión del administrador
header("Location: login_admin.php");
exit();
?>