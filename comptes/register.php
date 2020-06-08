<?php 
require_once 'inc/header.php';
require_once 'inc/function.php'
 ?>
<?php if (!empty($_POST)) {
	$errors = array();
	//|| filter_var($_POST['mail'], FILTER_VALIDATE_EMAIL
	//preg_match('/^[a-zA-Z0-9]$/', $_POST['username'])
	require_once 'inc/db.php';
	if (empty($_POST['username'])) {
		$errors['username'] = "username n'est pas valide";
	}else{
		$req = $db->prepare("SELECT id  from users WHERE username = ?");
		$req->execute(array($_POST['username']));
		$user = $req->fetch();
		if ($user) {
			$errors['username'] = "ce Pseudo est déjà pris ! ";	
		}
	}
	if (empty($_POST['mail'])) {
		$errors['mail'] = "mail n'est pas valide";
	}else{
		$req = $db->prepare("SELECT id  from users WHERE mail = ?");
		$req->execute(array($_POST['mail']));
		$user = $req->fetch();
		if ($user) {
			$errors['mail'] = "Maim déjà pris ! ";	
		} 
	}

	if (empty($_POST['password']) || $_POST['password']!=$_POST['password_confirm']) {
		$errors['password'] = "password n'est pas valide";
	}
	
	if (empty($errors)) {
		$req = $db->prepare("INSERT INTO users set username = ?, mail = ?, password = ?, confirmation_token = ? ");
		$password = crypt($_POST['password']);
		$token = str_random(60);
		$req->execute(array( $_POST['username'], $_POST['mail'], $password, $token));
		$user_id = $db->lastInsertId();
		mail($_POST['mail'], 'Confirmation mail', "Afin de valider votre compte merci de cliquer ce lien\n\nhttp://localhost/comptes/confirme.php?id=".$user_id."&confirmation_token=".$token."");	
	 	$_SESSION['flash']['success'] = "Un email de confirmation vous a été envoyer";
	 	header('location:login.php');
	 	exit();
	 	}

} 
?>



	<h1>S'inscrire</h1>
	<?php if (!empty($errors)) : ?>
		<div class="alert alert-danger">
			<ul> 
				<?php foreach ($errors as $error) :   ?>
				<p>Vous n'avez remplit le formulaire correctement ! </p>
					<li><?php echo $error ?></li>
				<?php endforeach ?>
			</ul>
		</div>	
	<?php endif ?>

	<form method='post' action=''>
		<div class="form-group">
			<label>Pseudo</label>
			<input class='form-control' type='text' name='username' >
		</div>
		<div class="form-group">
			<label>Email</label>
			<input class='form-control' type='mail' name='mail' >
		</div>
		<div class="form-group">
			<label>Mot de passe</label>
			<input class='form-control' type='password' name='password' >
		</div>
		<div class="form-group">
			<label>Confirmation de mot de passe</label>
			<input class='form-control' type='password' name='password_confirm' >
		</div>
		<div class="form-group">
			<input class='btn btn-primary' type='submit' value='enregistrer' name='Enregistrer'>
		</div>						
	</form>

<?php include 'inc/footer.php' ?>
