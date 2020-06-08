<?php 
function debug($value)
{
	echo   "<pre>".print_r($value, true)."</pre>" ;
}
function str_random($lenght)
{
	$alphabet ='azertyuipqsdfghjklmwxcvbnAZERTYUIOPQSDFGHJKLWXCVBN0123456789';
	return substr(str_shuffle(str_repeat($alphabet, 60)), 0,$lenght) ;

}

function logged_only()
{	
	if (!isset($_SESSION['auth'])) {
	$_SESSION['flash']['danger']="Vous n'avez pas le droit à cette page ";
	header('location : login.php');
	exit();
	}
}

function reconnected_coockie()
{
	if (isset($_COOKIE['remember'])) {
	//var_dump($_COOKIE['remember']);
	$remember_token = $_COOKIE['remember'];
	$parts = explode('//', $remember_token);
	$user_id = $parts[0];
	
	require 'db.php';
	global $db;
	$req = $db->prepare("SELECT * from users WHERE id = ? ");
	$req->execute(array($user_id));
	$user = $req->fetch();
	if ($user) {
		$expected = $user_id ."//". $user->remember_token . sha1($user_id. 'blablabla');
		if ($expected == $remember_token ) {
			$_SESSION['auth'] = $user;
			setcookie('remember', 60 * 60 * 24 * 7); 
		}
		}else{
		setcookie('remember', NULL, -1 );

		}


	}else{
	setcookie('remember', NULL, -1 );

	}
}
  