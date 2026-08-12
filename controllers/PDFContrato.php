<?php

require_once "../fpdf/fpdf.php";

$pdf = new FPDF();

$pdf->AddPage();

$pdf->SetFont('Arial','B',16);

$pdf->Cell(190,10,"CONTRATO DE ALQUILER",0,1,'C');

$pdf->Ln(10);

$pdf->SetFont('Arial','',12);

$pdf->MultiCell(0,8,"
Propietario: ______________________

Inquilino: _______________________

Propiedad: _______________________

Fecha Inicio: _________________

Fecha Fin: ____________________

Importe: ______________________

");

$pdf->Output();


