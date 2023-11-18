<?php
session_start();
require('../includes/function.php');
$mes1='';

if(!checkLoginAdmin()){
  $mes1="You do not have permission to view this page";
  header("location:../showMessage.php?mes1=$mes1");

}

include("../templates/admin/header.html");

include('../templates/admin/index.html');

include("../templates/admin/footer.html");


?>