<?php 
include 'inc/header.php' ;
require 'inc/function.php'; 

if (!isset($_SESSION['auth'])) {
 		$_SESSION['flash']['danger']='Vous n avez pas le droit d acce a cette page ';
		header('location:login.php');
		exit();
} 

if (!empty($_POST)) {
 
 	if ( $_POST['password'] =="" || $_POST['password'] != $_POST['password_confirm']) {
 		$_SESSION['flash']['danger']='Votre mot de passe ne correspond pas ';

 	}else{
		require 'inc/db.php';
		$req = $db->prepare("UPDATE users SET password = ?  WHERE id = ?");
 		$password = crypt($_POST['password']);
 		$req->execute(array($password, $_SESSION['auth']->id));
 		$_SESSION['flash']['success']='Votre mot de passe a ete mmodifie ';
 		 
 	}
 
}

?>

<h1>Votre compte</h1>
<h2>Bonjour : <?php echo $_SESSION['auth']->username ?></h2>

	<h1>Changer votre mot de passe</h1>
	<form method='post' action=''>
		<div class="form-group">
			<label>Mot de passe</label>
			<input class='form-control' type='password' name='password'  >
		</div>
		<div class="form-group">
			<label>Confirmation</label>
			<input class='form-control' type='password' name='password_confirm' >
		</div>
		<div class="form-group">
			<input class='btn btn-primary' type='submit' value='enregistrer' name='Enregistrer'>
		</div>						
	</form>

<?php debug($_SESSION) ?>

<?php include 'inc/footer.php' ?>
