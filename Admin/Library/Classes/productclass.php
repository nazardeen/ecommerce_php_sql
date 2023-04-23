<?php
include 'database.php';

Class Product extends Database{
     

    public function getMaxProductID()
    {
        $sql = "SELECT MAX(item_code) AS ItemID FROM product";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result;
    }
    
    public function getproduct(){
        $sql = "SELECT * From product";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

		return $result;
    }


    public function getproductBYID($id){
        $sql = "SELECT * From product WHERE product_id=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
		return $result;
    }
      public function getimageByItemCode($id){
        $sql = "SELECT image,image_2,item_code From product WHERE item_code=?";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$id]);
        $result = $stmt->fetch();
		return $result;
    }

  
// add product
    public function addproduct($item_code,$product_name,$category_name,$Brand_name,$product_description,$ram,$rom,$display,$battery,$quantity,$buying_price,$retail_price,$image,$image_2,$warranty,$camera){

        $sql = "INSERT INTO product(item_code,product_name,category_name,Brand_name, product_description,ram,storage,display,battery,quantity,buying_price,retail_price,image,image_2,warranty,camera) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = $this->connect()->prepare($sql);
        $stmt->execute([$item_code,$product_name,$category_name,$Brand_name,$product_description,$ram,$rom,$display,$battery,$quantity,$buying_price,$retail_price,$image,$image_2,$warranty,$camera]);

    }
   
    // update product
public function update_product($item_code,$product_name,$category_name,$Brand_name,$product_description,$ram,$rom,$display,$battery,$camera,$quantity,$buying_price,$retail_price,$warranty,$product_id)
{
    $sql = "UPDATE product SET item_code=?,product_name=?,category_name=?,Brand_name=?, product_description=?,ram=?,storage=?,Display=?,Battery=?,camera=?,quantity=?,buying_price=?,retail_price=?, warranty=? WHERE product_id=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$item_code,$product_name,$category_name,$Brand_name,$product_description,$ram,$rom,$display,$battery,$camera,$quantity,$buying_price,$retail_price,$warranty,$product_id]);

    return true;

}

public function updateImages($image01,$image02,$itemcode)
{
    $sql = "UPDATE product SET image=?, image_2=? WHERE item_code=?";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$image01,$image02,$itemcode]);

    return true;

}


    // delete product
public function delete_product($product_id)
{
    $sql = "DELETE FROM product WHERE product_id = ? ";
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$product_id]);

    return true;

}
    

}