<?php

require_once '../Classes/return.class.php';

$return = new ReturnItems();

if ($_POST['form_name'] == "getProducts") {

    $order_id  = $_POST['order_id'];

    $data = $return->getOrder_Items($order_id);
    
    foreach ($data as $row) {

        $output[] = array(

            "item_code" => $row['item_code'],
            "product_name" => $row['product_name'],
            "product_description" => $row['product_description'],
            "retail_price" => $row['retail_price'],
            "quantity" => $row['quantity'],
            "Total" => $row['quantity'] * $row['retail_price']
        );
    }

    echo json_encode($output);

} else if ($_POST['form_name'] == "add_returns") {

    $return_id  = $_POST['return_id'];
    $order_id  = $_POST['order_id'];
    $total  = $_POST['total'];

    $data = $return->addReturns(intval($return_id), intval($order_id), floatval($total));

    $relation_list = $_POST['data'];

    for ($x = 0; $x < count($relation_list); $x++) {

        $returnID = $_POST['return_id'];
        $product_id = $relation_list[$x]['procode'];
        $qty = $relation_list[$x]['qty'];

        $return->AddOrderItems(intval($returnID), $product_id, intval($qty));
    }

    echo json_encode(array("last_id" => $return_id));
}
