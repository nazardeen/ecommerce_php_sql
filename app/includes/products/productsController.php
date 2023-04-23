<?php

include '../../classes/product.class.php';
$product_filter = new Product();


if ($_POST["form_name"] == "filter_price") {



  $minvalue = $_POST['minVal'];
  $maxValue =  $_POST['maxVal'];

  $data = $product_filter->filterPrice($minvalue, $maxValue);

  // $dataarr = [];
  $output = '';
  // if($data){
  $output .= '<div class="product_list">
<div class="col-md-12">
  <div class="row">';
  foreach ($data as $row) {

    // $dataarr[] = array(
    //     "product_name"=>$row['product_name']

    // );


    $output .= '<div class="col-md-4">
          <div class="image_card_outer_box">
            <div class="image_box_card">
              <img src="../Admin/Library/PHP/' . $row['image'] . '" width="200" alt="" class="image_card_img second_img">
              <img src="../Admin/Library/PHP/' . $row['image'] . '" alt="" class="image_card_img first_img">
              <a class="cart_button">
                <h4>Add To Cart</h4>
              </a>
            </div>
            <div class="content_box_card">
              <h4 class="product_name">' . $row['product_name'] . '</h4>
              <h3 class="product_price">Rs.' . $row['retail_price'] . '.00</h3>
              <button class="btn btn-success"><a href="item.php?item_id=' . $row['product_id'] . '">Add To Cart</a></button>
            </div>
          </div>
        </div>';
  }

  $output .= '</div>
</div>
</div>';
  // }

  echo $output;
  json_encode($data);

  // echo json_encode($data);

} else if ($_POST["form_name"] == "addtoCart") {

  $customer_ID = $_POST['customer_ID'];
  $product_id = $_POST['product_id'];
  $qty = $_POST['qty'];
  $total = $_POST['FinalTotal'];

  $product_filter->addCartItems($customer_ID, $product_id, intval($qty), doubleval($total));


  echo json_encode("success");
} else if ($_POST["form_name"] == "update_cart") {

  $quantities = $_POST['quantities'];
  $prices = $_POST['prices'];
  $cart_id = $_POST['cart_id'];


  foreach ($quantities as $key => $value) {

    $product_filter->UpdateCartItems($value, $prices, $cart_id, $key);
  }
} else if ($_POST["form_name"] == "delete_cart") {

  $item_code = $_POST['item_code'];

  $data = $product_filter->deleteCartItems($item_code);

  echo json_encode($data);
} else if ($_POST["form_name"] == "add_order") {

  $orderID = $_POST['orderID'];
  $customer_ID = $_POST['customer_ID'];
  $totalQunatity = $_POST['totalQunatity'];
  $CartTotal = $_POST['CartTotal'];
  $payment_method = $_POST['payment_method'];
  $item_code = $_POST['item_code'];
  $quantities = $_POST['quantities'];
  $order_id_items = $_POST['order_id_items'];
  $date = date("Y-m-d");
  $status = $_POST['status'];
  // delivery and payment details 
  $fullName = $_POST['fullName'];
  $lastName = $_POST['lastName'];
  $cardNo = md5($_POST['cardNo']);
  $stAddress = $_POST['stAddress'];
  $town = $_POST['town'];
  $postcode = $_POST['postcode'];
  $email = $_POST['email'];
  $mNumber = $_POST['mNumber'];
  $holderfirstName = md5($_POST['holderfirstName']);
  $holderlastName = md5($_POST['holderlastName']);
  $month = md5($_POST['month']);
  $year = md5($_POST['year']);
  $csv = md5($_POST['csv']);
  $mobileNumber = $_POST['mobileNumber'];


  $fullName = $fullName . " " . $lastName;
  $CustomerAddress = $stAddress . "," . $town . "," . $postcode;
  $cardHolder_FullName = $holderfirstName . " " . $holderlastName;
  $card_Exp_Date = $year . "/" . $month;


  $product_filter->AddOrder(intval($orderID), intval($customer_ID), intval($totalQunatity), doubleval($CartTotal), $payment_method, $date,$status);
  $product_filter->BillingDetails($card_Exp_Date, $csv, $cardNo, $cardHolder_FullName, $CustomerAddress, $fullName, $email, intval($mNumber), $date, intval($customer_ID));
  $product_filter->clearCart($customer_ID);

  foreach ($order_id_items as $key => $value) {

    $product_filter->AddOrderItems($value, $item_code, $quantities, $key);
  }

  echo json_encode("success");
  
} else if ($_POST["form_name"] == "order_details") {

  $order_id = $_POST['order_id'];

  $data = $product_filter->OrderDetails(intval($order_id));

  foreach ($data as $row) {

    $orderArr[] = array(

      "orderQTY" => $row['orderQTY'],
      "product_name" => $row['product_name'],
      "retail_price" => $row['retail_price'],

    );
  }


  echo json_encode($orderArr);
}
