<?php

require_once '../../Classes/productclass.php';
$product = new Product();

$data = $product->getMaxProductID();

$maxItem_code = "";

if($data['ItemID'] != null){

    $arr = explode("MP", $data['ItemID']);
    $maxItem_code = intval($arr[1])+1;


}else{

   $maxItem_code = "MP1000";
}
echo json_encode($maxItem_code);

?>