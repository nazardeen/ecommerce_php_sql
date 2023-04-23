<?php

require '../Library/fpdf184/fpdf.php';

class dailyReport extends FPDF
{
    function header()
    {
        $this->Image('../Library/img/logo.png', 10, 6,30);
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(276, 5, 'Daily Report', 0, 0, 'C');
        $this->Ln();
        $this->SetFont('Times', '', 12);
        $this->Ln(20);
    }

    function footer()
    {
        $this->SetY(-15);
        $this->SetFont('Arial', '', 12);
        $this->Cell(0, 10, 'page' . $this->PageNo() . '/{nb}', 0, 0, 'C');
    }
}

$pdf  = new dailyReport();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4', 0);
$pdf->Output();
