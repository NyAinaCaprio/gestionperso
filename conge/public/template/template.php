	<!doctype html>
	<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="description" content="">
		<meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
		<meta name="generator" content="Jekyll v3.8.5">
	<title>DIA : Gestion de congé</title>
    
    <link  href="../public/css/bootstrap.min.css" rel="stylesheet">
    <script src="../public/js/jquery-3.3.1.slim.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../public/font-awesome-4.3.0/css/font-awesome.min.css">

	<script type="text/javascript" src = "public/js/CongeJavaScript.js"></script>
    <!-- 

	<link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/dashboard/">
	<script type="text/javascript" src="../bootstrap/js/jquery-1.12.4.js"></script>
    <link href="../public/bootstrap/dist/css/bootstrap.css" rel="stylesheet"> 
    <link href="../public/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

	-->
	
	<style>
		.bd-placeholder-img {
		font-size: 1.125rem;
		text-anchor: middle;
		-webkit-user-select: none;
		-moz-user-select: none;
		-ms-user-select: none;
		user-select: none;
	}
	@media (min-width: 768px) {
		.bd-placeholder-img-lg {

		font-size: 3.5rem;
		}
	}
	</style>
	<!-- Custom styles for this template -->
	<link href="dashboard.css" rel="stylesheet">
	</head>
	<body>
		<nav class="navbar navbar-expand-lg navbar-dark bg-info">
		  <a class="navbar-brand" href="index.php">DIA : CONGE</a>
		  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
		    <span class="navbar-toggler-icon"></span>
		  </button>

		  <div class="collapse navbar-collapse" id="navbarSupportedContent">
		    <ul class="navbar-nav mr-auto">
		      <!-- <li class="nav-item active">
		        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		      </li>
		      <li class="nav-item">
		        <a class="nav-link" href="#">Link</a>
		      </li>
		       -->
		       <li class="nav-item dropdown">
		        <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		          Consultation
		        </a>
		        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
		          <a class="dropdown-item" href="index.php?p=listeAuto">Autorisation Absence</a>
		          <a class="dropdown-item" href="#">Alaitement</a>
		          <div class="dropdown-divider"></div>
		          <a class="dropdown-item" href="#">Something else here</a>
		        </div>
		      </li>
		      <!-- <li class="nav-item">
		        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
		      </li> -->
		    </ul>
		    <form class="form-inline my-2 my-lg-0">
		      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
		      <button class="btn btn-success my-2 my-sm-0" type="submit">Recherche</button>
		    </form>
		  </div>
		</nav>
		<div class="container-fluid">
			<div class="mt-5"></div>
			<div class="row">
				<nav class="col-md-2 d-none d-md-block bg-light sidebar">
					<div class="sidebar-sticky">
						<ul class="nav flex-column">
							<li class="nav-item">
								<a class="nav-link active" href="#">
									<span data-feather="home"></span>
									Accueil <span class="sr-only">(current)</span>
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php?p=addconge">
									Congé
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php?p=addreliquat">
									Reliquat
								</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="index.php?p=autoabsence">
									<span data-feather="users"></span>
									Autorisation d'absence
								</a>
							</li>
						</ul>
					</div>
				</nav>
	
					<div class="col-md-9 mt-4">
						<?php echo $contenu ?>
						
					</div>
			</div>
		</div>


      <script src="../public/js/popper.min.js" ></script>
      <script src="../public/js/bootstrap.min.js"  ></script>  


	<!-- 					
	<script>
	// window.jQuery ||  document.write("<script src='public/bootstrap/docs/4.3/assets/js/vendor/jquery-slim.min.js'>
		</script></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"> </script>
	<script src="../public/bootstrap.dist/js/bootstrap.bundle.min.js" ></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
 	<script src="dashboard.js"></script>
 	-->
</body>
</html>
	