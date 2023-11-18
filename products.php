<?php
session_start();

include("includes/config.php");
include("includes/products.php");
$selected = 'product';

include('templates/front/header.html');

$product =new products();

$result = $product->getProducts();
      
include('templates/front/products.html');
    






include('templates/front/footer.html');


?>