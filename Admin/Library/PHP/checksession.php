<?php
session_start();
// var_dump($_SESSION);
if (isset($_SESSION['username'])) {
    
} else {
    //  header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    header('location: index.php');
    exit();
}

session_write_close();
