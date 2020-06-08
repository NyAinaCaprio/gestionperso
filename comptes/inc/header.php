<?php  session_start(); ?>
<html lang='fr'>
<head>
	<meta charser='utf-8'>
	<meta http-equiv='X-UA-Compatible' content='IE-edge'>
	<meta name='viewport' content='width=device-width, initial-scale=1'>	

	<title>Gestio d'espace membre</title>
	<link rel="stylesheet" type="text/css" href="css/app.css">
</head>
<body>
<nav class="navbar navbar-inverse">
	<div class="container">
		<div class="navbar-header">
			<button type='button' class='navbar-toggle collapsed' data-toggle='collapse' data-target='#navbar' >
				<span class="sr-only"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a href="#" class='navbar-brand'>Gestion d'espace membre</a>

		</div>
		<div id='navbar' class="collapse navbar-collapse">
			<ul class='nav navbar-nav'>
				<?php if (isset($_SESSION['auth'])) : ?>
				<li><a href="logout.php">Se déconnecter</a></li>
				<?php endif ?>
				<li><a href="register.php">S'inscrire</a></li>
				<?php if (!isset($_SESSION['auth'])) : ?>
				<li><a href="login.php">Se Connecter</a></li>
				<?php endif ?>
			</ul>
		</div>

	</div>
</nav>

<div class="container">


<?php if (isset($_SESSION['flash'])) : ?>
	<?php foreach($_SESSION['flash'] as $key => $message) :?>
		<div class="alert alert-<?php echo $key ?>">
			<?php echo $message ?>

		</div>
	<?php endforeach ?>
	<?php unset($_SESSION['flash']) ?>	
<?php endif ?>