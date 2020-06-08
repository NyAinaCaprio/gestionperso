<?php 
session_start();
$message = array();

  
if ($_POST['username']=='admin' &&  $_POST['pass']=='admin1234'){

$_SESSION['login']  = $_POST['username'];
$_SESSION['motdepasse']   = $_POST['pass'];

	header ('location:../index.php');
} else{
	$_SESSION['message'] = "Mot de passe ou Login incorrect ! ";
	header ('location:index.php');
}

