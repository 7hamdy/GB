<?php
session_start();
$mes1='';
require "../includes/config.php";
require "../includes/users.php";
require "../includes/function.php";

if(!checkLoginAdmin()){
  $mes1="You do not have permission to view this page";
  header("location:../showMessage.php?mes1=$mes1");

}
  
$sucsess ='';
$error ='';


if(count($_POST) > 0 ){

$users = new users();

$userName = $_POST['userName'];
$password = $_POST['password'];
$email = $_POST['email'];


if($userName==''){
  $error .="UserName is requierd "; 
}
if($password==''){
  $error .=", Password is requierd "; 
}

if($email==''){
  $error .=", Email is requierd "; 
}

if($error==''){

$result = $users->addUser($userName,$password,$email);

if($result){
  $sucsess = "User Is Added";   
}
else{
  $error = "Error when added User";
}
}

}

include("../templates/admin/header.html");

include("../templates/admin/add-user.html");


include("../templates/admin/footer.html");




?>