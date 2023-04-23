<?php

require_once '../Classes/customerclass.php';
$Customer = new Customer();

$data = $Customer-> getcustomer();

if($data){
    foreach ($data as $row) {
        $customerDataArr[] = array(
            "Customer_Id"=> $row['customer_id'],
            "Fll_Name"=> $row['full_name'],
            "Mobile_No"=> $row['mobile_number'],
            "Email"=> $row['email'],
            "Gender"=> $row['gender'],
            "Birthday"=> $row['bday'],
            "Address"=> $row['Address'],
            

            


        );

        
    }
}

echo json_encode($customerDataArr);