<?php

    require_once('../vendor/autoload.php');
    require("../Controlador/C_mercadoPago.php");

    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_SESSION['total'])) {
        
        $total = $_SESSION['total'];

        // Crear una nueva instancia de TCPDF
        $pdf = new TCPDF();

        // Agregar una página al PDF
        $pdf->AddPage();

        // Agregar un marco y bordes alrededor del contenido #####
        $pdf->Rect(10, 40, 190, 100, 'D');

        // Agregar un logo
        $logoPath = '../img/logo.png'; // Reemplaza con la ruta de tu logo
        $pdf->Image($logoPath, 10, 10, 30, '', 'PNG', '', 'T', false, 300, '', false, false, 0, false, false, false);

        // Agregar la fecha de emisión ###
        $pdf->Text(80, 60, 'Fecha: ' . date('Y-m-d'));

        // Cambiar el estilo de texto para el encabezado###
        $pdf->SetFont('helvetica', 'B', 16);
        $pdf->Text(80, 30, 'FACTURA DE COMPRA');
        $pdf->SetFont('helvetica', '', 12);

        // Cambiar estilo de texto para el precio total###
        $pdf->SetFont('helvetica', 'B', 14);
        $pdf->SetTextColor(0, 0, 255); // Cambiar color de texto a azul
        $pdf->Text(80, 50, 'Precio Total: $' . $total);

        // Agregar pie de página ##
        $pdf->SetY(-15);
        $pdf->SetFont('helvetica', 'I', 8);
        $pdf->Cell(0, 10, 'Gracias por su compra', 0, false, 'C');

        // Establecer el nombre del archivo PDF que se descargará
        $filename = 'factura.pdf';

        // Salida del PDF a la pantalla
        $pdf->Output($filename, 'I');
    }
?>


