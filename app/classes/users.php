<?php 
include 'database.php';
Class User extends Database{
    public function getAllUsers(){

        $sql = "SELECT * FROM customers";
        $stmt = $this->connect()->query($sql);
        while ($row = $stmt->fetch()) {
          
            echo '<pre>';
            echo $row['username'] ." / " .$row['password'];
            echo '</pre>';
        }
    }
    
    public function register($full_name,$mobile_name,$user, $pass){

        $sql = "INSERT INTO customers(full_name,mobile_number,email,password) VALUES (?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$full_name,$mobile_name,$user,$pass]);
    
    }

    public function check_user_exist($email){
        $sql = "SELECT email FROM customers WHERE email = ? LIMIT 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }
    public function check_password_exist($email){
        $sql = "SELECT password FROM customers WHERE email = ? LIMIT 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$email]);
        $result = $stmt->fetch();
        return $result;
    }

    public function userLogin($username, $password){
        $sql = "SELECT email,password FROM customers WHERE email = ? AND password = ? ";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username,$password]);
        $result = $stmt->fetch();

            $count = $stmt->rowCount();
        if($count > 0 )
        {
            return $result;

          }else{

            return false;
        }
    }


    // test data when input something 
    public function test_data($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        
        return $data;
    }


    // update user profile 
public function update_profile($name,$mobile_number,$gender,$bday,$Address,$email,$customer_id)
{
    $sql = "UPDATE customers SET full_name=?, mobile_number=?, gender=?, bday=?, Address=?, email=? WHERE customer_id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name,$mobile_number,$gender,$bday,$Address,$email,$customer_id]);
    return true;

}

// getting current users in session 
public function currentUser($username){

    $sql = "SELECT * FROM customers WHERE email = ? LIMIT 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $result = $stmt->fetch();
        return $result;
}


    // change password of user profile 
public function change_password($password,$customer_id)
{
    $sql = "UPDATE customers SET password=? WHERE customer_id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$password,$customer_id]);
    return true;

}
    // delete user profile 


    // check currentPassword


    // change user profile image 
    public function change_Profile_Image($image,$customer_id)
{
    $sql = "UPDATE customers SET image=? WHERE customer_id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$image,$customer_id]);
    return true;

}

    


}