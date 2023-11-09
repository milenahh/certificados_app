<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Modificar Empleado</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title text-center mb-4">Modificar Empleado</h1>

                        <?php
                        session_start();

                        if(isset($_SESSION['admin']) && $_SESSION['admin'] === true) {

                            // Verificar si se proporcionó un ID de empleado
                            if(isset($_POST['id'])) {
                                $id = $_POST['id'];

                                $conexion = new mysqli("localhost", "root", "0103", "empleados");

                                if ($conexion->connect_error) {
                                    die("Error de conexión: " . $conexion->connect_error);
                                }

                                $sql = "SELECT * FROM empleados WHERE id = '$id'";
                                $resultado = $conexion->query($sql);

                                if ($resultado->num_rows == 1) {
                                    $row = $resultado->fetch_assoc();
                                    ?>

                                   <!-- Formulario de modificación -->

                                   <form id="formModificarEmpleado" action="procesar_modificar_empleado.php" method="post">
                                   <div class="form-group">
                                      <label for="nombre">Nombre Completo:</label>
                                      <div class="input-group">
                                        <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>" readonly>
                                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalNombre">Modificar</button>
                                      </div>
                                   </div>

                  
                                   <div class="form-group">
                                <label for="identificacion">Identificación:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="identificacion" name="id" value="<?php echo $row['id']; ?>" readonly>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalIdentificacion">Modificar</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="puesto">Puesto:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="puesto" name="puesto" value="<?php echo $row['puesto']; ?>" readonly>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalPuesto">Modificar</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="departamento">Departamento:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="departamento" name="departamento" value="<?php echo $row['departamento']; ?>" readonly>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalDepartamento">Modificar</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="correo">Correo Electrónico:</label>
                                <div class="input-group">
                                    <input type="email" class="form-control" id="correo" name="correo" value="<?php echo $row['correo']; ?>" readonly>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCorreo">Modificar</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="salario">Salario:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="salario" name="salario" value="<?php echo $row['salario']; ?>" readonly>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSalario">Modificar</button>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="fecha_ingreso">Fecha de Ingreso:</label>
                                <div class="input-group">
                                    <input type="text" class="form-control" id="fecha_ingreso" name="fecha_ingreso" value="<?php echo $row['fecha_ingreso']; ?>" readonly>
                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalFechaIngreso">Modificar</button>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary btn-block">Guardar Cambios</button>

                        </form>
                                    <!-- Modal para modificar nombre -->
                                   <div class="modal fade" id="modalNombre" tabindex="-1" role="dialog" aria-labelledby="modalNombreLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalNombreLabel">Modificar Nombre</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" id="nombreNuevo">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" id="guardarNombre">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal para modificar id -->
                                    <div class="modal fade" id="modalIdentificacion" tabindex="-1" role="dialog" aria-labelledby="modalIdentificacionLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalIdentificacionLabel">Modificar identificación</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" id="identificacionNuevo">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" id="guardarIdentificacion">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Modal para modificar puesto -->
                                    <div class="modal fade" id="modalPuesto" tabindex="-1" role="dialog" aria-labelledby="modalPuestoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalPuestoLabel">Modificar Cargo</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" id="puestoNuevo">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" id="guardarPuesto">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                     <!-- Modal para modificar departamento -->
                                     <div class="modal fade" id="modalDepartamento" tabindex="-1" role="dialog" aria-labelledby="modalDepartamentoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalDepartamentoLabel">Modificar Cargo</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" id="departamentoNuevo">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" id="guardarDepartamento">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                      <!-- Modal para modificar correo -->
                                      <div class="modal fade" id="modalCorreo" tabindex="-1" role="dialog" aria-labelledby="modalCorreoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalCorreoLabel">Modificar CargCorreoo</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" id="correoNuevo">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" id="guardarCorreo">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <!-- Modal para modificar salario -->
                                     <div class="modal fade" id="modalSalario" tabindex="-1" role="dialog" aria-labelledby="modalSalarioLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalSalarioLabel">Modificar Salario</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" id="salarioNuevo">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" id="guardarSalario">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                     <!-- Modal para modificar fecha de ingreso -->
                                     <div class="modal fade" id="modalFechaIngreso" tabindex="-1" role="dialog" aria-labelledby="modalFechaIngresoLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalFechaIngresoLabel">Modificar Salario</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <input type="text" class="form-control" id="fechaingresoNuevo">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                                    <button type="button" class="btn btn-primary" id="guardaFechaingreso">Guardar Cambios</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                      
                                    $(document).ready(function() {
                                        // Cuando se hace click en el botón de guardar del modal de nombre
                                        $('#guardarNombre').click(function() {
                                        var nuevoNombre = $('#nombreNuevo').val(); // Obtener el nuevo nombre
                                        $('#nombre').val(nuevoNombre); // Actualizar el campo visible

                                        // Añade esta línea para enviar el valor al servidor
                                        $('#formModificarEmpleado').submit(); // Enviar el formulario al servidor
                                     });
                                        // Cuando se hace click en el botón de guardar del modal de identificacion
                                        $('#guardarIdentificacion').click(function() {
                                        var nuevoIdentificacion = $('#identificacionNuevo').val(); // Obtener el nuevo identificacion
                                        $('#identificacion').val(nuevoIdentificacion); // Actualizar el campo visible

                                        // Añade esta línea para enviar el valor al servidor
                                        $('#formModificarEmpleado').submit(); // Enviar el formulario al servidor
                                     });
                                      // Cuando se hace click en el botón de guardar del modal de Puesto
                                      $('#guardarPuesto').click(function() {
                                        var nuevoPuesto = $('#puestoNuevo').val(); // Obtener el nuevo Puesto
                                        $('#puesto').val(nuevoPuesto); // Actualizar el campo visible

                                        // Añade esta línea para enviar el valor al servidor
                                        $('#formModificarEmpleado').submit(); // Enviar el formulario al servidor
                                     });
                                       // Cuando se hace click en el botón de guardar del modal de departamento
                                       $('#guardarDepartamento').click(function() {
                                        var nuevoDepartamento = $('#departamentoNuevo').val(); // Obtener el nuevo departamento
                                        $('#departamento').val(nuevoDepartamento); // Actualizar el campo visible

                                        // Añade esta línea para enviar el valor al servidor
                                        $('#formModificarEmpleado').submit(); // Enviar el formulario al servidor
                                     });
                                       // Cuando se hace click en el botón de guardar del modal de Correo
                                       $('#guardarCorreo').click(function() {
                                        var nuevoCorreo = $('#correoNuevo').val(); // Obtener el nuevo Correo
                                        $('#correo').val(nuevoCorreo); // Actualizar el campo visible

                                        // Añade esta línea para enviar el valor al servidor
                                        $('#formModificarEmpleado').submit(); // Enviar el formulario al servidor
                                     });
                                     // Cuando se hace click en el botón de guardar del modal de Salario
                                     $('#guardarSalario').click(function() {
                                        var nuevoSalario = $('#salarioNuevo').val(); // Obtener el nuevo Salario
                                        $('#salario').val(nuevoSalario); // Actualizar el campo visible

                                        // Añade esta línea para enviar el valor al servidor
                                        $('#formModificarEmpleado').submit(); // Enviar el formulario al servidor
                                     });
                                       // Cuando se hace click en el botón de guardar del modal de Fecah de Ingreso 
                                       $('#guardarFechaIngreso').click(function() {
                                        var nuevofechaingreso = $('#fechaingresoNuevo').val(); // Obtener fecha ingreso Nuevo
                                        $('#fecha_ingreso').val(nuevofechaingreso); // Actualizar el campo visible

                                        // Añade esta línea para enviar el valor al servidor
                                        $('#formModificarEmpleado').submit(); // Enviar el formulario al servidor
                                     });
   
                                    });
</script>


                                    <?php
                                } else {
                                    echo "No se encontró información del empleado.";
                                }

                                $conexion->close();

                            } else {
                                // Formulario para ingresar el ID del empleado
                                ?>

                                <form action="modificar_empleado.php" method="post">
                                    <div class="form-group">
                                        <label for="id">ID del Empleado:</label>
                                        <input type="text" class="form-control" id="id" name="id" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block">Buscar Empleado</button>
                                    <button class="btn btn-secondary btn-block" onclick="window.location.href='panel_admin.php'">Volver al Panel de Admin</button>
                                </form>

                                <?php
                            }

                        } else {
                            header("Location: login_admin.php");
                            exit();
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>