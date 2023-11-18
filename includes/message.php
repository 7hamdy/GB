<?php

class message{

private $connection;

/*

* Create New Connection
*/

public function __construct(){

$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);    
}
    


public function addMessage($title,$content,$name,$email){

 $this->connection->query("INSERT INTO `message`(`title`, `content`, `name`, `email`) VALUES ('$title','$content','$name','$email')");
  
 if($this->connection->affected_rows > 0) return true;
  
 return false;  
}

public function updateMessage($id,$title,$content,$name,$email){

    $sql = "UPDATE `message` SET ";

    if(strlen($title) > 0 ) $sql .= "`title`='$title',";
    if(strlen($content) > 0 ) $sql .= "`content`='$content',";
    if(strlen($name) > 0 ) $sql .= "`name`='$name',";
    if(strlen($email) > 0 ) $sql .= "`email`='$email'";
    
    $sql .= " WHERE `id`='$id' ";
   
    $this->connection->query($sql);
   
    if($this->connection->affected_rows > 0) return true;
   
    return false;
    
}

public function deleteMesaage($id){

    $this->connection->query("DELETE FROM `message` WHERE `id`='$id' ");

   if($this->connection->affected_rows > 0) return true;
   
    return false;
    


}
public function getMessages($extraQuery=''){
    
    $result = $this->connection->query("SELECT * FROM `message` $extraQuery");
    
    if($result->num_rows > 0){

        $messages=[];    

        while($row=$result->fetch_assoc())
        {
             $messages[]=$row;
        }
        return $messages;
    }

    return null;

}
public function getMessage($id){
    $message = $this->getMessages("WHERE `id`='$id'");
    if($message && count($message)>0) return $message[0]; 
      return null; 

}

public function __destruct()
{
    $this->connection->close();
}



}


?>