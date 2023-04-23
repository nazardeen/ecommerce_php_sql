<?php
session_start();
require_once 'users.php';

$cuser = new User();

if(!isset($_SESSION['email'])){

    header('location: index.php');
    die;
}


$cemail = $_SESSION['email'];

// Current User Details 
$data = $cuser->currentUser($cemail);

?>