<?php
include 'database.php';

class ReturnItems extends Database
{



    public function getMaxReturnID()
    {
        $sql = "SELECT MAX(Retrun_id) AS returnID FROM return_table";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    public function getOrder_Items($order_id)
    {
        $sql = "SELECT product.item_code,product.product_name,product.product_description,product.retail_price,order_items.quantity FROM product INNER JOIN order_items ON product.item_code = order_items.product_id WHERE order_items.order_id = ?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$order_id]);
        $result = $stmt->fetchAll();
        return $result;
    }

    // add product
    public function addReturns($Retrun_id ,$Order_id,$return_total){

        $sql = "INSERT INTO return_table(Retrun_id ,Order_id,return_total) VALUES (?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$Retrun_id ,$Order_id,$return_total]);

    }
    public function AddOrderItems($return_id,$product_id,$Quantity){

        $sql = "INSERT INTO return_items(return_id ,product_id, Quantity) VALUES (?, ? , ? )";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$return_id,$product_id,$Quantity]);
    
    }


}
