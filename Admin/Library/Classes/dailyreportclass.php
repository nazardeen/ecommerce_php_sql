<?php
include_once 'database.php';

Class Report extends Database{
    public function getreport(){
       $sql = "SELECT 
       order_table.order_date,
       order_table.total,
       order_items.quantity,order_items.order_id,
       product.product_id,
       product.product_description 
       FROM order_table 
       INNER JOIN order_items 
       ON order_table.order_id = order_items.order_id 
       INNER JOIN product 
       ON order_items.product_id= product.item_code";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute();
       $result = $stmt->fetchAll();

       return $result;
   }
   
   public function getreportByDate($date){
       $sql = "SELECT 
       order_table.order_date,
       order_table.order_id AS orderID,
       order_table.total,
       order_table.payment_method,
       order_table.qty,
       order_table.status,
       order_items.quantity,
       order_items.order_id,
       product.product_id,
       product.product_description 
       FROM order_table 
       INNER JOIN order_items 
       ON order_table.order_id = order_items.order_id 
       INNER JOIN product 
       ON order_items.product_id= product.item_code 
       WHERE order_table.order_date=? 
       GROUP BY order_items.order_id";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute([$date]);
       $result = $stmt->fetchAll();

       return $result;
   }
   
   public function getreportByOrderID($Order_ID){
    $sql = "SELECT order_table.order_date,order_table.qty,order_table.total,order_items.quantity,product.retail_price,product.product_name,product.item_code FROM order_table INNER JOIN order_items ON order_table.order_id = order_items.order_id INNER JOIN product ON order_items.product_id= product.item_code WHERE order_table.order_id= ?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$Order_ID]);
    $result = $stmt->fetchAll();

    return $result;
}

   public function getProfit($date){
       $sql = "SELECT 
       order_table.order_date,
       order_items.quantity,
       product.item_code,
       product.retail_price,
       product.buying_price 
       FROM order_table 
       INNER JOIN 
       order_items 
       ON order_table.order_id = order_items.order_id 
       INNER JOIN product
        ON order_items.product_id = product.item_code 
        WHERE order_table.order_date=?";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute([$date]);
       $result = $stmt->fetchAll();

       return $result;
   }
   public function getProfitAll(){
       $sql = "SELECT 
       order_table.order_date,
       order_items.quantity,
       product.item_code,
       product.retail_price,
       product.buying_price 
       FROM order_table 
       INNER JOIN 
       order_items 
       ON order_table.order_id = order_items.order_id 
       INNER JOIN product
        ON order_items.product_id = product.item_code";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute();
       $result = $stmt->fetchAll();

       return $result;
   }
   
   public function getTotalCountDate($date){
       $sql = "SELECT SUM(total) AS grandTotal FROM order_table WHERE order_date=?";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute([$date]);
       $result = $stmt->fetch();

       return $result;
   }
   
   public function getTotal(){
       $sql = "SELECT SUM(total) AS grandTotal FROM order_table";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute();
       $result = $stmt->fetch();

       return $result;
   }
   public function getQtyCountDate($date){
       $sql = "SELECT SUM(qty) AS grandqty FROM order_table WHERE order_date=?";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute([$date]);
       $result = $stmt->fetch();

       return $result;
   }   
   
   public function getTotalItems(){
       $sql = "SELECT COUNT(quantity) AS qty FROM product";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute();
       $result = $stmt->fetch();

       return $result;
   }
   public function getTotalOrders(){
       $sql = "SELECT COUNT(order_id) AS orderCount FROM order_table";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute();
       $result = $stmt->fetch();

       return $result;
   }
   
   public function getInventoryValue(){
       $sql = "SELECT SUM(buying_price) AS cost FROM product";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute();
       $result = $stmt->fetch();

       return $result;
   }
   
   public function getReturnValue(){
       $sql = "SELECT SUM(return_total) AS returnVal FROM return_table";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute();
       $result = $stmt->fetch();

       return $result;
   }
   
   public function getYear(){
       $sql = "SELECT SUM(total) AS total, YEAR(order_date) AS year FROM order_table GROUP BY YEAR(order_date) ORDER BY YEAR(order_date) DESC LIMIT 5 ";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute();
       $result = $stmt->fetchAll();

       return $result;
   }

   public function getLastOrders(){
    $sql = "SELECT 
    order_table.order_id,
    order_table.total,
    order_table.status,
    customers.full_name 
    FROM order_table 
    INNER JOIN customers 
    ON order_table.customer_id = customers.customer_id 
    ORDER BY order_table.order_id DESC 
    LIMIT 5";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll();

    return $result;
}




}

?>