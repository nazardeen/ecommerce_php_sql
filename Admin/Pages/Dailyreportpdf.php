<?php

require('../Library/fpdf184/fpdf.php');
$db = new PDO('mysql:host=localhost;dbname=cellentric', 'root', '');



class myPDF extends FPDF{
    function header(){
        $this->Image('../Library/img/logo.png', 10, 6,30);
        $this -> SetFont('Arial', 'B', 14);
        $this -> Cell(276,5,'Daily Report' , 0,0,'C');
        $this -> Ln();
        $this -> SetFont('Times', '',12);
        $this -> Ln(20);
    }

    function footer(){
$this -> SetY(-15);
$this -> SetFont('Arial', '',12);
$this -> Cell(0,10,'page' .$this->PageNo().'/{nb}',0,0,'C');
    }

function headerTable(){
    $this -> SetFont('Times','B',12);
    $this -> Cell(60,10,'Invoice ID',1,0,'C');
    $this -> Cell(60,10,'Total',1,0,'C');
    $this -> Cell(60,10,'Discount',1,0,'C');
    $this -> Cell(60,10,'Sub Total',1,0,'C');
    $this -> Cell(60,10,'Sub Total',1,0,'C');
    $this -> Ln();
}
function viewTable($db){
    $order_id = "2021-09-10";
    $this -> SetFont('Times', '',12);
    $stmt = $db->query("SELECT * FROM order_table WHERE order_date= $order_id");
    while($data = $stmt -> fetch(PDO::FETCH_OBJ)){
        $this -> Cell(60,10,$data ->order_id,1,0,'L');
        $this -> Cell(60,10,$data ->qty,1,0,'L');
        $this -> Cell(60,10,$data ->total,1,0,'L');
        $this -> Cell(60,10,$data ->payment_method,1,0,'L');
        $this -> Cell(60,10,$data ->status,1,0,'L');
        $this -> Ln();
    }
}
}

$pdf = new myPDF();
$pdf -> AliasNbPages();
$pdf -> AddPage('L', 'A4', 0);
$pdf -> headerTable();
$pdf -> viewTable($db);
$pdf -> Output();
