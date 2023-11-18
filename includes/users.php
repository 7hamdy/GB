<?php

class users{

private $connection;

/*

* Create New Connection
*/

public function __construct(){

$this->connection = new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);    
}
    


public function addUser($userName,$password,$email){

 $this->connection->query("INSERT INTO `users`( `userName`, `pass`, `email`) VALUES ('$userName','$password','$email')");
  
 if($this->connection->affected_rows > 0) return true;
  
 return false;  
}

public function updateUser($id,$userName,$password,$email){

    $sql = "UPDATE `users` SET ";

    if(strlen($userName)>0)
        $sql .= "`userName`='$userName'";

    if(strlen($password)>0)
        $sql .= ",`pass`='$password'";

    if(strlen($email)>0)
        $sql .= ",`email`='$email'";

    $sql .= " WHERE `id`=$id";
    
    $this->connection->query($sql);
    
    if($this->connection->affected_rows > 0) return true;
   else{

    echo $this->connection->error;
    return false;
   
   }
   
   
    
    
}

public function deleteUser($id){

    $this->connection->query("DELETE FROM `users` WHERE `id`='$id' ");

   if($this->connection->affected_rows > 0) return true;
   
    return false;
    


}
public function getUsers($extraQuery=''){
    
    $result = $this->connection->query("SELECT * FROM `users` $extraQuery");
    
    if($result->num_rows > 0){

        $users=[];    

        while($row=$result->fetch_assoc())
        {
             $users[]=$row;
        }
        return $users;
    }

    return null;

}
public function getUser($id){
    $user = $this->getUsers("WHERE `id`='$id'");
    if($user && count($user)>0) return $user[0]; 
      return null; 

}
public function login($userName,$password){
    $user = $this->getUsers("WHERE `userName`='$userName' AND `pass`='$password' ");
    if($user && count($user)>0) return $user[0]; 
    return null; 


}

public function __destruct()
{
    $this->connection->close();
}



}


?>