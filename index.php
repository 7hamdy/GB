<?php
session_start();
include("includes/config.php");
include("includes/products.php");
$selected = 'home';

include('templates/front/header.html');

$product =new products();

$result = $product->getProducts("ORDER BY `id` DESC LIMIT 3 ");

include('templates/front/index.html');





include('templates/front/footer.html');

?>