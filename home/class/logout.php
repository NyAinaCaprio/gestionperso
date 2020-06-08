<?php  
session_start();

//setcookie('remember', NULL, -1 );
unset($_SESSION['auth']);
$_SESSION['success'] = "Votre compte est déconnecté";
header('location:../../index.php');
 ?>