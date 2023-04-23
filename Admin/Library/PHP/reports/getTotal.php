<?php
require_once  '../../Classes/dailyreportclass.php';


$reports = new Report();



$date = $_POST['order_date'];
$total = $reports->getTotalCountDate($date);

$finalTotal = $total['grandTotal'];

echo json_encode($finalTotal);
