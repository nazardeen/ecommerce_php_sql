<?php

include 'database.php';

class Employee extends Database{


    // retrieve all employees
    public function getAllEmployees(){

        $sql = "select * from employee";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $row = $stmt->fetchall();
        return $row;

     
    }

    //check employee

    public function check_employee_exist($empId){
        $sql = "SELECT Emp_ID FROM employee WHERE Emp_ID = ? LIMIT 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$empId]);
        $result = $stmt->fetch();
        return $result;
    }

    // insert new employee

    public function insertEmployee($empId, $fullName, $empAddress, $email, $nicNo, $joinedDate){

        $sql = "INSERT INTO employee(Emp_ID, Full_Name, Address, email, nic_no, Joined_date) VALUES(?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$empId, $fullName, $empAddress, $email, $nicNo, $joinedDate]);

    }

    // get data from text fields

    public function getDataToUpdateEmployees($empId){

        $sql = "SELECT * FROM employee WHERE Emp_ID = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$empId]);
        $row = $stmt->fetch();

        return $row;

    }

    // update employess

    public function updateEmployees($fullName, $empAddress, $email, $nicNo,$contact_no,$status,$userType,$empId){

        $sql = "UPDATE employee SET Full_Name=?, Address=?, email=?, nic_no=?, contact_no=?, status=? ,userType=?WHERE Emp_ID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$fullName, $empAddress, $email, $nicNo,$contact_no,$status,$userType,$empId]);
    }

    //delete employees

    public function deleteEmployees($empId){

        $sql = "DELETE FROM employee WHERE Emp_ID = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$empId]);

    }

}