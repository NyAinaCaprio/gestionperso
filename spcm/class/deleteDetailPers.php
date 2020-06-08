<?php 

$var = $_GET['var']; 
$id_civil = $_SESSION['varidcivil'];
 
if (isset($_GET['tab'])) {
	if ($_GET['tab']=="avance") {
	 	$db->exec('DELETE FROM avancementsuccessifs WHERE numavancementsucc = "'.$var.'"');
	 header('location:index.php?p=editavancem&id_civil='.$id_civil.'');
	 	exit();
	 }
	 elseif ($_GET['tab']=="enfant") {
	 	$db->exec('DELETE FROM enfant WHERE numenfant = "'.$var.'"');
	 header('location:index.php?p=editenfant&id_civil='.$id_civil.'');
	 	exit();
	 } 
	 elseif ($_GET['tab']=="deco") {
	 $db->exec('DELETE FROM decoration_civil WHERE numdecoration = "'.$var.'"');
	 header('location:index.php?p=editdeco&id_civil='.$id_civil.'');

	 exit();
	 }
	 elseif ($_GET['tab']=="affect") {
	 $db->exec('DELETE FROM affectationsuccessivecivil WHERE numaffectciv = "'.$var.'"');
	 header('location:index.php?p=editaffect&id_civil='.$id_civil.'');
	 exit();
	 }
	 elseif ($_GET['tab']=="ecole") {
	 $db->exec('DELETE FROM  ecoleformationstage WHERE numecole = "'.$var.'"');
	 header('location:index.php?p=editecole&id_civil='.$id_civil.'');
	 exit();
	 }
	 elseif ($_GET['tab']=="etsouservice") {
	 $db->exec('DELETE FROM  etsouservice WHERE id_etsouservice = "'.$var.'"');
	 header('location:index.php?p=service');
	 exit();
	 } 

}
