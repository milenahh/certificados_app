<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Añadir Empleado</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Añadir Empleado</h1>
                        <form action="procesar_añadir_empleado.php" method="post">
                            <div class="form-group">
                                <label for="nombre">Nombre Completo:</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" required>
                            </div>
                            <div class="form-group">
                              <label for="identificacion">Identificación:</label>
                              <input type="text" class="form-control" id="identificacion" name="identificacion" required>
                            </div>
                            <div class="form-group">
                                <label for="puesto">Puesto:</label>
                                <input type="text" class="form-control" id="puesto" name="puesto" required>
                            </div>
                            <div class="form-group">
                                <label for="departamento">Departamento:</label>
                                <input type="text" class="form-control" id="departamento" name="departamento" required>
                            </div>
                            <div class="form-group">
                                <label for="correo">Correo Electrónico:</label>
                                <input type="email" class="form-control" id="correo" name="correo" required>
                            </div>
                            <div class="form-group">
                                <label for="salario">Salario:</label>
                                <input type="text" class="form-control" id="salario" name="salario" required>
                            </div>
                            <div class="form-group">
                                <label for="fecha_ingreso">Fecha de Ingreso:</label>
                                <input type="date" class="form-control" id="fecha_ingreso" name="fecha_ingreso" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Añadir Empleado</button>
                            <a href="../inicio/principal.php" class="btn btn-secondary btn-block">Regresar Inicio</a>
                        </form>
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