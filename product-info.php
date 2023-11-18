<?php
session_start();

include("includes/config.php");
include("includes/products.php");
$selected = 'product';

include('templates/front/header.html');

$id = (isset($_GET['id'])) ? (int)($_GET['id']) :0;

$product = new products();

$result = $product->getProduct($id);



include('templates/front/product-info.html');






include('templates/front/footer.html');

?>