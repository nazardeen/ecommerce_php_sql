<?php
session_start();

require '../../classes/users.php';

$user = new User();
if ($_POST["form_name"] == "check_user") {

    $email = $user->test_data($_POST['email']);

    $data = $user->check_user_exist($email);

    $dataarr = [];

    if ($data) {
        foreach ($data as $row) {

            $dataarr = array("email" => $data['email']);
        }
    }

    echo json_encode($dataarr);

} else if($_POST["form_name"] == "login_form"){

    $username = $_POST['username'];
    $pass = md5($_POST['password']);

    $data = $user->userLogin($username,$pass);

    $dataarr = [];

    $_SESSION['email'] = $username;

   if($data){
      
    foreach ($data as $row) {
            
            $dataarr = array("username"=>$data['email'], "password"=>$data['password']);
    }
   }
   
    echo json_encode($dataarr);

}else if($_POST["form_name"] == "register_form"){

        
    $customerName = $user->test_data($_POST['customerName']);
    $mNumber = $user->test_data($_POST['mNumber']);
    $email = $user->test_data($_POST['email']);
    $pass = $user->test_data($_POST['password']);

    $hashpass = md5($pass);

    $data = $user->register($customerName,intval($mNumber),$email, $hashpass);
    echo json_encode($data);
    
}
