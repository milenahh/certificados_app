<?php

session_start();

// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "0103", "empleados");

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

// Consulta para verificar las credenciales del administrador
$sql = "SELECT * FROM administradores WHERE usuario = 'admin' AND contrasena = '1234'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows == 1) {
    // Credenciales válidas, crear sesión y redirigir al panel del administrador
    $_SESSION['admin'] = true;
    header("Location: panel_admin.php");
    exit();
} else {
    // Credenciales inválidas, mostrar mensaje de error
    echo '<div class="alert alert-danger text-center" role="alert">
            Error: Credenciales inválidas. Vuelve a intentarlo.
          </div>';
}

$conexion->close();
?>