<?php

require_once '../Includes/fpdf/fpdf.php';
require_once  '../Library/Classes/dailyreportclass.php';
$report = new Report();

$order_date = $_GET["order_date"];

$data = $report->getreportByDate($order_date);
$SUM = $report->getTotalCountDate($order_date);
$Qty = $report->getQtyCountDate($order_date);

$pdf = new FPDF('P', 'mm', 'A4');
$pdf->AliasNbPages();
$pdf->AddPage();


$pdf->SetFont('Arial', 'B', '25');

$pdf->Cell(0, 10, "", 0, 1);
$image1 = '../components/images/logo.png';
$pdf->Cell(10, 0, $pdf->Image($image1, 20, $pdf->GetY(), 40), 0, 0, 'C');
$pdf->Cell(0, 0, "CELLENTRIC PVT LTD", 0, 1, 'C');

$pdf->SetFont('Arial', 'B', '16');
$pdf->Cell(0, 40, $order_date." Report", 0, 1, 'C');

// total sum of order table for date 
$pdf->SetFont('Arial', 'B', '14');
$pdf->Cell(50, 10, "Grand Total: ", 1, 0);
$pdf->Cell(50, 10,"Rs.".$SUM['grandTotal'], 1, 1,'R');


// total qty sum of order table for date 
$pdf->SetFont('Arial', 'B', '14');
$pdf->Cell(50, 10, "Total Quantity: ", 1, 0);
$pdf->Cell(50, 10, $Qty['grandqty'], 1, 1, 'R');

$pdf->Cell(0, 20, "", 0, 1);
$pdf->Cell(0, 10, "All Orders", 0, 1);


$pdf->SetFont('Arial', 'B', '12');
$pdf->Cell(30, 10, "#ID", 1, 0, 'C');
$pdf->Cell(30, 10, "Quantity", 1, 0, 'C');
$pdf->Cell(40, 10, "Total", 1, 0, 'C');
$pdf->Cell(50, 10, "Payment Method", 1, 0, 'C');
$pdf->Cell(0, 10, "", 0, 1);

if ($data) {

    foreach ($data as $row) {

        $pdf->Cell(30, 10, $row['orderID'], 1, 0, 'C');
        $pdf->Cell(30, 10, $row['qty'], 1, 0, 'C');
        $pdf->Cell(40, 10, $row['total'], 1, 0, 'C');
        $pdf->Cell(50, 10, $row['payment_method'], 1, 1, 'C');
    }
}

$pdf->Output();
