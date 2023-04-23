<?php

require_once '../Classes/salesreportclass.php';
$SalesReport = new salesreport();

$data = $SalesReport-> getsalesreport();

if($data){
    foreach ($data as $row) {
        $salesreportDataArr[] = array(
            "order_id"=> $row['order_id'],
            "total"=> $row['total'],
            


        );

        
    }
}

echo json_encode($salesreportDataArr);