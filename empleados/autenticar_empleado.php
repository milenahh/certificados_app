<?php

// Conectar a la base de datos
$conexion = new mysqli("localhost", "root", "0103", "empleados");

// Verificar si la conexión fue exitosa
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Obtener datos del formulario
$correo = $_POST['correo'];
$id = $_POST['id'];

// Consulta para verificar las credenciales
$sql = "SELECT * FROM empleados WHERE correo = '$correo' AND id = '$id'";

$resultado = $conexion->query($sql);

if ($resultado->num_rows == 1) {
    // Credenciales válidas, crear sesión y redirigir al panel del empleado
    session_start();
    $_SESSION['correo'] = $correo;
    header("Location: panel_empleado.php");
} else {
    // Credenciales inválidas, mostrar mensaje de error
    echo '<div class="alert alert-danger text-center" role="alert">
            Error: Credenciales inválidas. Vuelve a intentarlo.
          </div>';
}

$conexion->close();

?>