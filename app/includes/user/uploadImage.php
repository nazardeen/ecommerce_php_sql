<?php 
session_start();

require '../../classes/users.php';

$user = new User();

if(isset($_FILES['image'])){


    $customer_id = $_POST['customer_ID'];


    $Imagename = $_FILES['image']['name'];
    $folder = 'customerImage/';


    if (!file_exists($folder)) {
        mkdir($folder, 0777, true);
    }

    $target = $folder . $Imagename;


    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
        $user->change_Profile_Image($target,$customer_id);
    }


}
