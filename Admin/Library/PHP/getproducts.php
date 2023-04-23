<?php

require_once '../Classes/productclass.php';
$product = new Product();

if ($_POST['form_name'] == "getAllproducts") {

    $data = $product->getproduct();

    if ($data) {

        foreach ($data as $row) {

            $dataarr[] = array(

                "product_id" => $row['product_id'],
                "item_code" => $row['item_code'],
                "product_name" => $row['product_name'],
                "Brand_name" => $row['Brand_name'],
                "product_description" => $row['product_description'],
                "quantity" => $row['quantity'],
                "buying_price" => $row['buying_price'],
                "retail_price" => $row['retail_price']

            );
        }
    }
    echo json_encode($dataarr);
} else if ($_POST['form_name'] == "GetUpdateProduct") {


    $product_ID = $_POST['product_ID'];
    $data = $product->getproductBYID($product_ID);

    echo json_encode($data);
} else if ($_POST['form_name'] == "deleteProducts") {


    $product_ID = $_POST['product_ID'];
    $data = $product->delete_product($product_ID);


    echo json_encode("success");
} else if ($_POST['form_name'] == "UpdateProduct") {

    $product_id = $_POST['product_id'];
    $category_name = $_POST['category_name'];
    $item_code = $_POST['item_code'];
    $Brand_name = $_POST['Brand_name'];
    $product_name = $_POST['product_name'];
    $Display = $_POST['Display'];
    $ram = $_POST['ram'];
    $storage = $_POST['storage'];
    $camera = $_POST['camera'];
    $battery = $_POST['battery'];
    $warranty = $_POST['warranty'];
    $buying_price = $_POST['buying_price'];
    $retail_price = $_POST['retail_price'];
    $product_description = $_POST['product_description'];
    $camera = $_POST['camera'];
    $quantity = $_POST['quantity'];

    $product->update_product($item_code, $product_name, $category_name, $Brand_name, $product_description, $ram, $storage, $Display, $battery, $camera, intval($quantity), doubleval($buying_price), doubleval($retail_price), $warranty, intval($product_id));

    echo json_encode("success");
    
} else if ($_POST['form_name'] == "getimage") {


    $product_ID = $_POST['item_code'];
    $data = $product->getimageByItemCode($product_ID);

    echo json_encode($data);
}
