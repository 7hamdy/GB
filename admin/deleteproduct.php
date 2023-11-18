<?php

session_start();

require "../includes/config.php";
require "../includes/products.php";
require "../includes/function.php";
$mes1='';

if(!checkLoginAdmin()){
  $mes1="You do not have permission to view this page";
  header("location:../showMessage.php?mes1=$mes1");

}
$id = isset($_GET["id"]) ? ($_GET["id"]) :0;

$products = new products();

$product = $products->getProduct($id);

$result = $products->deleteProcuct($id);


if($result){

    if(file_exists('../uploads/'.$product['img']))
        unlink('../uploads/'.$product['img']);
        header('location:allproduct.php');
}
else{ 
    
    echo"product  Invalid";

}


 




//include("../templates/admin/all-users.html");

?>