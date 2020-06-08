<?php session_start();

$message=array();


if (!empty($_POST)) {
	if ($_SESSION['etsouservice'] === "spcm") {
		# code...
	}
	if ($_POST['login']=='spcm' && $_POST['pw']=='spcm2019') {
		$_SESSION['varid_compte'] = 1;
		$_SESSION['varid_etsouservice'] = "INFO";
		$_SESSION['varid_civil'] = 20;
		$_SESSION['nomprenom'] = 'Admin';
		$_SESSION['role'] = "";
		header('location:../../personnel/index.php');
	}
	elseif ($_POST['login']=='conge' && $_POST['pw']=='conge2019') {
		$_SESSION['varid_compte'] = 1;
		$_SESSION['varid_etsouservice'] = "INFO";
		$_SESSION['varid_civil'] = 20;
		$_SESSION['nomprenom'] = 'Admin';
		$_SESSION['role'] = "";
		header('location:../../conge/index.php');
	}
	elseif ($_POST['login']=='ecmag' && $_POST['pw']=='ecmag2019') {
		$_SESSION['varid_compte'] = 1;
		$_SESSION['varid_etsouservice'] = "INFO";
		$_SESSION['varid_civil'] = 20;
		$_SESSION['nomprenom'] = 'Admin';
		$_SESSION['role'] = "";
		header('location:../../ecmag/index.php');
	}
	elseif ($_POST['login']=='juridique' && $_POST['pw']=='juridique2019') {
		$_SESSION['varid_compte'] = 1;
		$_SESSION['varid_etsouservice'] = "INFO";
		$_SESSION['varid_civil'] = 20;
		$_SESSION['nomprenom'] = 'Admin';
		$_SESSION['role'] = "";
		header('location:../../juridique/index.php');
	}
	elseif ($_POST['login']=='courrier' && $_POST['pw']=='courrier') {
		$_SESSION['varid_compte'] = 1;
		$_SESSION['varid_etsouservice'] = "INFO";
		$_SESSION['varid_civil'] = 20;
		$_SESSION['nomprenom'] = 'Admin';
		$_SESSION['role'] = "";
		header('location:../../courrier/index.php');
	}
	else{

		$varetsouservice = $_SESSION['varetsouservice'];
		$message['danger'] = "Mot de passe incorrect";
		$_SESSION['message'] = $message;
		header("location:../../index.php?p=acces&etsouservice=".$varetsouservice."");
	}
	
	
} 
 

/*

if($_SESSION['etsouservicevariable'] =="SPCM")
{
if (($_POST['login']=='spcm') and ($_POST['pw']=='spcm2019')) 
	{	
	}
	elseif (($_POST['login']=='conge') and ($_POST['pw']=='conge2019'))
	{	
	$_SESSION['varid_compte'] = 1;
	$_SESSION['varid_etsouservice'] = "INFO";
	$_SESSION['varid_civil'] = 20;
	$_SESSION['role'] = "";
	header('location:../../Conge/');
	}
	else
	{
		$varetsouservice = $_SESSION['varetsouservice'];
		$_SESSION['message']="Mot de passe incorrect";
		header("location:acces.php?etsouservice=".$varetsouservice."");
	}
}

elseif($_SESSION['etsouservicevariable'] =="ECMAG"){
if (($_POST['login']=='ecmag') and ($_POST['pw']=='ecmag2019')) 
{	
$_SESSION['motdepasse']="ecmag2019";
$_SESSION['login']="RASOARINIRINA Tantely Malala Annick";
header('location:../../Ecmag/');
} 
else
{
	$varetsouservice = $_SESSION['varetsouservice'];
	$_SESSION['message']="Mot de passe incorrect";
	header("location:acces.php?etsouservice=".$varetsouservice."");
}
}

elseif($_SESSION['etsouservicevariable'] =="JURIDIQUE"){
if (($_POST['login']=='juridique') and ($_POST['pw']=='juridique2019')) 
{	
$_SESSION['motdepasse']="juridique";
$_SESSION['login']="JURIDIQUE ";
header('location:../../JURIDIQUE/');
} 
else
{
	$varetsouservice = $_SESSION['varetsouservice'];
	$_SESSION['message']="Mot de passe incorrect";
	header("location:acces.php?etsouservice=".$varetsouservice."");
}
}

elseif($_SESSION['etsouservicevariable'] =="COURRIER"){
if (($_POST['login']=='courrier') and ($_POST['pw']=='courrier2019')) 
{	
	
$_SESSION['motdepasse']="courrier2019";
$_SESSION['id_service']= 16;
header('location:../../COURRIER/');
} 
else
	{
		$varetsouservice = $_SESSION['varetsouservice'];
		$_SESSION['message']="Mot de passe incorrect";
		header("location:acces.php?etsouservice=".$varetsouservice."");
	}
}

elseif($_SESSION['etsouservicevariable'] =="ARCHIVES"){
if (($_POST['login']=='archive') and ($_POST['pw']=='archive2019')) 
{	
	
$_SESSION['motdepasse']="archive2019";
$_SESSION['id_service'] = 90;
header('location:../../COURRIER/');
} 
else
	{
		$varetsouservice = $_SESSION['varetsouservice'];
		$_SESSION['message']="Mot de passe incorrect";
		header("location:acces.php?etsouservice=".$varetsouservice."");
	}
}

elseif($_SESSION['etsouservicevariable']=="Personnel")
		{
			$login=$_POST['login']; 
			$pw=$_POST['pw'];
			
			$sqlquery=$db->query("SELECT * FROM civil WHERE passe1 ='$pw' AND pseudo = '$login'");
			$byquery=$sqlquery->fetch();
			
			$donnees= $db->query("select * from personnelcivil where id_civil ='".$byquery["id_civil"]."'")->fetch();
			$_SESSION["varidcivil"] = $byquery["id_civil"];
			$_SESSION["varnomprenom"] = $donnees["nomprenom"];
			
			$resu2= $db->query("SELECT `personnelcivil`.*, `personnelcivil`.`id_civil` FROM  `personnelcivil` WHERE  `personnelcivil`.`id_civil` = '".$_SESSION["varidcivil"]."'")->fetch();
			$_SESSION["varidetsouservice"] = $resu2["id_etsouservice"];
			$_SESSION["varidcategoriecivil"] = $resu2["id_categorie_civil"];
			
			
			$resu=$db->query("SELECT  * from etsouservice WHERE  id_etsouservice = '".$_SESSION["varidetsouservice"]."'")->fetch();
			$_SESSION["varservicelib"] = $resu["libelle"];
			$_SESSION["varservice"] = $resu["etsouservice"];
			
			$resu=$db->query("SELECT  * from categorie_civil WHERE  id_categorie_civil = '".$_SESSION["varidcategoriecivil"]."'")->fetch();
			$_SESSION["varcategoriecivil"] = $resu["categorie_civil"];
			
			if($sqlquery->rowcount()==0){
				//echo "<p><center><h3>Login ou mot de passe incorrect...!</h3></p>";
				$varetsouservice = $_SESSION['varetsouservice'];
				$_SESSION['message']= $_POST['pw'];
				header("location:acces.php?etsouservice='PERSONNEL'");

			} else {
				
				header('location:../ComptePersonnel/comptepersonnelcivil.php');
				
			}
			
			
			
		}
else 

{
			$varetsouservice = $_SESSION['varetsouservice'];
			$_SESSION['message']="Mot de passe incorrect";
			header("location:acces.php?etsouservice=".$varetsouservice."");
}


/*

	if (($login=='Admin') AND ($_SESSION['etsouservicevariable']=='SPCM'))
			{	
 $_SESSION['varid_compte'] = 1;
$_SESSION['varid_etsouservice'] = "INFO";
$_SESSION['varid_civil'] = 20;

 header('location:miseajourcivil.php');
					
			}
	elseif($_SESSION['etsouservicevariable'] =="JURIDIQUE")
		{	
			if(($login=="ecmag") AND ($pw=="ecmag2019"))
			{
				$_SESSION['motdepasse']="ecmag2019";
				$_SESSION['login']="Gestion de Stock Ecmag";
				header('location:Ecmag/acceuil.php');
			} 
		}
elseif($_SESSION['etsouservicevariable'] =="JURIDIQUE"){
			if (($_POST['login']=="juridique")&&($_POST['pw']=="juridique2019")) 
			{
			 	header('location:JURIDIQUE/index.php'); 
			} 
			else 
			{
				$varetsouservice = $_SESSION['varetsouservice'];
				$_SESSION['message']="Mot de passe incorrect";
				header("location:acces.php?etsouservice=".$varetsouservice."");
			 }
			 	 
		
	
		}		
 else {
				
				header('location:comptepersonnelcivil.php');
				
			}
			
			
			
		}else{

			$varetsouservice = $_SESSION['varetsouservice'];
			$_SESSION['message']="Mot de passe incorrect";
			header("location:acces.php?etsouservice=".$varetsouservice."");
				}
	*/ 