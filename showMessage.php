<?php
session_start();
$selected = 'home';
$mes1 = (isset($_GET['mes1']))? $_GET['mes1'] : '';
$mes2 = (isset($_GET['mes2']))? $_GET['mes2'] : '';
include('templates/front/header.html');

include('templates/front/showMessage.html');

include('templates/front/footer.html');


?>