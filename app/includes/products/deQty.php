<?php

include '../../classes/product.class.php';
$product = new Product();



$item_code = $_POST['item_code'];
$quantities = $_POST['quantities'];


foreach ($quantities as $key => $value) {

    $product->deQty($value, $item_code, $key);
}

// 
