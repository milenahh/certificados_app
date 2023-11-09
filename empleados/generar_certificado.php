<?php

require_once('tcpdf/tcpdf.php');

$conexion = new mysqli("localhost", "root", "0103", "empleados");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

session_start();
$correo = $_SESSION['correo'];

$sql = "SELECT * FROM empleados WHERE correo = '$correo'";
$resultado = $conexion->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    $row = $resultado->fetch_assoc();

    // Crear instancia de TCPDF
    $pdf = new TCPDF();
    $pdf->SetPrintHeader(false);  // Desactivar el encabezado
    $pdf->AddPage();
    $pdf->SetFont('helvetica', '', 14); // Tamaño de fuente aumentado

    // Asegúrate de que la ruta de la imagen sea correcta
    $logo = "img/logo.png"; 

    // Verificar si la imagen existe antes de añadirla al PDF
    if (file_exists($logo)) {
        $pdf->Image($logo, 160, 10, 40); // Ajusta las coordenadas y tamaño según sea necesario
    }
    $fechaIngreso = date('d/m/Y', strtotime($row['fecha_ingreso'])); // Formatear fecha de ingreso
    $fechaHoy = date('d/m/Y'); // Formatear fecha actual
    

    // Agregar contenido al PDF
    $pdf->SetXY(10, 65, 190); // Establecer posición de inicio del texto

    
    $pdf->MultiCell(0, 10, 'Certifica', 0, 'C'); // Agregado: Certifica centrado
    $pdf->Ln(10); // Agregado: Línea de espacio

    $pdf->SetLeftMargin(20); // Ajusta el margen izquierdo a 20 mm

    $texto = 'Que ' . $row['nombre'] . ' identificado con documento No ' . $row['id'] . ', labora en esta compañía desde ' . $fechaIngreso . ', en el cargo de ' . $row['puesto'] . ', con una asignación mensual de: $ ' . $row['salario'] . '.';
    $pdf->MultiCell(0, 10, $texto, 0, 'L');

    $pdf->Ln(10); // Agregado: Línea de espacio
    $fechaHoy = date('Y-m-d'); // Obtener la fecha actual
    $pdf->MultiCell(0, 10, 'La anterior se expide a los ' . date('d/m/Y'), 0, 'L');

    $pdf->Ln(10); // Agregado: Línea de espacio
    $pdf->Ln(10); // Agregado: Línea de espacio
    $pdf->MultiCell(0, 10, 'Atentamente', 0, 'L');
    $pdf->Ln(10); // Agregado: Línea de espacio
    $pdf->Ln(10); // Agregado: Línea de espacio
    $pdf->MultiCell(0, 10, 'Fulanito', 0, 'L');
    $pdf->MultiCell(0, 10, 'Recursos Humanos', 0, 'L');

    $pdf->Ln(10);
    $pdf->Ln(10);
    $pdf->Ln(10);
    $pdf->Ln(10);
    $pdf->Ln(10);
    $pdf->Ln(10);
    $pdf->Ln(10);

// Línea horizontal
$pdf->Line(10, $pdf->GetY(), 200, $pdf->GetY());

$pdf->SetFont('helvetica', 'I', 8);
$pdf->Cell(0, 10, 'Avenida 36 No 45-45        Tel: 5555555  Cel: 333333333 ', 0, 1, 'C');

    // Salida del PDF
    $pdf->Output('certificado.pdf', 'D');
} else {
    echo "No se encontró información del empleado.";
}

$conexion->close();
?>