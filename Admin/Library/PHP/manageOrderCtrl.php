<?php

require_once  '../Classes/ordersclass.php';
$order_table = new Order();

if ($_POST['form_name'] == "delete_order") {

    $order_id = $_POST['order_id'];

    $order_table->deleteorder($order_id);

    echo json_encode("deleted");
} else if ($_POST['form_name'] == "Orders_By_order_ID") {

    $order_id = $_POST['order_ID'];

    $data = $order_table->getorderbyOrderID($order_id);
    foreach ($data as $row) {
        $OrderDataArr[] = array(
            "item_code" => $row['item_code'],
            "product_name" => $row['product_name'],
            "retail_price" => $row['retail_price'],
            "quantity" => $row['quantity'],
            "TotalofAll" => $row['quantity'] * $row['retail_price']
        );
    }
    echo json_encode($OrderDataArr);
}else if ($_POST['form_name'] == "update_status") {

    $order_id = $_POST['order_ID'];

    $data = $order_table->updateCompletedStatus($order_id);

    echo json_encode("success");
}
