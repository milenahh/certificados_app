<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Página Principal</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="stylesprincipal.css"> 

    
   
</head>
<body>
    <?php include 'header.html'; ?>
    <h1 class="principal">Bienvenido</h1>
  
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6 d-flex">
                <div class="card mr-2">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Empleado</h1>

                        <!-- Botón para redireccionar a login_empleado.php -->
                        <a href="../empleados/login_empleado.php" class="btn btn-primary btn-block">Acceder como Empleado</a>

                    </div>
                </div>

                <div class="card ml-2">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-5"> Admin</h1>

                        <!-- Botón para redireccionar a login_admin.php -->
                        <a href="../admin/login_admin.php" class="btn btn-primary btn-block">Acceder como Administrador</a>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>