<?php

// Verificar si se enviaron datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Establecer conexión con la base de datos
    $conexion = new mysqli("localhost", "root", "0103", "empleados");

    // Verificar si la conexión fue exitosa
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener datos del formulario
    $nombre = $_POST['nombre'];
    $id= $_POST['identificacion'];
    $puesto = $_POST['puesto'];
    $departamento = $_POST['departamento'];
    $correo = $_POST['correo'];
    $salario = $_POST['salario'];
    $fecha_ingreso = $_POST['fecha_ingreso'];

    // Escapar los datos para prevenir inyección de SQL
    $nombre = $conexion->real_escape_string($nombre);
    $id = $conexion->real_escape_string($id);
    $puesto = $conexion->real_escape_string($puesto);
    $departamento = $conexion->real_escape_string($departamento);
    $correo = $conexion->real_escape_string($correo);
    $salario = $conexion->real_escape_string($salario);
    $fecha_ingreso = $conexion->real_escape_string($fecha_ingreso);

    // Crear la consulta SQL para insertar un nuevo empleado
    $sql = "INSERT INTO empleados (nombre, id, puesto, departamento, correo, salario, fecha_ingreso) VALUES ('$nombre', '$id', '$puesto', '$departamento', '$correo', '$salario', '$fecha_ingreso')";

    // Ejecutar la consulta
    if ($conexion->query($sql) === TRUE) {
        echo "Empleado añadido exitosamente.";
        ?>
        <button class="btn btn-primary" onclick="window.location.href='panel_admin.php'">Volver al Panel de Admin</button>
        <?php
    } else {
        echo "Error al añadir empleado: " . $conexion->error;
        ?>
        <button class="btn btn-primary" onclick="window.location.href='panel_admin.php'">Volver al Panel de Admin</button>
        <?php
    }

    // Cerrar conexión
    $conexion->close();
} else {
    echo "Acceso no autorizado.";
}
