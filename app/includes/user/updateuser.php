<?php
session_start();

require '../../classes/users.php';

$user = new User();
if ($_POST["form_name"] == "update_user") {

    $customer_id = $_POST['customer_id'];
    $fullname =$_POST['fullname'];
    $email =$_POST['email'];
    $gender  =$_POST['gender'];
    $mobileNo =$_POST['mobileNo'];
    $address = $_POST['address'];
    $birthday  =$_POST['birthday'];

    $user->update_profile($fullname,intval($mobileNo),$gender,$birthday,$address,$email,intval($customer_id));

    echo json_encode("success");

}
else if ($_POST["form_name"] == "update_password") {

    $customer_id = $_POST['customer_id'];
    $password = $_POST['password'];
    $hashpass = md5($password);


    $user->change_password($hashpass,intval($customer_id));
    
    
echo json_encode("success");
}


