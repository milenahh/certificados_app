<?php
session_start();

if(isset($_POST['id'])) {
    $id = $_POST['id'];
} else {
    echo "Error: No se proporcionó un ID de empleado.";
    exit();
}



// Verificar si hay una sesión de administrador iniciada
if(isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
    // Conectar a la base de datos
    $conexion = new mysqli("localhost", "root", "0103", "empleados");

    // Verificar si la conexión fue exitosa
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Obtener los datos modificados
        $nombre = $_POST['nombre'];
        $id = $_POST['id'];
        $puesto = $_POST['puesto'];
        $departamento = $_POST['departamento'];
        $correo = $_POST['correo'];
        $salario = $_POST['salario'];
        $fecha_ingreso = $_POST['fecha_ingreso'];

        // Actualizar los datos en la base de datos
        $sql = "UPDATE empleados SET 
            nombre = '$nombre',
            id = '$id',
            puesto = '$puesto',
            departamento = '$departamento',
            correo = '$correo',
            salario = '$salario',
            fecha_ingreso = '$fecha_ingreso'
            WHERE id = '$id'";

        if ($conexion->query($sql) === TRUE) {
            echo "Empleado modificado exitosamente.";
            ?>
        <button class="btn btn-primary" onclick="window.location.href='panel_admin.php'">Volver al Panel de Admin</button>
        <?php
            
        } else {
            echo "Error al modificar el empleado: " . $conexion->error;
        }
    }

    // Cerrar conexión
    $conexion->close();
} else {
    header("Location: login_admin.php");
    exit();
}