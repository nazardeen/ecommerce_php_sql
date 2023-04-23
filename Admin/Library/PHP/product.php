<?php

require_once '../Classes/productclass.php';
$product = new Product();

// if($_POST['form_name'] == "add_product"){

// }

if (isset($_FILES['item_image_1']) && isset($_FILES['item_image_2'])) {

    $itemcategory = $_POST['category'];
    $item_id = $_POST['item_id'];
    $item_name = $_POST['item_name'];
    $brand = $_POST['brand'];
    $item_display = $_POST['item_display'];
    $item_battery = $_POST['item_battery'];
    $item_camera = $_POST['item_camera'];
    $item_ram = $_POST['item_ram'];
    $item_rom = $_POST['item_rom'];
    $warranty = $_POST['warranty'];
    $item_image_1 = $_FILES['item_image_1']['name'];
    $item_image_2 = $_FILES['item_image_2']['name'];
    $cost_price = $_POST['cost_price'];
    $retail_price = $_POST['retail_price'];
    $item_description = $_POST['item_description'];
    $qty = $_POST['qty'];

    $folder = 'uploads/';

    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    $imagepath_1 = $folder . $item_image_1;
    $imagepath_2 = $folder . $item_image_2;

    if (move_uploaded_file($_FILES['item_image_1']['tmp_name'], $imagepath_1) && move_uploaded_file($_FILES['item_image_2']['tmp_name'], $imagepath_2)) {
        $product->addproduct("MP".$item_id, $item_name, $itemcategory, $brand, $item_description, $item_ram, $item_rom, $item_display, $item_battery, intval($qty), doubleval($cost_price), doubleval($retail_price), $imagepath_1, $imagepath_2,$warranty,$item_camera);
        // $product->addproductTemp($item_id,$item_name,$itemcategory,$brand,$item_description,intval(100),intval(10), doubleval($cost_price), doubleval($retail_price),floatval(100),$imagepath_1,$imagepath_2);
        echo json_encode("success");
    }
}
