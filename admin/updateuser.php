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

$idFromUrl = (isset($_GET['id']))? (int)$_GET['id'] : 0;
$usersObject = new users();
$user =$usersObject->getUser($idFromUrl);



$error = '';
$success = '';

if(count($_POST)>0)
{

    $username = $_POST['userName'];
    $password = $_POST['password'];
    $email    = $_POST['email'];
    $idFromForm = $_POST['id'];

    if($usersObject->updateUser($idFromForm,$username,$password,$email)){
        $success = 'user updated';
        //header('location:allUser.php');
}
    else{
        $error = 'user not updated';
       // header('location:allUser.php');


      }

}


include("../templates/admin/header.html");

include("../templates/admin/update-user.html");

include("../templates/admin/footer.html");



?>