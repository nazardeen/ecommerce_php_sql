<?php

require_once '../Classes/employeeclass.php';

$employee = new Employee();

// if($_POST['form_name'] == "manage_emp"){
// }

    $emp_name = $_POST['emp_name'];
    $emp_nic = $_POST['emp_nic'];
    $emp_contact_number = $_POST['emp_contact_number'];
    $emp_email = $_POST['emp_email'];
    $emp_address = $_POST['emp_address'];
    $emp_DOB = $_POST['emp_DOB'];
    $emp_joinedDate = $_POST['emp_joinedDate'];
    $emp_status = $_POST['emp_status'];
    $usertype = $_POST['usertype'];
    $emp_username = $_POST['emp_username'];
    $emp_password = md5($_POST['emp_password']);

    $employee->insertEmployee($emp_name, $emp_address, $emp_email, $emp_nic, $emp_joinedDate, $emp_DOB, $emp_status,$usertype, $emp_username, $emp_password, intval($emp_contact_number));

print_r($_POST);