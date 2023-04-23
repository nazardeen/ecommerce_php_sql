<?php
include 'database.php';

Class SalesReport extends Database{
    public function getsalesreport(){
       $sql = "SELECT order_items.order_id,order_table.total FROM order_table INNER JOIN order_items ON order_table.order_id = order_items.order_id INNER JOIN product ON order_items.product_id= product.item_code";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute();
       $result = $stmt->fetchAll();

       return $result;
   }
}