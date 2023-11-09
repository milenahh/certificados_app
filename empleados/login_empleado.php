<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Acceso para Empleados</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">     <!--margin-top -->
        <div class="row justify-content-center"> <!--agrupar columnas, centrar contenido -->
            <div class="col-md-6">    <!--definir columnas pantalla mediana(md) -->
                <div class="card">  <!--clase contenedora contenido img, txt -->
                    <div class="card-body"> 
                        <h1 class="card-title text-center mb-4">Acceso para Empleados</h1>
                        <form action="autenticar_empleado.php" method="post"> <!--formulario metodo post -->
                            <div class="form-group">  <!--clase agrupar elementos y aplica estilos bootstrap -->
                                <label for="correo">Correo Electrónico:</label> <!--etiqueta campo de entrada -->
                                <input type="email" class="form-control" id="correo" name="correo" required> <!--entrada del usuario -->
                            </div>
                            <div class="form-group">  
                                <label for="id">Contraseña:</label>
                                <input type="password" class="form-control" id="id" name="id" required>
                            </div>
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>  <!--boton que envia formulario al click -->
                        </form>
                    </div>
                </div>
                <div class="mt-3 text-center">
                    <!-- Botón para regresar a la página principal -->
                    <a href="../inicio/principal.php" class="btn btn-secondary">Regresar</a>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>       <!--biblioteca jQuery de JS inter. DOM -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>   <!--biblioteca Popper.js posicionar elementos -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>  <!--JavaScript de Bootstrap  -->
</body>
</html>
