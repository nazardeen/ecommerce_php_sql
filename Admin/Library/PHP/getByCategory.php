<?php

require_once '../Classes/productclass.php';
$product = new Product();

$data = $product->getproductBYCategory("Mobile Phone");

if($data){
    foreach ($data as $row) {
        $productDataArr[] = array(
            "item_code"=> $row['item_code'],
            "product_name"=> $row['product_name'],
            "category_name"=> $row['category_name'],
            "Brand_name"=> $row['Brand_name'],
            "product_description"=> $row['product_description'],


        );

        
    }
}
echo json_encode($productDataArr);
