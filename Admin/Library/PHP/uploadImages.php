<?php
session_start();

require_once '../Classes/productclass.php';
$product = new Product();

if (isset($_FILES['image_1']) && isset($_FILES['image_2'])) {



    $txtItemCode = $_POST['txtItemCode'];

    $oldImage_01 = $_POST['oldImage_01'];
    $oldImage_02 = $_POST['oldImage_02'];

    $Imagename1 = $_FILES['image_1']['name'];
    $Imagename2 = $_FILES['image_2']['name'];
    $folder = 'uploads/';

    if (isset($_FILES['image_1']) && ($_FILES['image_1'] == "")) {
       
        move_uploaded_file($_FILES['image_1']['tmp_name'], $oldImage_01);


    } 
    
    if (isset($_FILES['image_2']) && ($_FILES['image_2'] == "")) {
       
        move_uploaded_file($_FILES['image_2']['tmp_name'], $oldImage_02);

    }
        
        
        $newImage_01 = $folder . $Imagename1;
        $newImage_02 = $folder . $Imagename2;
        $product->updateImages($newImage_01,$newImage_02,$txtItemCode);



}
