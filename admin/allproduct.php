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
$products = new products();

$result = $products->getProducts();

    


include("../templates/admin/header.html");

include("../templates/admin/all-products.html");

include("../templates/admin/footer.html");








?>