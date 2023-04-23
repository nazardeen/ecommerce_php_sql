<?php

require_once '../Classes/return.class.php';

$return = new ReturnItems();

$data = $return->getMaxReturnID();

$returnID = "";

if($data['returnID'] != null){

    $returnID = $data['returnID'] + 1;

}else{

   $returnID = 2000;
}
echo json_encode($returnID);

?>