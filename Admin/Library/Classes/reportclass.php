
<?php
include 'database.php';

Class Report extends Database{
    public function getreport($date){
       $sql = "SELECT order_table.order_date,order_table.qty,order_table.total,order_items.quantity,product.retail_price,product.product_name,product.buying_price FROM order_table INNER JOIN order_items ON order_table.order_id = order_items.order_id INNER JOIN product ON order_items.product_id= product.item_code WHERE order_table.order_date = ?";
       $stmt = $this->connect()->prepare($sql);
       $stmt->execute([$date]);
       $result = $stmt->fetchAll();

       return $result;
   }
   

//total
public function gettotal(){
    $sql = "SELECT SUM(total) as price FROM order_table";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();

    return $result;
}
//profit
public function getprofit(){
    $sql = "SELECT SUM(total) as price FROM order_table WHERE order_date=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetch();

    return $result;
}
//joined product table(cost price ekai sales price ekai)
}