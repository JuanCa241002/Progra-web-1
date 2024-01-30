<?php
session_start(); // para iniciar la sesión

require('fpdf/fpdf.php'); // ruta de acuerdo a structura de carpetas
require('funciones.php'); // Ajusta la ruta según donde al archivo funciones.php

class PDF extends FPDF
{
    function Header()
    {
        // Encabezado de la factura
        $this->SetFont('Arial', 'B', 12); // titulo config 
        $this->Cell(0, 10, 'Factura de Venta', 0, 1, 'C'); //titulo nombre
        $this->Ln(10); // salto de linea
        $this->Image('img\logoPDF2.png',165,-5,45);
        $this->Image('img/logo.png',-1,-1,40);
    }

    function Footer()
    {
        // Pie de página
        $this->SetY(-15);
        $this->SetFont('Arial', 'B', 8);
        $this->Cell(0, 10, 'Pagina ' . $this->PageNo(), 0, 0, 'C');
    }
}

$pdf = new PDF();
$pdf->AddPage();
$pdf->SetAutoPageBreak(true,20);//salto de pagina automatico
// Detalles de la factura
$pdf->SetFont('Arial', 'B', 12);// encabezado

if (isset($_SESSION['lista']) && is_array($_SESSION['lista'])) {
    $total = calcularTotalLista($_SESSION['lista']);

    $pdf->Cell(30, 10, 'Codigo', 1);
    $pdf->Cell(75, 10, 'Producto', 1);
    $pdf->Cell(30, 10, 'Precio', 1);
    $pdf->Cell(30, 10, 'Cantidad', 1);
    $pdf->Cell(30, 10, 'Subtotal', 1);
    $pdf->Ln();
    $pdf->SetFont('Arial', '', 12);// detalle encabezado
    foreach ($_SESSION['lista'] as $lista) {
        $pdf->Cell(30, 10, $lista->codigo, 1);
        $pdf->Cell(75, 10, $lista->nombre, 1);
        $pdf->Cell(30, 10, '$' . $lista->venta, 1);
        $pdf->Cell(30, 10, $lista->cantidad, 1);
        $pdf->Cell(30, 10, '$' . floatval($lista->cantidad * $lista->venta), 1);
        $pdf->Ln();
    }

    // Total
    $pdf->Ln(10);
    $pdf->Cell(195, 10, 'Total: $' . $total, 1, 0, 'R');
} else {
    $pdf->Cell(0, 10, 'No hay productos en la lista.', 1, 1, 'C');
}
//cliente
// $pdf->ln(11);
// $pdf->Cell(195, 10, 'cliente: '. $cliente->nombre, 1, 0, 'R');

// Mostrar el PDF
$pdf->Output();
?>
