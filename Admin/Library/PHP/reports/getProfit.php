<?php
require_once  '../../Classes/dailyreportclass.php';


$reports = new Report();


$date = $_POST['order_date'];
$profit = $reports->getProfit($date);

$dif = 0;
if ($profit) {

    foreach ($profit as $row) {

        $dif += ($row['retail_price'] - $row['buying_price']) * $row['quantity'];
    }
}


echo json_encode($dif);
