<?php

require('fpdf184/fpdf.php');


$pdf = new FPDF();

$pdf -> AddPage();

$pdf -> SetFont('Arial', '', 16);

$pdf -> Image('Logo.png', 10, 6);
$pdf -> SetFont('Arial', 'B', 14);
$pdf -> Cell(276,5,'Invoice',0,0,'C');
$pdf -> Ln();
$pdf -> SetFont('Times', '',12);
$pdf -> Cell(276, 10, 'No. 1 Thimbirigasyaya Road, Colombo 5 - Tel : 0764582136' ,0,0,'C');
$pdf-> Ln(20);

$pdf -> Cell(55 , 5, 'Invoice Number' , 0, 0,);
$pdf -> Cell(58 , 5, ': 026ETY' , 0, 0);
$pdf -> Cell(25 , 5, 'Date' , 0, 0, 'C');
$pdf -> Cell(52 , 5, ': 2021-09-25' , 0, 1);

$pdf -> Cell(55 , 5, 'Sales Staff' , 0, 0);
$pdf -> Cell(58 , 5, ': xxxxx' , 0, 0);
$pdf -> Cell(25 , 5, 'Method' , 0, 0, 'C');
$pdf -> Cell(52 , 5, ': Cash' , 0, 1);

$pdf -> Cell(55 , 5, 'Customer' , 0, 0);
$pdf -> Cell(58 , 5, ': xxxxx' , 0, 0);
$pdf -> Cell(25 , 5, 'Number' , 0, 0, 'C');
$pdf -> Cell(52 , 5, ': xxxxx' , 0, 1);
$pdf -> Cell(55 , 5, 'Address' , 0, 0,);
$pdf -> Cell(58 , 5, ': xxxxx' , 0, 0);

$pdf -> Line(10, 30, 200, 30);

$pdf -> Ln(10);
$pdf -> SetFont('Arial', '', 12);
$pdf -> Cell(40,10,'Serial No');
$pdf -> Cell(70,10,'Item Code & Description');
$pdf -> Cell(20,10,'QTY');
$pdf -> Cell(40,10,'Unit Price');
$pdf -> Cell(40,10,'Amount');

$pdf -> Ln(80);

$pdf -> Cell(55 , 5, '' , 0, 0,);
$pdf -> Cell(40 , 5, '' , 0, 0);
$pdf -> Cell(70 , 10, 'Sub Total' , 0, 0, 'C');
$pdf -> Cell(40 , 10, ': xxxxx' , 0, 1);

$pdf -> Cell(55 , 5, '' , 0, 0,);
$pdf -> Cell(40 , 5, '' , 0, 0);
$pdf -> Cell(70 , 10, 'Discount' , 0, 0, 'C');
$pdf -> Cell(40 , 10, ': xxxxx' , 0, 1);

$pdf -> Cell(55 , 5, '' , 0, 0,);
$pdf -> Cell(40 , 5, '' , 0, 0);
$pdf -> Cell(70 , 10, 'Grand Total' , 0, 0, 'C');
$pdf -> Cell(40 , 10, ': xxxxx' , 0, 1);

$pdf -> SetFont('Arial', 'B', 14);
$pdf -> Cell(200,20,'TO CLAIM THE WARRANTY PLEASE PRODUCE THE INVOICE!',0,0,'C');



$pdf -> Output();

?>