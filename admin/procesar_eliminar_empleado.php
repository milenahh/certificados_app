<?php
session_start();

if(isset($_SESSION['admin']) && $_SESSION['admin'] === true) {

    if(isset($_POST['id'])) {
        $id = $_POST['id'];

        $conexion = new mysqli("localhost", "root", "0103", "empleados");

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $sql = "DELETE FROM empleados WHERE id = '$id'";

        if ($conexion->query($sql) === TRUE) {
            echo "Empleado eliminado exitosamente.";
        } else {
            echo "Error al eliminar el empleado: " . $conexion->error;
        }

        $conexion->close();

    } else {
        echo "Error: No se proporcionó un ID de empleado.";
    }

} else {
    header("Location: login_admin.php");
    exit();
}
?>