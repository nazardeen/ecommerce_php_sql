<?php
include 'database.php';

Class Customer extends Database{
    public function getcustomer(){
       $sql = "SELECT * From customers";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute();
       $result = $stmt->fetchAll();

       return $result;
   }

   // add customer
    public function addcustomer($customer_id,$full_name,$mobile_number,$email,$password){

        $sql = "INSERT INTO customers(customer_id,full_name,mobile_number,email,password) VALUES (?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$customer_id,$full_name,$mobile_number,$email,$password]);

    }

     // update customer
     public function updatecustomer($customer_id,$full_name,$mobile_number,$email,$password){

    $sql = "UPDATE customers SET full_name=?,mobile_number=?,email=?, password=? WHERE customer_id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$customer_id,$full_name,$mobile_number,$email,$password]);

    return true;

}

// delete customer
public function deletecustomer($customer_id)
{
    $sql = "DELETE FROM customers WHERE customer_id = ? ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$customer_id]);

    return true;

}

}