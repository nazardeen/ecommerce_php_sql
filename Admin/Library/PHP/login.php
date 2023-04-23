<?php
session_start();

require '../Classes/users.php';

$user = new User();

if ($_POST["form_name"] == "check_user") {

    $username = $user->test_data($_POST['username']);

    $data = $user->check_user_exist($username);

    $dataarr = [];

    if ($data) {
        foreach ($data as $row) {

            $dataarr = array("username" => $data['username']);
        }
    }

    echo json_encode($dataarr);

} else if($_POST["form_name"] == "login_form"){

    $username = $_POST['username'];
    $pass = md5($_POST['password']);

    $data = $user->userLogin($username,$pass);

    $dataarr = [];

    $_SESSION['username'] = $username;

   if($data){
      
    foreach ($data as $row) {
            
            $dataarr = array("username"=>$data['username'], "password"=>$data['password']);
    }
   }
   
    echo json_encode($dataarr);

}
