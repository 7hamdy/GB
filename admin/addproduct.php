<?php
session_start();
$mes1='';
require "../includes/config.php";
require "../includes/products.php";
require "../includes/function.php";

if(!checkLoginAdmin()){
  $mes1="You do not have permission to view this page";
  header("location:../showMessage.php?mes1=$mes1");

}



$sucsess ='';
$error ='';


if(isset($_POST['submit']) ){

$products = new products();

$title = $_POST['title'];
$desc = $_POST['desc'];
$available = $_POST['available'];
$price = $_POST['price'];
$user_id = $_SESSION['user']['id'];
$image = '';

//$image = $_POST['available'];



if($title==''){
  $error ="Title is requierd "; 
}
if($desc==''){
  $error .=",Desc is requierd "; 
}
if($price==''){
  $error .=", Price is requierd "; 
}
if($available==''){
  $error .=", Available is requierd"; 
}


if ( $_FILES['image']['size'] ==0  ){
  $error .= ", Image is Requierd";

}
if ( $_FILES['image']['size'] !==0  )  {
    $validationResult = validateImage($_FILES['image']);
    if ($validationResult === true) {
      $name=$_FILES['image']['name'];
      $newName=md5(rand(10,2000)).date('U').$name;
       move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/'.$newName);
       $image = $newName;
    } else {
        // Image is invalid, display an error message
        $error= $validationResult;
        exit;
    }
  }

   if($error ==''){

    $result = $products->addProduct($title,$desc,$image,$available,$user_id,$price);
    
    if($result){
      $sucsess = "Product Is Added";   
    }

    else{
      $error = "Error when added User";
    }
   
  }

   



}

include("../templates/admin/header.html");
include("../templates/admin/add-product.html");
include("../templates/admin/footer.html");




?>