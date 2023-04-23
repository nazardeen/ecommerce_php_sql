<?php 

require_once 'database.php';

class Product extends Database
{
    public function addCartItems($customer_ID, $product_ID,$qty, $price){

        $sql = "INSERT INTO cart(customer_ID,product_id, qty, price) VALUES (?, ?, ? , ?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$customer_ID,$product_ID,$qty, $price]);
    
    }

    public function selectProductDetails($item_code){


        $sql = "SELECT * FROM product WHERE item_code=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$item_code]);
        $result  = $stmt->fetch();
        return $result;
    
    }


    public function selectCartCount($customer_ID){

    $sql = "SELECT SUM(qty) AS cusCount FROM cart WHERE customer_ID = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$customer_ID]);
    $row = $stmt->fetch();

    return $row;
   
}

public function selectProducts(){


    $data[] = array();
    $sql = "SELECT * FROM product";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}
public function selectProductsRandomly(){


    $data[] = array();
    $sql = "SELECT * FROM product ORDER BY RAND(item_code) DESC LIMIT 6";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}
public function selectProductsRandomlyBYcategory(){


    $data[] = array();
    $sql = "SELECT * FROM product WHERE category_name ='mobilephoneaccessories' ORDER BY RAND(category_name) ASC LIMIT 6";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}
public function selectOneProductsRandomly(){

    $sql = "SELECT * FROM product ORDER BY product_id DESC LIMIT 1; ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $result  = $stmt->fetch();
    return $result;

}


public function selectProductsBYCategory($categoryName){


    $data[] = array();
    $sql = "SELECT * FROM product WHERE category_name=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$categoryName]);
    $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}

public function getBrandName(){
    
    $sql = "SELECT Brand_name FROM product GROUP BY Brand_name";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $result  = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;

}


// select product by brand name 
public function FilterProductsBrandName($brandname,$category){

    $sql = "SELECT * FROM product WHERE Brand_name IN('".implode("','", $brandname)."') AND category_name=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$category]);
    $result  = $stmt->fetchAll();
    
    $data = array();

    foreach ($result as $row) {
        
        $data[] = $row;
    }

return $data;

}


public function filterPrice($minValue, $maxValue){

    $sql = "SELECT * FROM product WHERE retail_price BETWEEN '".$minValue."' AND '".$maxValue."'";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $result  = $stmt->fetchAll();
   
    return $result;
}


// search products 
public function searchProducts($prodName){


    $data[] = array();
    $sql = "SELECT * FROM product WHERE product_name LIKE '%".$prodName."%' OR Brand_name LIKE '%".$prodName."%' OR category_name LIKE '%".$prodName."%'";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$prodName]);
    $result  = $stmt->fetchAll();
    return $result;

}


// cart methods 

public function selectCartItems($customer_ID){


    $sql = "select cart.cart_id,cart.qty,cart.price,product.product_name,product.product_description,product.category_name,product.Brand_name,product.retail_price AS sellingPrice,product.quantity,product.image,product.item_code FROM cart INNER JOIN product ON cart.product_id = product.item_code WHERE cart.customer_ID = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$customer_ID]);
    $result  = $stmt->fetchAll();
    return $result;

}

public function deleteCartItems($itemID){

    $sql = "DELETE FROM cart WHERE cart_id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$itemID]);

}

public function clearCart($customer_id){

    $sql = "DELETE FROM cart WHERE customer_ID=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$customer_id]);

}


public function UpdateCartItems($qty,$price,$cart_id,$key){

    $sql = "UPDATE cart SET qty=? , price=? WHERE cart_id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$qty, $price[$key],$cart_id[$key]]);
}

public function orderIDCount(){

    $sql = "SELECT MAX(order_id) AS orderID FROM order_table";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $result  = $stmt->fetch();
    return $result;

}

public function AddOrder($order_id,$customer_id,$qty,$total,$payment_method,$order_date,$status){

    $sql = "INSERT INTO order_table(order_id ,customer_id, qty, total,payment_method,order_date,status) VALUES (?, ?, ? , ? , ?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$order_id,$customer_id,$qty,$total,$payment_method,$order_date,$status]);

}

public function AddOrderItems($order_id,$product_id,$qty,$key){

    $sql = "INSERT INTO order_items(order_id ,product_id, quantity) VALUES (?, ? , ? )";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$order_id,$product_id[$key],$qty[$key]]);

}

// decrease product quantity when placing order 
public function deQty($qty,$product_id,$key){

    $sql = "UPDATE product SET quantity= quantity-? WHERE item_code=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$qty, $product_id[$key]]);
}

// current user details 
// getting current users in session 
public function currentUser($username){

    $sql = "SELECT * FROM customers WHERE email = ? LIMIT 1";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$username]);
        $result = $stmt->fetch();
        return $result;
}
    
public function BillingDetails($card_ex_date,$card_pin,$card_no,$cardHolderName,$address,$fullname,$email,$mobileNo, $date,$customer_id){

    $sql = "INSERT INTO billing_info(card_ex_date,card_pin,card_no, cardHolderName,billing_address,full_name,email,mobileno,bill_date,customer_id) VALUES (?,?,?,?,?,?,?,?,?,?)";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$card_ex_date,$card_pin,$card_no,$cardHolderName,$address,$fullname,$email,$mobileNo, $date,$customer_id]);

}


// order history details 
// cart methods 

public function getOrdersbyCusID($customer_ID){


    $sql = "SELECT * FROM order_table WHERE customer_id=? LIMIT 10";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$customer_ID]);
    $result  = $stmt->fetchAll();
    return $result;

}
public function OrderDetails($orderID){


    $sql = "SELECT order_items.quantity AS orderQTY, product.product_name,product.retail_price FROM order_items INNER JOIN product ON order_items.product_id = product.item_code WHERE order_items.order_id = ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$orderID]);
    $result  = $stmt->fetchAll();
    return $result;

}


}