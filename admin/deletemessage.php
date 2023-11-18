<?php
session_start();

require "../includes/config.php";
require "../includes/message.php";
require "../includes/function.php";
$mes1='';

if(!checkLoginAdmin()){
  $mes1="You do not have permission to view this page";
  header("location:../showMessage.php?mes1=$mes1");

}
$id = isset($_GET["id"]) ? (int)($_GET["id"]) : 0 ;

$messages = new message();

$result = $messages->deleteMesaage($id);

if($result){
 header("location:allmessages.php");
}
    


include("../templates/admin/header.html");

include("../templates/admin/all-messages.html");

include("../templates/admin/footer.html");








?>