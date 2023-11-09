<?php
session_start();

function conectarBaseDeDatos() {
    $conexion = new mysqli("localhost", "root", "0103", "empleados");
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }
    return $conexion;
}

function buscarEmpleado($id) {
    $conexion = conectarBaseDeDatos();
    $sql = "SELECT * FROM empleados WHERE id = '$id'";
    $resultado = $conexion->query($sql);
    $conexion->close();
    return $resultado;
}

function eliminarEmpleado($id) {
    $conexion = conectarBaseDeDatos();
    $sql = "DELETE FROM empleados WHERE id = '$id'";
    $exito = $conexion->query($sql);
    $conexion->close();
    return $exito;
}

if(isset($_SESSION['admin']) && $_SESSION['admin'] === true) {

    if(isset($_POST['id']) && isset($_POST['buscar'])) {
        $id = $_POST['id'];
        $resultado = buscarEmpleado($id);

        if ($resultado->num_rows == 1) {
            $row = $resultado->fetch_assoc();
            $nombre = $row['nombre'];
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
                <title>Eliminar Empleado</title>
                <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
                <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
                <script>
                    function confirmarEliminar() {
                        var respuesta = confirm("¿Seguro que desea eliminar el empleado?");
                        return respuesta;
                    }
                </script>
            </head>
            <body>
                <div class="container mt-5">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-body">
                                    <h1 class="card-title text-center mb-4">Eliminar Empleado</h1>

                                    <!-- Formulario para eliminar empleado -->
                                    <form action="eliminar_empleado.php" method="post">
                                        <div class="form-group">
                                            <label for="id">ID del Empleado:</label>
                                            <input type="text" class="form-control" id="id" name="id" value="<?php echo $row['id']; ?>" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="nombre">Nombre del Empleado:</label>
                                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $nombre; ?>" readonly>
                                        </div>
                                        <button type="submit" class="btn btn-danger btn-block" name="eliminar" onclick="return confirmarEliminar()">Eliminar Empleado</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
            </body>
            </html>

            <?php
            echo "Empleado encontrado.";
            ?>
            <button class="btn btn-primary" onclick="window.location.href='panel_admin.php'">Volver al Panel de Admin</button>
            <?php

        } else {
            echo "Empleado no encontrado.";
            ?>
            <button class="btn btn-primary" onclick="window.location.href='panel_admin.php'">Volver al Panel de Admin</button>
            <?php
        }

    } elseif(isset($_POST['id']) && isset($_POST['eliminar'])) {
        $id = $_POST['id'];
        $exito = eliminarEmpleado($id);

        if ($exito) {
            echo "Empleado eliminado exitosamente.";
            ?>
            <button class="btn btn-primary" onclick="window.location.href='panel_admin.php'">Volver al Panel de Admin</button>
            <?php
        } else {
            echo "Error al eliminar el empleado.";
            ?>
            <button class="btn btn-primary" onclick="window.location.href='panel_admin.php'">Volver al Panel de Admin</button>
            <?php
        }

    } else {
        // Formulario para ingresar el ID del empleado
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
            <title>Eliminar Empleado</title>
            <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        </head>
        <body>
            <div class="container mt-5">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <h1 class="card-title text-center mb-4">Eliminar Empleado</h1>
                                

                                <form action="eliminar_empleado.php" method="post">
                                    <div class="form-group">
                                        <label for="id">ID del Empleado:</label>
                                        <input type="text" class="form-control" id="id" name="id" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block" name="buscar">Buscar Empleado</button>
                                    <button class="btn btn-secondary btn-block" onclick="window.location.href='panel_admin.php'">Volver al Panel de Admin</button>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </body>
        </html>

        <?php
    }

} else {
    header("Location: login_admin.php");
    exit();
}
?>