<?php

 function checkLogin(){
  return isset($_SESSION['user']) ? true : false ;
}

function checkLoginAdmin(){

    return (  isset($_SESSION['user']) && $_SESSION['user']['userName'] =='admin' ) ? true : false ;
  
}



function validateImage($file)
{
  
  
    // Get the MIME type of the file
    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mimeType = $finfo->file($file['tmp_name']);

    // Check the MIME type
    $allowedTypes = ['image/jpeg', 'image/png', 'application/pdf'];
    if (!in_array($mimeType, $allowedTypes)) {
        return 'Unsupported file type. Only JPEG, PNG, and PDF files are allowed.';
    }


    // Check the file's size (optional)
    $maxSize = 2 * 1024 * 1024; // 2MB
    if ($file['size'] > $maxSize) {
        return 'Image size exceeds the maximum allowed size.';
    }

    // Additional checks if necessary (e.g., image dimensions, aspect ratio, etc.)

    // If all checks pass, return true or perform further processing
    return true;
}









   



?>