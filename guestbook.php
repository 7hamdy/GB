<?php
session_start();
include('includes/config.php');
include('includes/message.php');
$selected = 'gb';
$error  = '';
$success= '';
$gbObject = new message();
include('templates/front/header.html');




if(isset($_POST['submit']))
{
    $title  = $_POST['title'];
    $content= $_POST['content'];
    $name   = $_POST['name'];
    $email  = $_POST['email'];


    if($gbObject->addMessage($title,$content,$name,$email))
    {
        $success = 'Message Added Successfully';

        // Delay in seconds before page reload
        $delay = 0.5;

        // URL of the current page
        $url = $_SERVER['PHP_SELF'];

        // Use the header function to set the refresh directive
        header("refresh: $delay; url=$url");


    }
    else
    {
        $error = 'Error Adding Message';
    }

    $messages = $gbObject->getMessage('ORDER BY `id` DESC');
    



}
else
{
    $messages = $gbObject->getMessages('ORDER BY `id` DESC');
}
include('templates/front/guestbook.html');

include('templates/front/footer.html');


?>