<?php
require_once '../../Classes/dailyreportclass.php';
$Report = new report();

$data  = $Report->getYear();


foreach ($data as $row) {
    
    $output[] = array(

        'qty' => $row['qty'],
        'total' => $row['total']


    );
}
echo json_encode($output);