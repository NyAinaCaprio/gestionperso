<?php 
session_start();

if (!$_SESSION['auth']) {
	$message['danger'] = 'Vous devez vous connecter';
	$_SESSION['message'] = $message;
	header(('location:../index.php'));
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Ecmag - Etablissement Central des Matériels Téchnique</title>
<!-- BOOTSTRAP STYLES-->
<link href="public/assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="public/assets/css/font-awesome.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="public/assets/css/custom.css" rel="stylesheet" />
<link href="public/assets/css/animate.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

<!-- /. WRAPPER  -->
<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<!---<script src="public/assets/js/jquery-1.10.2.js"></script>-->
<!-- BOOTSTRAP SCRIPTS -->
<script src="public/assets/js/jquery-3.1.0.js" type="text/javascript"></script>
<script src="public/assets/js/bootstrap.min.js" type="text/javascript"></script>
<!-- METISMENU SCRIPTS -->
<script src="public/assets/js/jquery.metisMenu.js" type="text/javascript"></script>
<!-- CUSTOM SCRIPTS -->
<script src="public/assets/js/custom.js"  type="text/javascript"></script>
<script src="public/assets/js/monjavasstock.js" type="text/javascript"></script>


<body>
<?php 
ob_start();

 if (isset($_GET['p'])) {
 	$p = $_GET['p'];
 }else{
 	$p='home';
 }


if ($p==='home') {
	require 'public/accueil.php';
}elseif ($p==='etatdestock') {
	require 'class/etatdestock.php';
}elseif ($p==='add') {
	require 'class/fenentreenouveauarticles.php';
}elseif($p === 'bonetdotation'){

	require 'class/bonetdotation.php';
}elseif($p === 'fichedestock'){

	require 'class/fichedestock.php';
}elseif ($p==='traitementfinperiode') {
	require 'class/traitementfinperiode.php';
}elseif ($p==="consultation") {
	require 'class/consultationentree.php';
}elseif ($p ==='fournisseurs') {
	require 'class/fournisseurs.php';
}elseif ($p ==='DON') {
	require 'class/DON.php';
}elseif ($p ==='sortiearticles') {
	require 'class/sortiearticles.php';
}elseif ($p==='addInventaire') {
	require 'class/addInventaire.php';
}


$contenu = ob_get_clean();
require 'public/templates/template.php';
 ?>
</body>
</html>