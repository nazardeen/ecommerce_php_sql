<?php

require_once '../Classes/dailyreportclass.php';
$Report = new report();



if($_POST['form_name'] == "report_by_order"){

    $order_date = $_POST["order_date"];

    $data = $Report->getreportByDate($order_date);
    $reportDataArr = [];

    if($data){

    foreach ($data as $row) {


        $reportDataArr[] = array(
            "order_id"=> $row['orderID'],
            "order_date"=> $row['order_date'],
            "qty"=> $row['qty'],
            "total"=> $row['total'],
            "payment_method"=> $row['payment_method'],
            "status"=> $row['status'],



        );

        
    }
}

echo json_encode($reportDataArr);

}
if($_POST['form_name'] == "report_by_order_id"){

    $order_id = $_POST["order_id"];

    $data = $Report->getreportByOrderID($order_id);
    $reportDataArr = [];

    if($data){

    foreach ($data as $row) {


        $reportDataArr[] = array(
            "item_code"=> $row['item_code'],
            "product_name"=> $row['product_name'],
            "retail_price"=> $row['retail_price'],
            "quantity"=> $row['quantity'],
            "order_date"=> $row['order_date'],
            "Total_amount"=> $row['retail_price'] * $row['quantity']



        );

        
    }
}


echo json_encode($reportDataArr);

}



// $data = $Report->getreport();

// if($data){
//     foreach ($data as $row) {
//         $reportDataArr[] = array(
//             "order_id"=> $row['order_id'],
//             "order_date"=> $row['order_date'],
//             "product_id"=> $row['product_id'],
//             "product_description"=> $row['product_description'],
//             "quantity"=> $row['quantity'],
//             "total"=> $row['total'],


//         );

        
//     }
// }

// echo json_encode($reportDataArr);