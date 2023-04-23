<?php
require_once  '../Classes/employee.php';
$employee = new Employee();


if ($_POST['form_name'] == "UpdateEmployee") {

    $Emp_ID = $_POST['Emp_ID'];

    $data = $employee->getDataToUpdateEmployees($Emp_ID);

    echo json_encode($data);

} else if ($_POST['form_name'] == "insertEmployee") {

} else if ($_POST['form_name'] == "check_employee_exist") {

} else if ($_POST['form_name'] == "getAllEmployees") {

    $data = $employee->getAllEmployees();
    if ($data) {

        foreach ($data as $row) {

            $EmpDataArr[] = array(

                "Emp_ID" => $row['Emp_ID'],
                "Full_name" => $row['Full_Name'],
                "Address" => $row['Address'],
                "email" => $row['email'],
                "nic_no" => $row['nic_no'],
                "Joined_date" => $row['Joined_date'],
                "status" => $row['status']

            );
        }
    }

    echo json_encode($EmpDataArr);
} else if ($_POST['form_name'] == "deleteEmployees") {


    $Emp_ID = $_POST['Emp_ID'];

    $employee->deleteEmployees($Emp_ID);
    echo json_encode("success");
    
} else if ($_POST['form_name'] == "getDataToUpdateEmployees") {


} else if ($_POST['form_name'] == "UpdateCurrentEmployees") {

    $emp_id = $_POST['emp_id'];
    $emp_name = $_POST['emp_name'];
    $email = $_POST['emp_email'];
    $emp_address = $_POST['emp_address'];
    $emp_nic = $_POST['emp_nic'];
    $emp_contact_number = $_POST['emp_contact_number'];
    $emp_status = $_POST['emp_status'];
    $userType = $_POST['userType'];


    $employee->updateEmployees($emp_name, $emp_address, $email, $emp_nic, intval($emp_contact_number), $emp_status, $userType,intval($emp_id));
    echo json_encode("success");
}
// 
