<?php

require_once "../fpdf/fpdf.php";

$pdf=new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(190,10,"RECIBO DE PAGO",0,1,'C');

$pdf->Ln(10);

$pdf->SetFont('Arial','',12);

$pdf->Cell(0,8,"Inquilino: ____________________",0,1);

$pdf->Cell(0,8,"Propiedad: ____________________",0,1);

$pdf->Cell(0,8,"Mes: _________________________",0,1);

$pdf->Cell(0,8,"Importe: _____________________",0,1);

$pdf->Cell(0,8,"Fecha: _______________________",0,1);

$pdf->Ln(20);

$pdf->Cell(70,8,"____________________",0,0,'C');
$pdf->Cell(70,8,"____________________",0,1,'C');

$pdf->Cell(70,8,"Firma",0,0,'C');
$pdf->Cell(70,8,"Aclaración",0,1,'C');

$pdf->Output();