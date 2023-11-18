<?php
session_start();
$mes2='';
require "includes/config.php";
require "includes/users.php";
require "includes/function.php";

if(checkLogin()){
    $mes2 ='you are already logged in ..';    
    header("location:showMessage.php?mes2=$mes2");

}

$error ='';

if(count($_POST) > 0){

    $user = new users();


    $userName = $_POST['username'];
    $password = $_POST['password'];
    

    $data=$user->login($userName,$password);
    
    if($data && count($data) > 0){
     
     
        $_SESSION['user'] = $data;

        if($_SESSION['user']['userName']=='admin'){
            
            header('location:admin/alluser.php');

        }
        else{
            header('location:index.php');

        }

    

    }
    else{
       $error = "Invalid UserName and Password";
    }

}


include('templates/admin/login.html');




?>