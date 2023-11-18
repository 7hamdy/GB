<?php

class products{

private $connection;

/*

* Create New Connection
*/

public function __construct(){

$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);    
}
    


public function addProduct($title,$desc,$img,$available,$user_id,$price){

 $this->connection->query("INSERT INTO `products` (`title`, `desc`, `img`, `available`, `user_id`, `price`) VALUES ('$title','$desc','$img',$available,$user_id,$price) ");
  
 if($this->connection->affected_rows > 0) return true;
  else{
    echo $this->connection->error;
    return false;
  }
   
}

public function updateProduct($id,$title,$desc,$img,$available,$user_id,$price){

    $sql = "UPDATE `products` SET ";

    if(strlen($title) > 0 ) $sql .= "`title`='$title',";
    if(strlen($desc) > 0 ) $sql .= "`desc`='$desc',";
    if(strlen($img) > 0 ) $sql .= "`img`='$img',";
    if(strlen($available) > 0 ) $sql .= "`available`='$available',";
    if(strlen($user_id) > 0 ) $sql .= "`user_id`='$user_id',";
    if(strlen($price) > 0 ) $sql .= "`price`='$price'";
    
    $sql .= " WHERE `id`='$id' ";
   
    $this->connection->query($sql);
   
    if($this->connection->affected_rows > 0) return true;
    else
    { echo $this->connection->error;
    return false;
    }
}

public function deleteProcuct($id){

    $this->connection->query("DELETE FROM `products` WHERE `id`='$id' ");

   if($this->connection->affected_rows > 0) return true;
   
    return false;
    


}
public function getProducts($extraQuery=''){
    
    $result = $this->connection->query("SELECT * FROM `products` $extraQuery");
    
    if($result->num_rows > 0){

        $products=[];    

        while($row=$result->fetch_assoc())
        {
             $products[]=$row;
        }
        return $products;
    }

    return null;

}
public function getProduct($id){
    $products = $this->getProducts("WHERE `id`='$id' ");
    if($products && count($products)>0) return $products[0]; 
    return null; 
}
public function searchProducts($keyword){
    return $this->getProducts("WHERE `title` LIKE '%$keyword%'"); 


}

public function __destruct()
{
    $this->connection->close();
}



}


?>