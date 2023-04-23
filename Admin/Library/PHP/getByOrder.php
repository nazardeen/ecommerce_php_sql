<?php
require_once  '../Classes/ordersclass.php';
$order_table = new order();

 $data=$order_table->getAllOrders();

 
 if ($data){

      foreach ($data as $row ) {
          
        $OrderDataArr[] = array(

            "payment_method"=>$row['payment_method'],
            "status"=>$row['status'],
            "order_id"=>$row['order_id'],
            "full_name"=>$row['full_name']   
        );
      }
  }

 echo json_encode($OrderDataArr);

