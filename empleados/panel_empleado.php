<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Panel de Empleado</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Panel de Empleado</h1>
                        <?php
                        // Verificar si hay una sesión iniciada
                        session_start();
                        if(isset($_SESSION['correo'])) {
                        
                            // Conectar a la base de datos
                            $conexion = new mysqli("localhost", "root", "0103", "empleados");

                           // Verificar si la conexión fue exitosa
                           if ($conexion->connect_error) {
                            die("Error de conexión: " . $conexion->connect_error);
                        }

                            // Obtener el correo del empleado desde la sesión
                            $correo = $_SESSION['correo'];

                            // Consultar la información del empleado
                            $sql = "SELECT * FROM empleados WHERE correo = '$correo'";
                            $resultado = $conexion->query($sql);

                            if ($resultado->num_rows > 0) {
                                
                                // Mostrar la información del empleado
                                $row = $resultado->fetch_assoc();
                                $nombreCompleto = $row['nombre'];
                                $identificacion = $row['id'];
                                $puesto = $row['puesto'];
                                $departamento = $row['departamento'];
                                $correo = $row['correo'];
                                $salario = '$' . number_format($row['salario'], 0, ',', '.'); // Formatear salario
                                $fechaIngreso = date('d/m/Y', strtotime($row['fecha_ingreso'])); // Formatear fecha de ingreso

                                echo "<p>Nombre Completo: " . $nombreCompleto . "</p>";
                                echo "<p>Identificación: " . $identificacion . "</p>";
                                echo "<p>Puesto: " . $puesto . "</p>";
                                echo "<p>Departamento: " . $departamento . "</p>";
                                echo "<p>Correo: " . $correo . "</p>";
                                echo "<p>Salario: " . $salario . "</p>";
                                echo "<p>Fecha de Ingreso: " . $fechaIngreso . "</p>";


                                // Agregar un enlace para generar el certificado
                                echo '<a href="generar_certificado.php" class="btn btn-primary btn-block">Generar Certificado</a>';
                               
                               
                                echo '<a href="../inicio/principal.php" class="btn btn-secondary btn-block">Regresar Inicio</a>';
                            
                            } else {
                                echo "No se encontró información del empleado.";
                            }

                            // Cerrar conexión
                            $conexion->close();
                        } else {
                            echo "No hay una sesión iniciada. Por favor, inicie sesión.";
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>