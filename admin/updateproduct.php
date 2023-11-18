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
    
$idFromUrl = (isset($_GET['id']))? (int)$_GET['id'] : 0;

$error = '';
$success = '';

$productsObject = new products();
$product = $productsObject->getProduct($idFromUrl);


if(count($_POST)>0)
{
   $oldImage=$_POST['image'];
   $imgProduct ='';


    if ( $_FILES['image']['size'] !==0  )  {
    $validationResult = validateImage($_FILES['image']);
    if ($validationResult === true) {
      $name=$_FILES['image']['name'];
      $newName=md5(rand(10,2000)).date('U').$name;
      if(move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/'.$newName)){
       
        if(file_exists('../uploads/'.$oldImage)){
        unlink('../uploads/'.$oldImage);
        $imgProduct = $newName;
       }
    }
    } else {
        // Image is invalid, display an error message
        $error = $validationResult;
        exit;
    }
}


    $title = $_POST['title'];
    $desc    = $_POST['desc'];
    $price   =$_POST['price'];
    $available = $_POST['available'];
    $user_id = $_SESSION['user']['id'];
    $idFromForm = $_POST['id'];


    if($productsObject->updateProduct($idFromForm, $title, $desc,$imgProduct ,$available , $user_id ,$price)){
        $success = 'Product updated';
        //header('location:allUser.php');
}
    else{
        $error = 'Product not updated';
       // header('location:allUser.php');


      }

}

include("../templates/admin/header.html");

include("../templates/admin/update-product.html");

include("../templates/admin/footer.html");









?>