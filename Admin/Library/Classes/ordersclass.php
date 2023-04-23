<?php
include_once 'database.php';

Class Order extends Database{
    public function getorder(){
       $sql = "SELECT order_table.order_id AS orderID, order_table.order_date AS orderDate, order_table.shipped_date AS shippedDate, order_table.qty AS totalQuantity,order_table.total AS TotalPrice,order_table.payment_method,order_table.authorized_by,order_items.quantity AS unitQTY, product.item_code AS ItemCode,product.product_name,customers.full_name AS customerFullName FROM order_table INNER JOIN order_items ON order_table.order_id = order_items.order_id INNER JOIN product ON order_items.product_id = product.item_code INNER JOIN customers ON order_table.customer_id = customers.customer_id";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute();
       $result = $stmt->fetchAll();
       return $result;
   } 
   
   public function getorderbyOrderID($order_id){
       
       $sql = "SELECT 
       order_items.quantity,
       product.item_code,
       product.product_name,
       product.retail_price 
       FROM order_items 
       INNER JOIN product 
       ON  order_items.product_id = product.item_code 
       WHERE order_items.order_id = ?";

       $stmt = $this->connect()->prepare($sql);
       $stmt->execute([$order_id]);
       $result = $stmt->fetchAll();
       return $result;
   }

      public function getCustomerName($order_id){
       
       $sql = "SELECT 
       customers.full_name,
       order_table.qty,
       order_table.status,
       order_table.total,
       order_table.payment_method 
       FROM customers 
       INNER JOIN order_table
        ON customers.customer_id = order_table.customer_id 
        WHERE order_table.order_id = ?";

       $stmt = $this->connect()->prepare($sql);
       $stmt->execute([$order_id]);
       $result = $stmt->fetch();
       return $result;
   }


// delete order
public function deleteorder($order_id)
{
    $sql = "DELETE FROM order_table WHERE order_id = ? ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$order_id]);
    return true;

}

public function updateCompletedStatus($order_id)
{
    $sql = "UPDATE order_table SET status= 'complete'  WHERE order_id = ? ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$order_id]);

    return true;

}
public function getAllOrders(){
    $sql = "SELECT order_table.payment_method,order_table.status,order_table.order_id,customers.full_name FROM order_table INNER JOIN customers ON order_table.customer_id = customers.customer_id";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();
    return $result;
}


}