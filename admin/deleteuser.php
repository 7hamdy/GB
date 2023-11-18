<?php
session_start();

require "../includes/config.php";
require "../includes/users.php";
require "../includes/function.php";
$mes1='';

if(!checkLoginAdmin()){
  $mes1="You do not have permission to view this page";
  header("location:../showMessage.php?mes1=$mes1");

}
    
$id = isset($_GET["id"]) ? ($_GET["id"]) :0;

$users = new users();

$result = $users->deleteUser($id);

if($result){

    header("location:alluser.php");

}else{ 
    
    echo"user Invalid";

}

    




//include("../templates/admin/all-users.html");

?>