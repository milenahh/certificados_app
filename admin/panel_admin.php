<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Panel de Administrador</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Panel de Administrador</h1>
                        <?php
                        session_start();
                        // Verificar si hay una sesión de administrador iniciada
                        if(isset($_SESSION['admin']) && $_SESSION['admin'] === true) {
                            echo '<p>Bienvenido, Administrador.</p>';
                            ?>

                            <!-- Botones de gestión -->
                            <div class="mb-3">
                                <a href="añadir_empleado.php" class="btn btn-success btn-block">Añadir Empleado</a>
                            </div>
                            <div class="mb-3">
                                <a href="modificar_empleado.php" class="btn btn-warning btn-block">Modificar Empleado</a>
                            </div>
                            <div class="mb-3">
                                <a href="eliminar_empleado.php" class="btn btn-danger btn-block">Eliminar Empleado</a>
                            </div>
                            <div class="mb-3">
                                <a href="empleados_registrados.php" class="btn btn-secondary btn-block">Empleados Registrados</a>
                            </div>
    
                            <hr>
    
                            <!-- Enlace para cerrar sesión -->
                            <a href="cerrar_sesion_admin.php" class="btn btn-primary btn-block">Cerrar Sesión</a>
                            <a href="../inicio/principal.php" class="btn btn-secondary btn-block">Regresar Inicio</a>
    
                            <?php
                            } else {
                                // Si no está autenticado como administrador, redirigir a la página de inicio de sesión del administrador
                                header("Location: login_admin.php");
                                exit();
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
    