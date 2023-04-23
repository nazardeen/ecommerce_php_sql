<?php
session_start();
// var_dump($_SESSION);
if ($_SESSION) {
} else {
    //  header( 'HTTP/1.0 403 Forbidden', TRUE, 403 );
    header('location: home');
    exit();
}

session_write_close();

?>