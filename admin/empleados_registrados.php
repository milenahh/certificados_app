<?php
$conexion = new mysqli("localhost", "root", "0103", "empleados");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

$sql = "SELECT * FROM empleados";
$resultado = $conexion->query($sql);

if ($resultado->num_rows > 0) {
    echo "<table border='1'>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Cargo</th>
            <th>Departamento</th>
            <th>Correo</th>
            <th>Salario</th>
            <th>fecha de Ingreso</th>
        </tr>";

    while($row = $resultado->fetch_assoc()) {
        echo "<tr>
            <td>" . $row['id'] . "</td>
            <td>" . $row['nombre'] . "</td>
            <td>" . $row['puesto'] . "</td>
            <td>" . $row['departamento'] . "</td>
            <td>" . $row['correo'] . "</td>
            <td>" . $row['salario'] . "</td>
            <td>" . $row['fecha_ingreso'] . "</td>
        </tr>";
    }

    echo "</table>";
  
    echo "<a href='panel_admin.php' class='btn btn-secondary mt-3'>Volver al Panel de Administrador</a>";
    


} else {
    echo "No se encontraron empleados.";
    echo "<a href='panel_admin.php' class='btn btn-secondary mt-3'>Volver al Panel de Administrador</a>";
}

$conexion->close();
?>