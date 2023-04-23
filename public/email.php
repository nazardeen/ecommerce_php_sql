<?php 

$email_to = "suvinchandula93@gmail.com";
$subject = "Simple Emails with php";
$message = "this was sent with a php script\n\neven has new lines";

$headers = "From: suvinjavax@gmail.com";

if(mail($email_to,$subject,$message,$headers)){

    echo 'success';
}else{

    echo 'not sent';
}


?>